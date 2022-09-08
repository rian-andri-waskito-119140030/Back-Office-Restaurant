<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UjiLoginController extends Controller
{
    public function index()
    {
        $user = User::all();
        return new LoginResource(true, 'Data berhasil diambil', $user);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return new LoginResource(false, 'error', $validator->errors());
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('token')->plainTextToken;
                $response = [
                    'user' => $user,
                    'token' => $token
                ];
                return new LoginResource(true, 'Login berhasil', $user);
            } else {
                return new LoginResource(false, 'Password atau email salah', null);
            }
        } else {
            return new LoginResource(false, 'Email tidak terdaftar', null);
        }
    }
}
