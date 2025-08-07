<?php

namespace Database\Seeders;

use App\Models\Plants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plants::factory()->create([
            'pts_name' => 'Tanaman A',
            'pts_date' => '2025-08-03',
            'pts_img_path' => 'images/plants/plant_a.jpg',
            'pts_description' => 'Deskripsi tanaman A',
            'location_id' => 1,
            'pts_create_by' => 1,
        ]);
    }
}
