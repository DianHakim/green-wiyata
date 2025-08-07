<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Location;
use App\Models\Majors;
use App\Models\Plants;
use App\Models\Post;
use App\Models\Repotrs;
use App\Models\Review;
use App\Models\Roles;
use App\Models\Trash_Bag;
use App\Models\TrashCan;
use App\Models\Type_Plants;
use App\Models\TypePlants;
use App\Models\User;
use App\Models\Users;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // User::factory(10)->create();


        Users::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'usr_role_id' => 1,
            'usr_create_by' => 1,
            'usr_updated_by' => null,
            'usr_deleted_by' => null,
            'usr_sys_note' => 'Initial admin user',
        ]);

        Roles::factory()->create([
            'rl_name' => 'Admin',
            'rl_description' => 'Administrator role',
            'rl_create_by' => 1,
            'created_at' => $now,
        ]);

        Majors::factory()->create([
            'mjr_name' => 'Teknik Informatika',
            'mjr_create_by' => 1,
            'created_at' => $now,

        ]);


        Classes::factory()->create([
            'cls_level' => 1,
            'mjr_id' => 1,
            'cls_number' => 1,
            'cls_create_by' => 1,
            'created_at' => $now,

        ]);

        Location::factory()->create([
            'lcn_name' => 'Lokasi A',
            'lcn_block' => 'Block-01',
            'lcn_img_path' => 'images/locations/lokasi_a.jpg',
            'lcn_create_by' => 1,
        ]);

        Post::factory()->create([
            'pst_content' => 'Konten Postingan 1',
            'pst_date' => '2025-08-01',
            'pst_img_path' => 'images/posts/post1.jpg',
            'pst_description' => 'Deskripsi postingan 1',
            'pst_create_by' => 1,
        ]);

        Review::factory()->create([
            'post_id' => 1,
            'user_id' => 1,
            'rvw_nilai' => 5,
            'rvw_create_by' => 1,
        ]);

        Plants::factory()->create([
            'pts_name' => 'Tanaman A',
            'pts_date' => '2025-08-03',
            'pts_img_path' => 'images/plants/plant_a.jpg',
            'pts_description' => 'Deskripsi tanaman A',
            'location_id' => 1,
            'pts_create_by' => 1,
        ]);

        TypePlants::factory()->create([
            'tps_type' => 'Jenis A',
            'tps_create_by' => 1,
        ]);

        TrashCan::factory()->create([
            'tbg_name' => 'Trash Bag A',
            'tbg_level' => 1,
            'tbg_code' => 'TBG-001',
            'tbg_img_path' => 'images/trashbags/tbg_a.jpg',
            'tbg_weight_kg' => '10',
            'locations_id' => 1,

        ]);
    }
}