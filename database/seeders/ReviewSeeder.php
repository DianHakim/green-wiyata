<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory()->create([
            'post_id' => 1,
            'user_id' => 1,
            'rvw_nilai' => 5,
            'rvw_create_by' => 1,
        ]);
    }
}
