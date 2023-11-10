<?php

namespace App\Services;

use App\Data\Auth\RegisterRequestData;
use App\Models\User;

final class RegisterService
{
    public function __construct()
    {

    }

    final public function register(RegisterRequestData $data)
    {
        /** @var User $user */
        $user = User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ]);

        return $user->createToken('Authorisation token')->plainTextToken;
    }
}
