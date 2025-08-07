<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Users::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'usr_role_id' => 1,
            'usr_created_by' => 1,
            'usr_updated_by' => null,
            'usr_deleted_by' => null,
            'usr_sys_note' => 'Initial admin user',
        ]);
    }
}
