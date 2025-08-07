<?php

namespace Database\Seeders;

use App\Models\Typeplants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeplantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Typeplants::factory()->create([
            'tps_type' => 'Jenis A',
            'tps_create_by' => 1,
        ]);
    }
}
