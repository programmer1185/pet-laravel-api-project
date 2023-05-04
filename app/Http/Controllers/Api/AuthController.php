<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /** @var AuthService $authService */
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): Response
    {
        return response($this->authService->login($request->only('email', 'password')));
    }

    public function register(RegisterRequest $request): Response
    {
        return response($this->authService->register($request->only('name', 'email', 'password')));
    }
}
