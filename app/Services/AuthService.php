<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthService {

    public function login(array $loginDTO): array
    {
        if (Auth::attempt($loginDTO)) {
            return $this->createAuthToken();
        }

        return ['token' => null];
    }

    public function register(array $registerDTO): array
    {
        $candidate = User::where('email', $registerDTO['email'])->first();

        if (!$candidate) {
            $registerDTO['password'] = Hash::make($registerDTO['password']);
            $user = User::create($registerDTO);
            Auth::login($user);

            return $this->createAuthToken();
        }

        return ['token' => null];
    }

    private function createAuthToken(): array
    {
        $token = Auth::user()->createToken('auth');

        return ['token' => $token->plainTextToken];
    }

}
