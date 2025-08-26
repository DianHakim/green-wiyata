<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LocationPlantController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locationplant.index', compact('locations'));
    }

    public function create()
    {
        return view('locationplant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lcn_name' => 'required|string|max:255',
            'lcn_block' => 'nullable|string|max:255',
            'lcn_img_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imgPath = null;
        if ($request->hasFile('lcn_img_path')) {
            $imgPath = $request->file('lcn_img_path')->store('locations', 'public');
        }

        Location::create([
            'lcn_name'       => $request->lcn_name,
            'lcn_block'      => $request->lcn_block,
            'lcn_img_path'   => $imgPath,
            'lcn_created_by' => Auth::user()->usr_id,
        ]);

        return redirect()->route('locationplant.index')->with('success', 'Lokasi berhasil ditambahkan!');
    }
}
