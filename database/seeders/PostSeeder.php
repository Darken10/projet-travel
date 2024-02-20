<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Post\Image;
use App\Models\Post\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $tags = Tag::all();
        $images = Image::all();
        Post::factory(15)->sequence(fn () => [
            'user_id' => $users->random()
        ])
        ->create()
        ->each(fn ($post) => $post->tags()->attach($tags->random(rand(0,3))))
        ->each(fn ($post) => $post->images()->attach($images->random(rand(0,2))));
    }
}
