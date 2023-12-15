<?php

namespace App\Http\Controllers;

use App\Models\HWCType;
use Illuminate\Http\Request;

class HWCTypeController extends Controller
{
    //
    public function index()
    {
        $types = HWCType::all();
        return view('administration.hwc_types.index', compact('types'));
    }

    /**
     * Show the form for creating a new outcome.
     */
    public function create()
    {
        return view('administration.hwc_types.create');
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

        HWCType::create($validatedData);

        return redirect('/administration/hwc/types')
            ->with('success', 'Outcome created successfully.');
    }

    /**
     * Display the specified outcome.
     */
    public function show(HWCType $hwcType)
    {
        return view('administration.hwc_types.show', compact('hwcType'));
    }

    /**
     * Show the form for editing the specified outcome.
     */
    public function edit(HWCType $hwcType)
    {
        return view('administration.hwc_types.edit', compact('hwcType'));
    }

    /**
     * Update the specified outcome in storage.
     */
    public function update(Request $request, HWCType $hwcType)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $hwcType->update($validatedData);

        return redirect('/administration/hwc/types')
            ->with('success', 'Outcome updated successfully.');
    }

    /**
     * Remove the specified outcome from storage.
     */
    public function destroy(HWCType $hwcType)
    {
        $hwcType->delete();

        return redirect('/administration/hwc/types')
            ->with('success', 'Outcome deleted successfully.');
    }
}
