<?php

namespace App\Transformers;


use App\Models\Director;
use Flugg\Responder\Transformers\Transformer;

class DirectorTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(Director $director)
    {
        return [
            'id' => $director->id,
            'full_name' => $director->full_name
        ];
    }
}
