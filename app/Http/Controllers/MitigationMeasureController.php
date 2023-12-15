<?php

namespace App\Http\Controllers;

use App\Models\MitigationMeasure;
use Illuminate\Http\Request;

class MitigationMeasureController extends Controller
{
    //
    public function index()
    {
        $mitigationMeasures = MitigationMeasure::all();
        return view('administration.mitigation_measures.index', compact('mitigationMeasures'));
    }

    /**
     * Show the form for creating a new outcome.
     */
    public function create()
    {
        return view('administration.mitigation_measures.create');
    }

    /**
     * Store a newly created outcome in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        MitigationMeasure::create($validatedData);

        return redirect('/administration/pac/mitigation-measures')
            ->with('success', 'Outcome created successfully.');
    }

    /**
     * Display the specified outcome.
     */
    public function show(MitigationMeasure $mitigationMeasure)
    {
        return view('administration.mitigation_measures.show', compact('mitigationMeasure'));
    }

    /**
     * Show the form for editing the specified outcome.
     */
    public function edit(MitigationMeasure $mitigationMeasure)
    {
        return view('administration.mitigation_measures.edit', compact('mitigationMeasure'));
    }

    /**
     * Update the specified outcome in storage.
     */
    public function update(Request $request, MitigationMeasure $mitigationMeasure)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $mitigationMeasure->update($validatedData);

        return redirect('/administration/pac/mitigation-measures')
            ->with('success', 'Outcome updated successfully.');
    }

    /**
     * Remove the specified outcome from storage.
     */
    public function destroy(MitigationMeasure $mitigationMeasure)
    {
        $mitigationMeasure->delete();

        return redirect('/administration/pac/mitigation-measures')
            ->with('success', 'Outcome deleted successfully.');
    }

}
