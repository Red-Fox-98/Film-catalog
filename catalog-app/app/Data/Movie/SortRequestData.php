<?php

namespace App\Data\Movie;

use Spatie\LaravelData\Data;

class SortRequestData extends Data
{
    public function __construct(
        public ?string $date,
        public ?string $rating,
    ) {}
}
