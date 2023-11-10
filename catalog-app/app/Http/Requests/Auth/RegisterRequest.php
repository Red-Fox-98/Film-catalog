<?php

namespace App\Http\Requests\Auth;

use App\Data\Auth\RegisterRequestData;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function getData(): RegisterRequestData
    {
        return RegisterRequestData::from($this->validated());
    }
}
