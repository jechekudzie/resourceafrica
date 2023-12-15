<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\OrganisationType;
use App\Models\Organization;
use App\Models\OrganizationType;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OrganizationController extends Controller
{
    //index method
    public function index()
    {
        $organizations = Organization::all();
        return view('administration.organizations.index', compact('organizations'));
    }

    public function addOrganisation()
    {
        $types = OrganizationType::whereDoesntHave('parents')->get();
        return view('administration.organizations.add', compact('types'));
    }

    public function parameters()
    {
        $organizations = Organization::all();
        return view('administration.organizations.parameters', compact('organizations'));
    }

    public function roles()
    {
        $organizations = Organization::all();
        return view('administration.organizations.roles', compact('organizations'));
    }

    public function userAccounts()
    {
        $organizations = Organization::all();
        return view('administration.organizations.accounts', compact('organizations'));
    }

    public function saveOrgType(Request $request)
    {
        //save new organisation type
        $orgtype = new OrganizationType();
        $orgtype->name = $request->name;
        $orgtype->description = $request->description;
        $orgtype->save();
        $orgtype->parents()->sync($request->parent_id);
        return back();
    }

    public function storeFieldType(Request $request)
    {
        //save new field type
        $fieldtype = new Field();
        $fieldtype->name = $request->name;
        $fieldtype->label = $request->label;
        $fieldtype->type = $request->type;
        $fieldtype->save();

        //fetch organisation type and sync field
        $orgtype = OrganizationType::find($request->organization_type_id);
        $orgtype->fields()->attach($fieldtype->id);

        $data = $this->loadOrganisationTypeFields($request->organization_type_id);
        return response()->json($data);
    }

    public static function loadOrganisationTypeFields($id): \Illuminate\Http\JsonResponse
    {
        $organizationType = OrganizationType::find($id);
        $data = $organizationType->fields()->get();
        $data->prepend(['id' => 0, 'name' => 'Name', 'label' => 'Enter the Name of this ' . $organizationType->name . ' here', 'type' => 'text', 'pivot' => ['value' => '']]);
        $grouped = $data->groupBy('type');
        return response()->json($grouped);
    }

    public static function loadOrganisationFields($id): \Illuminate\Http\JsonResponse
    {
        $organization = Organization::find($id);
        $data = $organization->fields()->get();
        $data->prepend(['id' => 0, 'name' => 'Name', 'label' => 'Enter the Name of this ' . $organization->name . ' here', 'type' => 'text', 'pivot' => ['value' => $organization->name]]);
        $grouped = $data->groupBy('type');
        return response()->json($grouped);
    }

    public function storeOrganisationRole(Request $request)
    {
        //check if role where name and organisaton id already exists
        $role = Role::where('name', $request->name)->where('organization_id', $request->organization_id)->first();

        if ($role) {
            return response()->json(['error' => 'Role already exists']);
        } else {
            $role = Role::create([
                'name' => $request->name,
                'organization_id' => $request->organization_id
            ]);
            return response()->json(['success' => 'Role saved successfully']);
        }
    }
}
