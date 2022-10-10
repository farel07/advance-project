<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = request(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if(!$token){
            return response()->json(['error' => 'unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
     }

     public function logout(){
        auth()->logout();
        return response()->json([
            'msg' => 'successfully logged out'
        ], 200);
     }

    //  public function refresh(){
    //     return response()->json([
    //         'access_token' => Auth::refresh(),
    //         'token_type' => 'bearer',
    //         'expires_in' => auth()->factory()->getTTL() * 60
    //     ]);
    //  }

     public function data(){
        return response()->json(auth()->user());
     }
}
