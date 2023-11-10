<?php

namespace App\Data\Movie;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class IndexRequestData extends Data
{
    public function __construct(
        public ?string $search,
        public ?FilterRequestData $filter,
        public ?SortRequestData $sort,
    ) {}
}
