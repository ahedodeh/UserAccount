<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api", ["except" => ["login"]]);
    }


    public function login(LoginRequest $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $this->createNewToken($user);
        return response()->json(['message' => 'Login successful','token' => $token]);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

    public function createNewToken($user)
    {
        $token = JWTAuth::fromUser($user);
        $jwtTTL = JWTAuth::factory()->getTTL();
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $jwtTTL * 60,
            'user' => $user,
        ];
    }

}
