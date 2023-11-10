<?php

namespace Database\Factories;

use App\Models\Director;
use App\Models\Preview;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'director_id' => Director::factory(),
            'preview_id' => Preview::factory(),
            'name' => fake()->word(),
            'date' => date('Y-m-d')
        ];
    }
}
