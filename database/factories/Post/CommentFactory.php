<?php

namespace Database\Factories\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posts = Post::all();
        $users = User::all();
        $date = fake()->dateTimeBetween('-1 year');

        return [
            'comment' => fake()->paragraphs(rand(1,2),asText:true),
            'user_id' => $users->random()->id,
            'post_id' => $posts->random()->id,
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
