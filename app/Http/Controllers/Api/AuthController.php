<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return $this->error('Invalid Credentials', Response::HTTP_UNAUTHORIZED);
        }
        $user = User::firstWhere('email', $request->email);
        // to change default expiration date go to config/sanctum.php
        return $this->ok('Authenticated', [
            'token' => $user->createToken('Api Token for '.$user->email, ['*'], now()->addWeek())->plainTextToken,
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete(); // documentation say nothing for the warning here

        return $this->ok('Logged out');
    }

    public function register()
    {
        // return $this->ok('Register successfully');
    }
}
