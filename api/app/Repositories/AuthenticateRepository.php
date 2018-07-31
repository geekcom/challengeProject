<?php

namespace API\Repositories;

use API\Models\User;
use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;

final class AuthenticateRepository implements AuthenticateRepositoryInterface
{
    protected $JWTAuth;
    protected $user;

    public function __construct(JWTAuth $JWTAuth, User $user)
    {
        $this->JWTAuth = $JWTAuth;
        $this->user = $user;
    }

    public function authJWT($request)
    {
        $data = $request->only('email', 'password');

        $user = $this->user->where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            $token = $this->JWTAuth->fromUser($user);
            return response()->json(['status' => 'success', 'data' => ['token' => $token]], 200);
        }

        return response()->json(['status' => 'fail', 'data' => ['email' => 'email is required', 'password' => 'password is required']], 401);
    }

}