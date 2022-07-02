<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only("email","password"))){
            // return "loggin :)";
            $token = $request->user()->createToken("api");
            return ['token' => $token->plainTextToken];
        }
        // return "ooooooops :(";
    }
}
