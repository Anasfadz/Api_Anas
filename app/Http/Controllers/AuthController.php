<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if($user === null) {
            return response()->json(
                [
                    'message' => 'User not found',
                    'status' => false,
                ], 
                401
            );
        }

        if(!$user || !Hash::check($password, $user->password)) {
            return response()->json(
                [
                    'message' => 'Invalid credentials',
                    'status' => false,
                ], 
                401
            );
        }

        return response()->json(
            [
                'message' => 'Login successful',
                'status' => true,
            ],
            200
            );
    }
}
