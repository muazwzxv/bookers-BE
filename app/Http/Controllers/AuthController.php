<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function register(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required', 'max:55'],
            'email' => ['email', 'required'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        $validate['password'] = bcrypt($req->password);

        $user = User::create($validate);
        $token = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $token]);
    }

    public function login(Request $req)
    {
        $login = $req->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($login)) return response(['message' => 'Invalid credentials']);

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function me()
    {
        return response(['user' => auth()->user()]);
    }
}
