<?php

namespace Database\Factories;

use App\Models\Period;
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
            'period_id' => Period::inRandomOrder()->first()->id, // Assuming period_id is nullable
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($figure) {
            // Attach random domains if needed
            $domains = \App\Models\Domain::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $figure->domains()->attach($domains);
        });
    }
}
