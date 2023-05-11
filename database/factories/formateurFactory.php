<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class formateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom'=> fake()->firstName(40),
            'prenom'=>fake()->lastName(40),
            //'ville' => fake()->city,
            'age'=>fake()->numberBetween(28,60),

        ];
    }
}
