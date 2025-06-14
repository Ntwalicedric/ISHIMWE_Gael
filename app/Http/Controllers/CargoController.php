<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::with('ship')->get();
        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ships = \App\Models\Ship::all();
        return view('cargos.create', compact('ships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'weight' => 'required|numeric',
            'ship_id' => 'required|exists:ships,id',
        ]);
        Cargo::create($validated);
        return redirect()->route('cargos.index')->with('success', 'Cargo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        return view('cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {
        $ships = \App\Models\Ship::all();
        return view('cargos.edit', compact('cargo', 'ships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cargo $cargo)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'weight' => 'required|numeric',
            'ship_id' => 'required|exists:ships,id',
        ]);
        $cargo->update($validated);
        return redirect()->route('cargos.index')->with('success', 'Cargo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo deleted successfully.');
    }
}
