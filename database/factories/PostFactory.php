<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-1 year');
        return [
            'title'=> fake()->sentences(rand(1,6),asText:true),
            'content'=>fake()->paragraphs(rand(1,5),asText:true),
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
