<?php

namespace App\Services;

use App\Data\Review\CreateRequestData;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;

final class ReviewService
{
    public function __construct(private MovieService $movieService)
    {
    }

    final public function create(int $id, CreateRequestData $dto)
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var Review $review */
        $review = Review::query()->create([
            'user_id' => $user->id,
            'movie_id' => $id,
            'text' => $dto->text,
            'rating' => $dto->rating,
        ]);

        /** @var Movie $movie */
        $movie = Movie::query()->findOrFail($id);
        $rating = $this->movieService->ratingCalculation($movie);
        $movie->update([
            'rating' => $rating
        ]);

        return $review;
    }
}
