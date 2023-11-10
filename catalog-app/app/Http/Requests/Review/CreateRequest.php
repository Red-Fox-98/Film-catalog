<?php

namespace App\Http\Requests\Review;

use App\Data\Review\CreateRequestData;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => ['string'],
            'rating' => ['numeric', 'between:0,10.0'],
        ];
    }

    public function getData(): CreateRequestData
    {
        return CreateRequestData::from($this->validated());
    }
}
