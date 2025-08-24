<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypePlant;

class TypePlantController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tps_type' => 'required|string|max:255',
        ]);

        TypePlant::create([
            'tps_type' => $validated['tps_type'],
            'tps_created_by' => 1,
        ]);

        return redirect()->route('plants.index')->with('success', 'Type Plant berhasil ditambahkan!');
    }

    public function destroy($id)
   {
    $typePlant = TypePlant::findOrFail($id);
    $typePlant->delete();

    return redirect()->route('plants.index')->with('success', 'Tipe Plant berhasil dihapus!');
   }

}
