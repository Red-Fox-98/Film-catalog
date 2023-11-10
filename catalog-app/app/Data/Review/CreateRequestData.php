<?php

namespace App\Data\Review;

use Spatie\LaravelData\Data;

class CreateRequestData extends Data
{
    public function __construct(
            public string $text,
            public float $rating,
    ) {}
}
