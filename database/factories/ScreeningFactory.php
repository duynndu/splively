<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Screening>
 */
class ScreeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'film_id' => fake()->numberBetween(1, 10),
            'room_number' => fake()->numberBetween(1, 10),
            'start_time' => fake()->date(),
            'end_time' => fake()->date(),
        ];
    }
}
