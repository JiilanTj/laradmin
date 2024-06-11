<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\LoginResource; // Import LoginResource

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email_or_phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $field = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_handphone';
        $credentials = [
            $field => $request->email_or_phone,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // $token = $user->createToken('authToken')->plainTextToken;

            return new LoginResource($user); // Menggunakan LoginResource untuk mengubah respons
        }

        throw ValidationException::withMessages([
            'email_or_phone' => [__('auth.failed')],
        ]);
    }
}
