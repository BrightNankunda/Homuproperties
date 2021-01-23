<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('Token')->accessToken,
            'Message' => 'User created successfully'
        ]); 
    }
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();
        
        if(!$user || !Hash::check($request->password, $user->password)) {
             return response()->json([
                'message' => 'User not found!'
             ], 404);
            }

            
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('Token')->accessToken,
            'Message' => 'User Logged in successfully'
        ]);
    }

    public function dashboard()
    {
        return Auth::user();
    }
    

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json('Logged Out successfully');
    }
}
