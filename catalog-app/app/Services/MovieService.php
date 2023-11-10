<?php

namespace App\Services;

use App\Data\Movie\IndexRequestData;
use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;
use Meilisearch\Endpoints\Indexes;

final class MovieService
{
    final public function index(IndexRequestData $dto): LengthAwarePaginator
    {
        $movies = Movie::search($dto->search, function (Indexes $indexes, ?string $query, array $params) use ($dto) {
            $filters = [];

            if ($dto->filter?->dateFrom) {
                $filters[] = "date > " . strtotime($dto->filter->dateFrom);
            }

            if ($dto->filter?->dateTo) {
                $filters[] = "date < " .  strtotime($dto->filter->dateTo);
            }

            if ($dto->filter?->ratingFrom) {
                $filters[] = "rating < {$dto->filter->ratingFrom}";
            }

            if ($dto->filter?->ratingTo) {
                $filters[] = "rating > {$dto->filter->ratingTo}";
            }

            if ($dto->filter?->directorId) {
                $filters[] = "directorId = {$dto->filter->directorId}";
            }

            if ($dto->filter?->actorIds) {
                $actorFilters = [];
                foreach ($dto->filter->actorIds as $actorId) {
                    $actorFilters[] = "actorIds = $actorId";
                }

                $filters[] = $actorFilters;
            }


            $sorts = [];
            if ($dto->sort?->date) {
                $sorts[] = "date:{$dto->sort->date}";
            }

            if ($dto->sort?->rating) {
                $sorts[] = "rating:{$dto->sort->rating}";
            }

            $params['filter'] = $filters;
            $params['sort'] = $sorts;

            return $indexes->search($query, $params);
        })->paginate();

        return $movies;
    }
}
