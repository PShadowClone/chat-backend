<?php

namespace Auth\App\Http\Controllers;

use Auth\App\Models\PersonalAccessToken;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    /**
     * Sign in
     * @param \Auth\App\Http\Requests\Request $request
     * @return mixed
     * @throws \Exception
     * @author Amr
     */
    public function login(\Auth\App\Http\Requests\Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials) || Auth::attempt(['username' => $request->get('email'), 'password' => $request->get('password')])) {
            $user = Auth::user();
            return response()->vue(SUCCESS_RESPONSE, 'user has signed in successfully',
                [
                    'token' => $user->createToken('API_TOKEN', [])->plainTextToken,
                    'type' => 'Bearer',
                    'user' => $user,
                ]);
        } else {
            throw new \Exception('invalid credentials');
        }
    }
}
