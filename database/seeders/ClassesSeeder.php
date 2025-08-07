<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()->create([
            'cls_level' => 1,
            'mjr_id' => 1,
            'cls_number' => 1,
            'cls_create_by' => 1,
        ]);
    }
}
