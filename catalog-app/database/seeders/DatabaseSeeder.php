<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Gallery;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use App\Services\MovieService;
use Database\Factories\GalleryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $movies = Movie::factory(1)->create();



        $movies->each(static function (Movie $movie) {
            Review::factory(9)->create(['movie_id' => $movie->id]);
            $movie->rating = app()->make(MovieService::class)->ratingCalculation($movie);
            $movie->save();

            Gallery::factory(5)->create(['movie_id' => $movie->id]);
            $genres = Genre::factory(3)->create();
            $actors = Actor::factory(7)->create();
            $movie->genres()->attach($genres->pluck('id'));
            $movie->actors()->attach($actors->pluck('id'));
        });
    }
}
