<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm()
{
    return view('login'); 
}

    // Login method
    public function login(Request $request)
    {
        // Validasi input email dan password
        $data=$request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:3',
        ]);

        $user=User::where('email', $data['email'])->first();
     
        // $credentials = $request->only('email', 'password');
        
        if(!$user||!Hash::check($data['password'], $user->password)){
            return response([
                'message' => 'gagal login',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return[
            'user' => $user,
            'token' => $token,
        ];
    }

    // Logout method
    public function logout(Request $request)
    {
        // Pastikan pengguna sudah terautentikasi
        $request->user()->tokens->each(function ($token) {
            $token->delete();  // Hapus semua token pengguna
        });

        return response()->json(['message' => 'Successfully logged out']);
    }

    // Register method
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',  
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Buat token untuk pengguna
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token,
        ], 201);
    }
}
