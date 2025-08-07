<?php

namespace Database\Seeders;

use App\Models\Majors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Majors::factory()->create([
            'mjr_name' => 'Teknik Informatika',
            'mjr_create_by' => 1,
        ]);
    }
}
