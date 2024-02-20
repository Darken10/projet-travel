<?php

namespace Database\Factories\Voyage;

use App\Models\Voyage\Ligne;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lignes = Ligne::all();
        return [
            'heure_depart'=> fake()->time(),
            'heure_arriver' =>fake()->time(),
            'ligne_id' => $lignes->random()->id,
            'user_id'=> rand(1,5),
        ];
    }
}
