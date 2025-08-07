<?php

namespace Database\Seeders;

use App\Models\Trashcan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrashcanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trashcan::factory()->create([
            'tbg_name' => 'Trash Bag A',
            'tbg_level' => 1,
            'tbg_code' => 'TBG-001',
            'tbg_img_path' => 'images/trashbags/tbg_a.jpg',
            'tbg_weight_kg' => '10',
            'locations_id' => 1,
        ]);
    }
}
