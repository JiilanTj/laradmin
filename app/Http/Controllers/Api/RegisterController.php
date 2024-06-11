<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_handphone' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:male,female',
            'alergi_obat' => 'required|boolean', // Validasi boolean
            'keterangan_alergi' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Add default role if not provided
        $validatedData['role'] = User::ROLE_USER;

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'no_handphone' => $validatedData['no_handphone'],
            'alamat_lengkap' => $validatedData['alamat_lengkap'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'alergi_obat' => $validatedData['alergi_obat'],
            'keterangan_alergi' => $validatedData['keterangan_alergi'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Generate token
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }
}
