<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrganizationController;
use App\Mail\WelcomeEmail;
use App\Models\Field;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class ApiController extends Controller
{
    private $generatedNumbers = [];
    private $orgId = 0;

    public function fetchOrganizationTypes()
    {
        $organizations = OrganizationType::whereDoesntHave('parents')->get();
        $data = $this->formatTreeData($organizations);
        return response()->json($data);
    }

    private function formatTreeData($organizations)
    {
        $data = [];

        foreach ($organizations as $organization) {

            $data[] = [
                'id' => $organization->id,
                'text' => $organization->name,
                'children' => $this->formatTreeData($organization->children),
            ];

        }
        return $data;
    }

    public function fetchOrganizationTypeFields($id)
    {
        $data = OrganizationController::loadOrganisationTypeFields($id);
        return response()->json($data);
    }

    public function fetchOrganizationTypeChildren($id)
    {
        $data = OrganizationType::findOrFail($id)->children()->get();
        return response()->json($data);
    }

    public function addNewOrganization(Request $request)
    {
        $data = $request->all();

        if ($data['type'] == 'ot') {
            $organization = new Organization();
            $organization->organization_type_id = $data['id'];
            if ($data['parent'] != '#') {
                $parts = explode('-', $data['parent']);
                $lastPart = end($parts);
                $organization->organization_id = $lastPart;
            }
        } else {
            $organization = Organization::findOrFail($data['id']);
        }

        //first create the organisation
        $organization->name = $data['input0'];
        $organization->save();

        $orgtype = OrganizationType::findOrFail($organization->organization_type_id);

        //now save the fields
        foreach ($orgtype->fields as $field) {
            //check field type for special circumstances
            if ($field->type == 'checkbox') {
                $value = implode(',', $data['input' . $field->id]);
            } elseif ($field->type == 'file') {

                $key = 'input' . $field->id;

                dd($request->input($key));

                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $value = 'public/organisations/uploads/' . $fileName;
                $file->move(public_path('organisations/uploads'), $fileName);

            } else {
                $value = $data['input' . $field->id];
            }
            $organization->fields()->attach($field->id, ['value' => $value]);
        }

        return response()->json($data);
    }

    public function saveOrganizationFieldValues(Request $request)
    {
        $data = $request->all();

        //first create the organisation
        $organization = new Organization();
        $organization->name = $data['organization_name'];
        $organization->organization_type_id = $data['organization_type_id'];
        $organization->save();

        //get organisation type fields from organisaiton type
        $orgtype = OrganizationType::findOrFail($organization->organization_type_id);

        //now save the fields
        foreach ($orgtype->fields as $field) {
            $value = $data['input' . $field->id];
            $organization->fields()->attach($field->id, ['value' => $value]);
        }

        //now create the organisation's superuser
        $user = new User([
            'name' => $data['admin_name'],
            'email' => $data['admin_email'],
            'password' => Hash::make('password'),
        ]);

        $user->save();

        $role = Role::create([
            'name' => 'super_admin',
            'organization_id' => $organization->id
        ]);

        $organization->users()->attach($user->id, ['role_id' => $role->id]);
        $user->roles()->attach($role, ['organization_id' => $organization->id]);

        return response()->json($data);
    }

    function generateUniqueNumber($min, $max)
    {
        $num = rand($min, $max);
        while (in_array($num, $this->generatedNumbers)) {
            $num = rand($min, $max);
        }
        $this->generatedNumbers[] = $num;
        return $num;
    }

    public function fetchOrganizationInstances()
    {
        $organizations = OrganizationType::whereDoesntHave('parents')->get();
        $data = [];

        foreach ($organizations as $organization) {
            //random number
            $rand = $this->generateUniqueNumber(1, 1000000);

            $data[] = [
                'id' => $rand . '-ot-' . $organization->id,
                'text' => $organization->name,
                'children' => $this->formatOrganisationTreeData($organization->organizations()->get()),
            ];
        }

        return response()->json($data);
    }

    private function formatOrganisationTreeData($organizations)
    {
        $data = [];

        foreach ($organizations as $organization) {
            //random number
            $rand = $this->generateUniqueNumber(1, 1000000);

            if ($organization instanceof Organization) {

                //add the organisation id to the organizationType children array elements
                $organization->organizationType->children->map(function ($item) use ($organization) {
                    $item->organization_id = $organization->id;
                });

                $data[] = [
                    'id' => $rand . '-o-' . $organization->id,
                    'text' => $organization->name,
                    'children' => $this->formatOrganisationTreeData($organization->organizationType->children),
                ];
            } else {
                $data[] = [
                    'id' => $rand . '-ot-' . $organization->id,
                    'text' => $organization->name,
                    'children' => $this->formatOrganisationTreeData($organization->organizations()->where('organization_id', $organization->organization_id)->get()),
                ];
            }
        }
        return $data;
    }

    public function fetchOrganizationTypeFieldsForm(Request $request)
    {
        if ($request->type == 'ot') {
            $data = OrganizationController::loadOrganisationTypeFields($request->id);
        } else {
            $org = Organization::findOrFail($request->id);
            $data = OrganizationController::loadOrganisationFields($org->id);
        }
        return response()->json($data);
    }

    public function fetchOrganizationRoles($id, $type)
    {
        if ($type == 'ot') {
            return response()->json([]);
        } else {
            $data = DB::table('roles')->where('organization_id', $id)->get();
            //add organisation name to the data collection as well
            $organisation = Organization::findOrFail($id);
            $data->map(function ($item) use ($organisation) {
                $item->organization_name = $organisation->name;
            });
            return response()->json($data);
        }
    }

    public function fetchOrganizationUsers($id, $type)
    {
        if ($type == 'ot') {
            return response()->json([]);
        } else {
            $data = DB::table('organization_users')->where('organization_id', $id)->get();
            $organisation = Organization::findOrFail($id);
            $data->map(function ($item) use ($organisation) {
                $item->organization = $organisation;
                $item->role = Role::findOrFail($item->role_id);
                $item->user = User::findOrFail($item->user_id);
            });
            return response()->json($data);
        }
    }

    public function fetchFieldPreview($id)
    {
        if ($id == 0) {
            return response()->json([
                "type" => "text",
                "name" => "Name",
                "label" => "Enter the Name of this Organization here",
            ]);
        } else {
            $field = DB::table('fields')->where('id', $id)->first();
            return response()->json($field);
        }
    }

    public function fetchRolePermissions($id)
    {
        //get the role and all permissions and return them
        $role = Role::findOrFail($id);
        $permissions = $role->permissions;

        $moduleInfo = [
            ["module" => 'Dashboard', "prefix" => 'dashboard'],
            ["module" => 'Wildlife', "prefix" => 'wildlife'],
            ["module" => 'HWC (Human-Wildlife Conflict)', "prefix" => 'hwc'],
            ["module" => 'PAC (Problematic Animal Control)', "prefix" => 'pac'],
            ["module" => 'Illegal Activities', "prefix" => 'illegal_activities'],
            ["module" => 'Marketing', "prefix" => 'marketing'],
            ["module" => 'Hunting Activities', "prefix" => 'hunting_activities'],
            ["module" => 'Projects', "prefix" => 'projects'],
            ["module" => 'Organizations', "prefix" => 'organizations'],
        ];

        //permissions suffixes
        $suffixes = ['create', 'read', 'update', 'delete'];

        //create list of all permissions by combining prefix and suffix
        foreach ($moduleInfo as $module) {
            foreach ($suffixes as $suffix) {
                $permissions[] = $module['prefix'] . '.' . $suffix;
            }
        }

        $data = [];
        //foreach module info add permissions array with corresponding key data
        foreach ($moduleInfo as $module) {
            $permissionsData = [];
            foreach ($suffixes as $suffix) {
                $permissionsData[$suffix] = $role->hasPermissionTo($module['prefix'] . '.' . $suffix);
            }
            $module['permissions'] = $permissionsData;
            $data[] = $module;
        }
        return response()->json($data);
    }

    public function updateRolePermissions(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $request->checked == "true" ? $role->givePermissionTo($request->permission) : $role->revokePermissionTo($request->permission);
        return response()->json($request->permissions);
    }

    public function fetchRole($id)
    {
        $role = Role::findOrFail($id);
        //fetch organization data as well
        $role->organization = Organization::findOrFail($role->organization_id);
        return response()->json($role);
    }

    public function updateRoleName(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->name = $request->name;
        $role->save();
        return response()->json($role);
    }

    public function deleteRole(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->users()->detach();
        $role->permissions()->detach();
        $role->delete();
        return response()->json($role);
    }

    public function deleteField(Request $request)
    {
        $field = DB::table('fields')->where('id', $request->id)->first();
        DB::table('field_organization_types')->where('field_id', $request->id)->delete();
        DB::table('field_organization_values')->where('field_id', $request->id)->delete();
        $data = OrganizationController::loadOrganisationTypeFields($request->organization_id);
        return response()->json($data);
    }

    public function updateField(Request $request)
    {
        $field = Field::findOrFail($request->id);
        $field->name = $request->name;
        $field->label = $request->label;
        $field->type = $request->type;
        $field->save();
        $data = OrganizationController::loadOrganisationTypeFields($request->organization_id);
        return response()->json($data);
    }

    public function updateFieldOptions(Request $request)
    {
        $field = Field::findOrFail($request->field_id);
        $field->value = $request->value;
        $field->save();
        $data = OrganizationController::loadOrganisationTypeFields($request->organization_id);
        return response()->json($data);
    }

    public function registerNewUser(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);
        $user->save();

        //fet the role and all permissions and return them
        $role = Role::findOrFail($request->role_id);

        //assign user to role
        $user->roles()->attach($role, ['organization_id' => $request->organization_id]);

        //db insert into organisation_users table
        DB::table('organization_users')->insert([
            'user_id' => $user->id,
            'organization_id' => $request->organization_id,
            'role_id' => $role->id,
        ]);

        $email = $request->email;

        Mail::to($email)->send(new WelcomeEmail());

        return response()->json($user);
    }
}
