<?php

namespace App\Http\Requests\Movie;

use App\Data\Movie\IndexRequestData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['string'],

            'filter.dateFrom' => ['string'],
            'filter.dateTo' => ['string'],
            'filter.ratingFrom' => ['numeric', 'between:0,10.0'],
            'filter.ratingTo' => ['numeric', 'between:0,10.0'],
            'filter.actorIds' => ['array'],
            'filter.actorIds.*' => ['integer', 'exists:actors,id'],
            'filter.directorId' => ['integer'],

            'sort.date' => ['in:asc,desc'],
            'sort.rating' => ['in:asc,desc']
        ];
    }

    public function getData(): IndexRequestData
    {
        return IndexRequestData::from($this->validated());
    }
}
