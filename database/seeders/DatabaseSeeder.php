<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Users;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Users::factory()->create([
            'usr_name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'usr_role_id' => 1,
            'usr_create_by' => 1,
            'usr_updated_by' => null,
            'usr_deleted_by' => null,
            'usr_sys_note' => 'Initial admin user',
        ]);
    }
}
