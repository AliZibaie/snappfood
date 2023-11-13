<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\auth\LoginRequest;
use App\Http\Requests\api\auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt($request->input())){
                $token = Auth::user()->createToken('Personal Access Token')->plainTextToken;
                return response()->json([
                    'status' => true,
                    'user'=>Auth::user(),
                    'token'=>$token,
                    'message'=>'شما لاگین شدید!'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'ایمیل یا پسورد شما اشتباه هست',
            ], 401);
        }catch (\Throwable $exception){
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->input());
            Auth::login($user);
                $token = Auth::user()->createToken('Personal Access Token')->plainTextToken;
                return response()->json([
                    'status' => true,
                    'user'=>Auth::user(),
                    'token'=>$token,
                    'message'=>'شما ثبت نام شدید!'
                ]);
        }catch (\Throwable $exception){
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return response()->json([
                'status' => true,
                'message' => 'شما باموفقیت خارج شدید.',
            ]);
        }catch (\Throwable $exception){
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
