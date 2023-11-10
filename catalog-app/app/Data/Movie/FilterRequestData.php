<?php

namespace App\Data\Movie;

use Spatie\LaravelData\Data;

class FilterRequestData extends Data
{
    public function __construct(
        public ?string $dateFrom,
        public ?string $dateTo,
        public ?float $ratingFrom,
        public ?float $ratingTo,
        public ?array $actorIds,
        public ?int $directorId
    ) {}
}
