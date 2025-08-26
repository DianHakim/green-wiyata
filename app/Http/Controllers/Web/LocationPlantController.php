<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LocationPlantController extends Controller
{
    // LocationPlantController.php
public function index()
{
    $locations = \App\Models\Location::all();
    return view('locationplant.index', compact('locations'));
}

public function show($id)
{
    $location = \App\Models\Location::findOrFail($id);
    return view('locationplant.show', compact('location'));
}

public function edit($id)
{
    $location = \App\Models\Location::findOrFail($id);
    return view('locationplant.edit', compact('location'));
}


    public function create()
    {
        return view('locationplant.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'lcn_name' => 'required|string|max:255',
        'lcn_block' => 'nullable|string|max:100',
        'lcn_latitude' => 'required|numeric',
        'lcn_longitude' => 'required|numeric',
    ]);

    Location::create([
        'lcn_name'       => $request->lcn_name,
        'lcn_block'      => $request->lcn_block,
        'lcn_latitude'   => $request->lcn_latitude,
        'lcn_longitude'  => $request->lcn_longitude,
        'lcn_created_by' => Auth::id(), // ✅ isi dengan user login
    ]);

    return redirect()->route('locationplant.index')->with('success', 'Lokasi berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'lcn_name' => 'required|string|max:255',
        'lcn_block' => 'nullable|string|max:255',
        'lcn_latitude' => 'required|numeric',
        'lcn_longitude' => 'required|numeric',
    ]);

    $location = Location::findOrFail($id);

    $location->lcn_name = $request->lcn_name;
    $location->lcn_block = $request->lcn_block;
    $location->lcn_latitude = $request->lcn_latitude;
    $location->lcn_longitude = $request->lcn_longitude;
    $location->lcn_updated_by = Auth::id();
    $location->save();

    return redirect()->route('locationplant.index')
                     ->with('success', 'Lokasi berhasil diupdate.');
}
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locationplant.index')->with('success', 'Lokasi berhasil dihapus');
    }
}
