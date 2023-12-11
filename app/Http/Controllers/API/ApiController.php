<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrganizationController;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ApiController extends Controller
{

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
        $data = OrganizationController::loadOrganisationTypeFields($request->organization_type_id);
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

        // Assign the role to the user
        $user->assignRole($role);

        return response()->json($data);
    }
}
