<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData)){
            return response([
                'message' => 'Invalid credintials'
            ]);
        }
        
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response([
            'accessToken' => $accessToken
        ]);
    }
}
