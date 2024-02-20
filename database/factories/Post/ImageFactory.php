<?php

namespace Database\Factories\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    public static int $i = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        ImageFactory::$i = 1 + ImageFactory::$i;
        $i = ImageFactory::$i;
        $date = fake()->dateTimeBetween('-1 year');
        
        return [
            'url' => "images/posts/img_$i.jpg",
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
