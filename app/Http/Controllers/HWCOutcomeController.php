<?php

namespace App\Http\Controllers;

use App\Models\HWCOutcome;
use Illuminate\Http\Request;

class HWCOutcomeController extends Controller
{
    //
    public function index()
    {
        $outcomes = HWCOutcome::all();
        return view('administration.hwc_outcomes.index', compact('outcomes'));
    }

    /**
     * Show the form for creating a new outcome.
     */
    public function create()
    {
        return view('administration.hwc_outcomes.create');
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

        HWCOutcome::create($validatedData);

        return redirect('/administration/hwc/outcomes')
            ->with('success', 'Outcome created successfully.');
    }

    /**
     * Display the specified outcome.
     */
    public function show(HWCOutcome $hwcOutcome)
    {
        return view('administration.hwc_outcomes.show', compact('hwcOutcome'));
    }

    /**
     * Show the form for editing the specified outcome.
     */
    public function edit(HWCOutcome $hwcOutcome)
    {
        return view('administration.hwc_outcomes.edit', compact('hwcOutcome'));
    }

    /**
     * Update the specified outcome in storage.
     */
    public function update(Request $request, HWCOutcome $hwcOutcome)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $hwcOutcome->update($validatedData);

        return redirect('/administration/hwc/outcomes')
            ->with('success', 'Outcome updated successfully.');
    }

    /**
     * Remove the specified outcome from storage.
     */
    public function destroy(HWCOutcome $hwcOutcome)
    {
        $hwcOutcome->delete();

        return redirect('/administration/hwc/outcomes')
            ->with('success', 'Outcome deleted successfully.');
    }
}
