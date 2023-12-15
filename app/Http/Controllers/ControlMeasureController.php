<?php

namespace App\Http\Controllers;

use App\Models\ControlMeasure;
use Illuminate\Http\Request;

class ControlMeasureController extends Controller
{
    //
    public function index()
    {
        $controlMeasures = ControlMeasure::all();
        return view('administration.control_measures.index', compact('controlMeasures'));
    }

    /**
     * Show the form for creating a new outcome.
     */
    public function create()
    {
        return view('administration.control_measures.create');
    }

    /**
     * Store a newly created outcome in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        ControlMeasure::create($validatedData);

        return redirect('/administration/pac/control-measures')
            ->with('success', 'Outcome created successfully.');
    }

    /**
     * Display the specified outcome.
     */
    public function show(ControlMeasure $controlMeasure)
    {
        return view('administration.control_measures.show', compact('controlMeasure'));
    }

    /**
     * Show the form for editing the specified outcome.
     */
    public function edit(ControlMeasure $controlMeasure)
    {
        return view('administration.control_measures.edit', compact('controlMeasure'));
    }

    /**
     * Update the specified outcome in storage.
     */
    public function update(Request $request, ControlMeasure $controlMeasure)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $controlMeasure->update($validatedData);

        return redirect('/administration/pac/control-measures')
            ->with('success', 'Outcome updated successfully.');
    }

    /**
     * Remove the specified outcome from storage.
     */
    public function destroy(ControlMeasure $controlMeasure)
    {
        $controlMeasure->delete();

        return redirect('/administration/pac/control-measures')
            ->with('success', 'Outcome deleted successfully.');
    }
}
