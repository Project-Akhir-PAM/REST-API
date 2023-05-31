<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Libraries\ResponseBase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        $credentials = $request->only('username', 'password');

        if (!$token = JWTAuth::attempt($credentials))
            return ResponseBase::error("Username atau password salah", 403);

        return ResponseBase::success('Login berhasil', ['token' => $token, 'type' => 'bearer']);
    }

    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'phone' => 'required|numeric|starts_with:62|min:5',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->save();

            return ResponseBase::success("Berhasil register!");
        } catch (\Exception $e) {
            return ResponseBase::error('Gagal register', 409);
        }
    }

    public function getUserData()
    {
        $user = JWTAuth::parseToken()->authenticate();

        return ResponseBase::success('Berhasil mendapatkan data profile', ['user' => $user]);
    }

    public function logout()
    {
        $token = JWTAuth::getToken();
        JWTAuth::setToken($token)->invalidate();

        return ResponseBase::success('Logout berhasil');
    }

    public function refreshToken()
    {    
        $token = JWTAuth::getToken();
        $refreshedToken = JWTAuth::refresh($token);

        return ResponseBase::success('Berhasil refresh token', ['token' => $refreshedToken, 'type' => 'bearer']);
    }
}
