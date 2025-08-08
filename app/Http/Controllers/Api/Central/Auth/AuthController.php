<?php

namespace App\Http\Controllers\Api\Central\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\UserLoginRequest;
use App\Models\Central\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->error('Invalid credentials', 401);
        }

        $token = $user->createToken('api-token', ['*'], now()->addHours(1));

        $expiresAt = $token->accessToken->expires_at;

        return $this->success('Success', 200, [
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'expires_in' => $expiresAt ? now()->diffInSeconds($expiresAt) : null,
            'exp' => $expiresAt ? $expiresAt->timestamp : null
        ]);
    }
}
