<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['login'])->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }
        if ($user->password != Hash::check($data['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid password',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'token' => $user->token,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $user = User::where('email', $request->header('login'))->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }
        $user->token = Str::random(40);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful',
        ]);
    }
}
