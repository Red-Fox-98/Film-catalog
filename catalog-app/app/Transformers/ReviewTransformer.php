<?php

namespace App\Transformers;

use App\Models\Review;
use Flugg\Responder\Transformers\Transformer;

class ReviewTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(Review $review)
    {
        return [
            'id' => (int) $review->id,
        ];
    }
}
