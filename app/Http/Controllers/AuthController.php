<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields=$request->validate([
            'name'=> 'required| string',
            'email' =>'required|email|unique:users',
            'password'=> 'required|string| confirmed'
        ]);
        $user=User::create([
            'name'=> $fields['name'],
            'email' => $fields['email'],
            'password'=> bcrypt($fields['password'])
        ]);
        
        $token=$user->createToken('tokenKey')->plainTextToken;

        $response=[
            'user'=>$user,
            'toke'=>$token,
        ];

        return response($response,201);
    }

    public function logout(Request $request){
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });
    
        return response()->json('Successfully logged out');
    }

    public function login(Request $request)
    {
        $fields=$request->validate([
            'email' =>'required|email',
            'password'=> 'required|string'
        ]);

        $user=User::where('email',$fields['email'])->first();

        if(!$user|| !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>"Bad credit"
            ],401);
        }
        
        $token=$user->createToken('tokenKey')->plainTextToken;

        $response=[
            'user'=>$user,
            'toke'=>$token,
        ];

        return response($response,201);
    }
}
