<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'duration' => $this->faker->numberBetween(60, 180), // Giả sử thời lượng từ 60 phút đến 180 phút
            'release_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),

            'trailer' => $this->faker->url,
            'genre' => $this->faker->randomElement(['Action', 'Comedy', 'Drama', 'Horror', 'Sci-Fi']),
        ];
    }
}
