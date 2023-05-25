<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    // Register
    public function register(Request $request){
        
        $user = User::create([
            "name"=>request("name"),
            "email"=>request("email"),
            "password"=>Hash::make($request->password),
            "phone_number"=>request("phone_number"),
        ]);
    
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json(['create success'=>true, 'data'=>$user, 'token'=>$token],201);
    
    }

    // Login
    public function login(AuthenticationRequest $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['user'=>$user, 'token'=>$token]);
        }
        return response()->json(['message'=>'Invalid credentials'], 401);
    }

    // Logout
    public function logout(Request $request) {
        $userLogout = (request()->user()->tokens()->delete());
        $userLogout = Auth::user();
        return response()->json(['message' => "logout seccess", 'data' => $userLogout],200);
    
    }
}
