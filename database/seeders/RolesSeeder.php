<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::factory()->create([
            'rl_name' => 'Admin',
            'rl_description' => 'Administrator role',
            'rl_create_by' => 1,
        ]);
    }
}
