<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $this->call([
            UsersSeeder::class,
            RolesSeeder::class,
            MajorsSeeder::class,
            ClassesSeeder::class,
        ]);

        // User::factory(10)->create();


        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'usr_role_id' => 1,
            'usr_created_by' => 1,
            'usr_updated_by' => null,
            'usr_deleted_by' => null,
            'usr_created_at' => now(),
            'usr_updated_at' => now(),
            'usr_sys_note' => 'Initial admin user',
        ]);

        DB::table('roles')->insert([
            'rl_name' => 'Admin',
            'rl_description' => 'Administrator role',
            'rl_created_by' => 1,
            'rl_created_at' => now(),
            'rl_updated_at' => now(),
        ]);

        DB::table('majors')->insert([
            'mjr_name' => 'Teknik Informatika',
            'mjr_created_by' => 1,
            'mjr_created_at' => now(),
            'mjr_updated_at' => now(),
        ]);


        DB::table('classes')->insert([
            'cls_level' => 1,
            'mjr_id' => 1,
            'cls_number' => 1,
            'cls_created_by' => 1,
            'cls_created_at' => now(),
            'cls_updated_at' => now(),
        ]);

        DB::table('locations')->insert([
            'lcn_name' => 'Lokasi A',
            'lcn_block' => 'Block-01',
            'lcn_img_path' => 'images/locations/lokasi_a.jpg',
            'lcn_created_by' => 1,
            'lcn_created_at' => now(),
            'lcn_updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'pst_content' => 'Konten Postingan 1',
            'pst_date' => '2025-08-01',
            'pst_img_path' => 'images/posts/post1.jpg',
            'pst_description' => 'Deskripsi postingan 1',
            'pst_created_by' => 1,
            'pst_created_at' => now(),
            'pst_updated_at' => now(),
        ]);

        DB::table('reviews')->insert([
            'post_id' => 1,
            'user_id' => 1,
            'rvw_nilai' => 5,
            'rvw_created_by' => 1,
            'rvw_created_at' => now(),
            'rvw_updated_at' => now(),
        ]);

        DB::table('plants')->insert([
            'pts_name' => 'Tanaman A',
            'pts_date' => '2025-08-03',
            'pts_img_path' => 'images/plants/plant_a.jpg',
            'pts_description' => 'Deskripsi tanaman A',
            'location_id' => 1,
            'pts_created_by' => 1,
            'pts_created_at' => now(),
            'pts_updated_at' => now(),
        ]);

        DB::table('reports')->insert([
            'post_id' => 1,
            'rps_created_by' => 1,
            'rps_created_at' => now(),
            'rps_updated_at' => now(),
        ]);

        DB::table('typeplants')->insert([
            'tps_type' => 'Jenis A',
            'tps_created_by' => 1,
            'tps_created_at' => now(),
            'tps_updated_at' => now(),
        ]);

        DB::table('trashcan')->insert([
            'tbg_name' => 'Trash Bag A',
            'tbg_level' => 1,
            'tbg_code' => 'TBG-001',
            'tbg_img_path' => 'images/trashbags/tbg_a.jpg',
            'tbg_weight_kg' => '10',
            'locations_id' => 1,
            'tbg_created_by' => 1,
            'tbg_created_at' => now(),
            'tbg_updated_at' => now(),
        ]);
    }
}
