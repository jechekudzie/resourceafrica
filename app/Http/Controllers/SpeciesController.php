<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Species;
use Illuminate\Http\Request;
use Spatie\Sluggable\SlugOptions;

class SpeciesController extends Controller
{
    //

    public function index()
    {
        return view('administration.species.index');
    }

    /**
     * Show the form for creating a new species.
     */
    public function create()
    {
        return view('administration.species.create');
    }

    /**
     * Store a newly created species in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'scientific' => 'nullable|string|max:255',
            'male_name' => 'nullable|string|max:255',
            'female_name' => 'nullable|string|max:255',
        ]);

        Species::create($validatedData);

        return redirect()->route('species.index')
            ->with('success', 'Species created successfully.');
    }


    /**
     * Display the specified species.
     */
    public function show(Species $species)
    {
        return view('administration.species.show', compact('species'));
    }

    /**
     * Show the form for editing the specified species.
     */
    public function edit(Species $species)
    {
        return view('administration.species.edit', compact('species'));
    }

    /**
     * Update the specified species in storage.
     */
    /**
     * Update the specified species in storage.
     */
    public function update(Request $request, Species $species)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'scientific' => 'nullable|string|max:255',
            'male_name' => 'nullable|string|max:255',
            'female_name' => 'nullable|string|max:255',
        ]);

        $species->update($validatedData);

        return redirect()->route('species.index')
            ->with('success', 'Species updated successfully.');
    }

    /**
     * Remove the specified species from storage.
     */
    public function destroy(Species $species)
    {
        $species->delete();

        return redirect()->route('species.index')
            ->with('success', 'Species deleted successfully.');
    }

}
