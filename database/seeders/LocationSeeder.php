<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::factory()->create([
            'lcn_name' => 'Lokasi A',
            'lcn_block' => 'Block-01',
            'lcn_img_path' => 'images/locations/lokasi_a.jpg',
            'lcn_create_by' => 1,
        ]);
    }
}
