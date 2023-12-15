<?php

namespace App\Http\Controllers;

use App\Models\HumanWildlifeConflict;
use App\Models\HWCOutcome;
use App\Models\HWCType;
use App\Models\Organization;
use App\Models\Species;
use Illuminate\Http\Request;

class HumanWildlifeConflictController extends Controller
{
    //

    public function index()
    {
        $conflicts = HumanWildlifeConflict::all();
        $species = Species::all();
        $organizations = Organization::all();
        $hwcTypes = HWCType::all();
        $hwcOutcomes = HWCOutcome::all();
        return view('administration.human_wildlife_conflicts.index', compact('conflicts','organizations', 'hwcTypes', 'hwcOutcomes','species'));
    }

    /**
     * Show the form for creating a new conflict.
     */
    public function create()
    {
        $species = Species::all();
        $organizations = Organization::all();
        $hwcTypes = HWCType::all();
        $hwcOutcomes = HWCOutcome::all();

        return view('administration.human_wildlife_conflicts.create', compact('species', 'organizations', 'hwcTypes', 'hwcOutcomes'));
    }

    /**
     * Store a newly created conflict in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'species_id' => 'required|exists:species,id',
            'organization_id' => 'required|exists:organizations,id',
            'h_w_c_type_id' => 'required|exists:h_w_c_types,id',
            'h_w_c_outcome_id' => 'required|exists:h_w_c_outcomes,id',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
            'area' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'distance_to_community' => 'nullable|string|max:255',
        ]);

        HumanWildlifeConflict::create($validatedData);

        return redirect()->route('human_wildlife_conflicts.index')
            ->with('success', 'Conflict recorded successfully.');
    }

    /**
     * Display the specified conflict.
     */
    public function show(HumanWildlifeConflict $humanWildlifeConflict)
    {
        return view('administration.human_wildlife_conflicts.show', compact('humanWildlifeConflict'));
    }

    /**
     * Show the form for editing the specified conflict.
     */
    public function edit(HumanWildlifeConflict $humanWildlifeConflict)
    {
        $species = Species::all();
        $organizations = Organization::all();
        $hwcTypes = HWCType::all();
        $hwcOutcomes = HWCOutcome::all();

        return view('administration.human_wildlife_conflicts.edit', compact('humanWildlifeConflict', 'species', 'organizations', 'hwcTypes', 'hwcOutcomes'));
    }

    /**
     * Update the specified conflict in storage.
     */
    public function update(Request $request, HumanWildlifeConflict $humanWildlifeConflict)
    {
        $validatedData = $request->validate([
            'species_id' => 'required|exists:species,id',
            'organization_id' => 'required|exists:organizations,id',
            'h_w_c_type_id' => 'required|exists:h_w_c_types,id',
            'h_w_c_outcome_id' => 'required|exists:h_w_c_outcomes,id',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
            'area' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'distance_to_community' => 'nullable|string|max:255',
        ]);

        $humanWildlifeConflict->update($validatedData);

        return redirect()->route('human_wildlife_conflicts.index')
            ->with('success', 'Conflict updated successfully.');
    }

    /**
     * Remove the specified conflict from storage.
     */
    public function destroy(HumanWildlifeConflict $humanWildlifeConflict)
    {
        $humanWildlifeConflict->delete();

        return redirect()->route('human_wildlife_conflicts.index')
            ->with('success', 'Conflict deleted successfully.');
    }

}
