<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Figure>
 */
class FigureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'birth_name' => fake()->name(),
            'birth_date' => fake()->date(),
            'birth_place' => fake()->city(),
            'death_date' => fake()->date(),
            'death_place' => fake()->city(),
            'nationality' => fake()->country(),
            'short_description' => fake()->text(50),
            'gender' => fake()->randomElement(['male','female']),
            'portrait_url' => fake()->imageUrl(),
            'biography' => fake()->text(200),
            'isVerified' => fake()->boolean(),
        ];
    }
}
