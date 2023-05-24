<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function login(AuthenticationRequest $request){
        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            // dd($user);
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['user'=>$user, 'token'=>$token]);
        }
        return response()->json(['message'=>'Invalid credentials'], 401);
    }

    // public function logout(Request $request){
    //     $request->user()->tokens()->delete();
    //     return response()->json(['message' => 'Logout successfully']);
    // }

    public function logout() {
    
        // dd(1000);
     
        // $request->user()->tokens()->delete();
        $user = Auth::user();
        dd($user);
        return response()->json(['message' => 'Logout successfully']);
      
    }
}
