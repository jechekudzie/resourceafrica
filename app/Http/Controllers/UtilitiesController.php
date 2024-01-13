<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilitiesController extends Controller
{
    public function getRootOrganisations()
    {
        // Get all organisations that have no parent which logged-in user has access to
        $organisations = Organization::whereNull('parent_id')
            ->whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->get();

        //loop through all and build nestable2 array
        $data = [];
        foreach ($organisations as $organisation) {
            $data[] = [
                'id' => $organisation->id,
                'name' => $organisation->name,
                'children' => $this->getChildren($organisation->id)
            ];
        }

        return $data;
    }

    public function getChildren($id)
    {
        // Get all organisations that have parent_id = $id which logged-in user has access to
        $organisations = Organization::where('parent_id', $id)
            ->whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->get();

        //loop through all and build nestable2 array
        $data = [];
        foreach ($organisations as $organisation) {
            $data[] = [
                'id' => $organisation->id,
                'name' => $organisation->name,
                'children' => $this->getChildren($organisation->id)
            ];
        }

        return $data;
    }
}
