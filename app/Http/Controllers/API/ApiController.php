<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrganizationController;
use App\Models\Organization;
use App\Models\OrganizationType;
use Illuminate\Http\Request;

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
}
