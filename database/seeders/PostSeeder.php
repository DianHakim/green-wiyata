<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->create([
            'pst_content' => 'Konten Postingan 1',
            'pst_date' => '2025-08-01',
            'pst_img_path' => 'images/posts/post1.jpg',
            'pst_description' => 'Deskripsi postingan 1',
            'pst_create_by' => 1,
        ]);
    }
}
