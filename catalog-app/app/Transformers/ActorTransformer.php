<?php

namespace App\Transformers;

use App\Models\Actor;
use Flugg\Responder\Transformers\Transformer;

class ActorTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(Actor $actor)
    {
        return [
            'id' => $actor->id,
            'full_name' => $actor->full_name
        ];
    }
}
