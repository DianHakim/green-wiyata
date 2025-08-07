<?php

namespace Database\Seeders;

use App\Models\Repotrs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepotrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Repotrs::factory()->create([
            'post_id' => 1,
            'rps_create_by' => 1,
        ]);
    }
}
