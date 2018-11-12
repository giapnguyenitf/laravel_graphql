<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only([
            'email',
            'password',
        ]);

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could not create token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json($user);
    }
}
