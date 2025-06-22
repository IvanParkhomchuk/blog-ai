<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $blogIds = Blog::pluck('id')->toArray();

        Post::factory()
            ->sequence(fn () => ['blog_id' => fake()->randomElement($blogIds)])
            ->count(15)->create();
    }
}
