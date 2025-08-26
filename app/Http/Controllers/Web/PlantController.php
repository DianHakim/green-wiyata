<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Plant;
use App\Models\TypePlant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with(['location', 'typePlant'])
            ->orderByDesc('pts_created_at')
            ->paginate(10);

        $typeplants = TypePlant::all();

        return view('plants.index', compact('plants', 'typeplants'));
    }

    public function create()
    {
        $locations = Location::all();
        $typeplants = TypePlant::all(); // ← penting untuk blade

        return view('plants.create', compact('locations', 'typeplants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pts_name'        => 'required|string|max:255',
            'tps_id'          => 'required|exists:typeplants,tps_id', // pilih dari dropdown
            'lcn_id'          => 'required|exists:locations,lcn_id',
            'pts_stok'        => 'required|integer',
            'pts_date'        => 'required|date',
            'pts_description' => 'nullable|string',
            'pts_img_path'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('pts_img_path')) {
            $validated['pts_img_path'] = $request->file('pts_img_path')->store('plants', 'public');
        }

        Plant::create([
            'pts_name'        => $validated['pts_name'],
            'pts_stok'        => $validated['pts_stok'],
            'pts_date'        => $validated['pts_date'],
            'pts_description' => $validated['pts_description'] ?? null,
            'pts_img_path'    => $validated['pts_img_path'] ?? null,
            'location_id'    => $validated['lcn_id'],
            'tps_id'          => $validated['tps_id'],
            'pts_created_by'  => Auth::id() ?? null,
            'pts_updated_by'  => Auth::id() ?? null,
        ]);

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
        $validated = $request->validate([
            'pts_name'        => 'required|string|max:255',
            'tps_id'          => 'required|exists:typeplants,tps_id',
            'lcn_id'          => 'required|exists:locations,lcn_id',
            'pts_stok'        => 'required|integer',
            'pts_date'        => 'required|date',
            'pts_description' => 'nullable|string',
            'pts_img_path'    => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $plant = Plant::findOrFail($id);

        if ($request->hasFile('pts_img_path')) {
            $validated['pts_img_path'] = $request->file('pts_img_path')->store('plants', 'public');
        }

        $plant->update([
            'pts_name'        => $validated['pts_name'],
            'pts_stok'        => $validated['pts_stok'],
            'pts_date'        => $validated['pts_date'],
            'pts_description' => $validated['pts_description'] ?? null,
            'pts_img_path'    => $validated['pts_img_path'] ?? $plant->pts_img_path,
            'location_id'    => $validated['lcn_id'],
            'tps_id'          => $validated['tps_id'],
            'pts_updated_by'  => Auth::id() ?? null,
        ]);

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully');
    }

    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully');
    }
}
