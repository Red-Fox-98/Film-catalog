<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var Movie $movie */
        $movie = Movie::query()->inRandomOrder()->first();
        $rating = rand(0, 10);

        return [
            'user_id' => User::factory(),
            'movie_id' => $movie->id,
            'text' => fake()->text,
            'rating' => $rating
        ];
    }
}
