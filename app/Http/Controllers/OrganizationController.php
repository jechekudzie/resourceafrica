<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\OrganisationType;
use App\Models\Organization;
use App\Models\OrganizationType;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //index method
    public function index()
    {
        $organizations = Organization::all();
        return view('administration.organizations.index', compact('organizations'));
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
        return response()->json($data);
    }
}
