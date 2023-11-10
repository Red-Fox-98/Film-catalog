<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\LoginService;
use App\Services\RegisterService;

class AuthController extends Controller
{
    public function __construct(private LoginService $loginService, private RegisterService $registerService)
    {
    }

    public function register(RegisterRequest $request){
        $token = $this->registerService->register($request->getData());
        return responder()->success(['token' => $token])->respond();
    }

    public function login(LoginRequest $request){
        $token = $this->loginService->login($request->getData());
        return responder()->success(['token' => $token])->respond();
    }
}
