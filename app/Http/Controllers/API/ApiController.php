<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrganizationController;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $value = $data['input' . $field->id];
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
            return response()->json($data);
        }
    }
}
