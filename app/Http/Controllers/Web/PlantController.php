<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Plant;
use App\Models\TypePlant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with(['location', 'typePlant'])->get();
        $typeplants = TypePlant::all();
        return view('plants.index', compact('plants', 'typeplants'));
    }

    public function create()
    {
        $locations = Location::all();
        $typeplants = TypePlant::all();
        return view('plants.create', compact('locations', 'typeplants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pts_name' => 'required|string|max:255',
            'location_id' => 'required|integer', // harus sama dengan name di blade
            'tps_id' => 'required|integer',
            'pts_stok' => 'required|integer',
            'pts_date' => 'required|date',
            'pts_description' => 'nullable|string',
            'pts_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload gambar
        if ($request->hasFile('pts_img_path')) {
            $validated['pts_img_path'] = $request->file('pts_img_path')->store('plants', 'public');
        }

        Plant::create($validated);

        return redirect()->route('plants.index')->with('success', 'Plant berhasil ditambahkan');
    }

    public function show($id)
    {
        $plant = Plant::with(['location', 'typePlant'])->findOrFail($id);
        return view('plants.show', compact('plant'));
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $locations = Location::all();
        $typeplants = TypePlant::all();
        return view('plants.edit', compact('plant', 'locations', 'typeplants'));
    }

    public function update(Request $request, $id)
    {
        $plant = Plant::findOrFail($id);

        $validated = $request->validate([
            'pts_name' => 'required|string|max:255',
            'location_id' => 'required|integer',
            'tps_id' => 'required|integer',
            'pts_stok' => 'required|integer',
            'pts_date' => 'required|date',
            'pts_description' => 'nullable|string',
            'pts_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // 5120 KB = 5 MB
        ]);

        // Handle update gambar
        if ($request->hasFile('pts_img_path')) {
            $validated['pts_img_path'] = $request->file('pts_img_path')->store('plants', 'public');
        }

        $plant->update($validated);

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully');
    }

    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully');
    }
}
