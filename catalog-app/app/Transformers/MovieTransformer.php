<?php

namespace App\Transformers;

use App\Models\Movie;
use Flugg\Responder\Transformers\Transformer;

class MovieTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [
        'actors' => ActorTransformer::class,
        'director' => DirectorTransformer::class
    ];

    public function transform(Movie $movie): array
    {
        return [
            'id' => $movie->id,
            'name' => $movie->name,
            'rating' => $movie->rating,
            'date' => $movie->date,
        ];
    }
}
