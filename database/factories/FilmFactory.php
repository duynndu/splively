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
            'name' => 'phim vui vẻ',
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'duration' => $this->faker->numberBetween(60, 180), 
            'release_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),

            'trailer' => $this->faker->url,
            'genre_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
