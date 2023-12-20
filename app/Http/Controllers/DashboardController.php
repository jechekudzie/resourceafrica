<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Organization;
use App\Models\Pac;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function dashboardHome(Organization $organization)
    {
        return view('organizations.dashboard')->with($this->loadPermissions($organization));
    }

    public function wildlifeSpeciesHome(Organization $organization)
    {
        $animalsData = [
            'Elephant' => [
                'status' => 'Endangered',
                'color' => '#FF0000', // Red
            ],
            'Lion' => [
                'status' => 'Vulnerable',
                'color' => '#FFA500', // Orange
            ],
            'Leopard' => [
                'status' => 'Near Threatened',
                'color' => '#FFFF00', // Yellow
            ],
            'Buffalo' => [
                'status' => 'Least Concern',
                'color' => '#008000', // Green
            ],
            'Crocodile' => [
                'status' => 'Least Concern',
                'color' => '#008000', // Green
            ],
            'Hippo' => [
                'status' => 'Vulnerable',
                'color' => '#FFA500', // Orange
            ],
            'Hyena - Spotted' => [
                'status' => 'Least Concern',
                'color' => '#008000', // Green
            ],
            'Hyena - Brown' => [
                'status' => 'Near Threatened',
                'color' => '#FFFF00', // Yellow
            ],
            'Wild Dogs' => [
                'status' => 'Endangered',
                'color' => '#FF0000', // Red
            ],
            'Jackal' => [
                'status' => 'Least Concern',
                'color' => '#008000', // Green
            ],
            'Snakes' => [
                'status' => 'Varies by species',
                'color' => '#808080', // Gray
            ],
            'Python' => [
                'status' => 'Varies by species',
                'color' => '#808080', // Gray
            ],
            'Wild Pigs' => [
                'status' => 'Least Concern',
                'color' => '#008000', // Green
            ],
            'Antelopes' => [
                'status' => 'Varies by species',
                'color' => '#808080', // Gray
            ],
            'Quelea Birds' => [
                'status' => 'Least Concern',
                'color' => '#008000', // Green
            ],
        ];

        $databaseSpecies = Species::all()->keyBy('name')->toArray();

        $mergedData = [];

        foreach ($animalsData as $animalName => $animalDetails) {
            $mergedData[$animalName] = array_merge($animalDetails, $databaseSpecies[$animalName] ?? []);
        }

        // If there are additional species in the database not present in $animalsData
        foreach ($databaseSpecies as $animalName => $animalDetails) {
            if (!isset($mergedData[$animalName])) {
                $mergedData[$animalName] = $animalDetails;
            }
        }

        return view('modules.wildlife.index')->with($this->loadPermissions($organization))->with('animalsData', $animalsData)->with('species', $mergedData);

    }

    public function humanWildlifeConflictHome(Organization $organization)
    {
        $incidents = Incident::where('organization_id', $organization->id)->get();
        return view('modules.hwc.index')->with($this->loadPermissions($organization))->with('incidents', $incidents);
    }

    public function problematicAnimalControlHome(Organization $organization)
    {
        $pacs = Pac::whereIn('incident_id', DB::table('incidents')->where('organization_id', $organization->id)->pluck('id')->toArray())->get();

        //loop through and fetch incident id and add to the collection
        foreach ($pacs as $pac) {
            $incident = Incident::find($pac->incident_id);
            $pac->incident = $incident;
        }

        return view('modules.pac.index')->with($this->loadPermissions($organization))->with('pacs', $pacs);
    }

    function loadPermissions(Organization $organization)
    {
        $user = Auth::user();
        $role = DB::table('organization_users')->where('user_id', $user->id)->where('organization_id', $organization->id)->first();
        $permissions = Role::findOrFail($role->role_id);
        $permissions = $permissions->permissions()->pluck('name');
        $permissions = $permissions->toArray();

        //get the logged in user's organisati ons
        $data = [
            'org' => $organization,
            'user' => $user,
            'role' => $role
        ];

        return [
            'data' => $data,
            'permissions' => $permissions
        ];
    }

    public function createHumanWildlifeConflict(Organization $organization)
    {
        return view('modules.hwc.create')->with($this->loadPermissions($organization));
    }

    public function storeHumanWildlifeConflictl(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'image' => 'required',
            'species_id' => 'required',
            'status_id' => 'required',
        ]);

        $incident = new Incident([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'location' => $request->get('location'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'image' => $request->get('image'),
            'user_id' => Auth::user()->id,
            'organization_id' => $request->get('organization_id'),
            'species_id' => $request->get('species_id'),
            'status_id' => $request->get('status_id'),
        ]);

        $incident->save();

        return back()->with('success', 'Incident created successfully.');
    }

    public function storeHumanWildlifeConflict(Request $request)
    {
        $incident = new Incident([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'image' => $request->get('image'),
            'user_id' => Auth::user()->id,
            'organization_id' => $request->get('organization_id'),
            'h_w_c_outcome_id' => $request->get('hwcoutcome_id'),
        ]);

        $incident->save();

        //need to attach the species to the incident
        $incident->species()->attach($request->get('species'));

        return back()->with('success', 'Incident created successfully.');
    }

    public function storePAC(Request $incident)
    {
        $pac = new Pac([
            'title' => $incident->get('title'),
            'longitude' => $incident->get('longitude'),
            'latitude' => $incident->get('latitude'),
            'notes' => $incident->get('notes'),
            'incident_id' => $incident->get('incident_id'),
        ]);

        $pac->save();

        //need to attach the mitigation measures to the pac
        $pac->mitigation_measures()->attach($incident->get('mitigation'));

        //attachce control measure
        $pac->control_measures()->attach($incident->get('control'));

        $incident = Incident::find($incident->get('incident_id'));

        $organization = Organization::find($incident->organization_id);

        return redirect()->to($organization->slug . '/problematic-animal-control');
    }

}
