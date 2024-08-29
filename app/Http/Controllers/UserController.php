<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'name' => 'required'
        ]);
        try {

            $existedUser = User::where('email', $request->email)->first();

            if($existedUser) {
                return response()->json([
                    'code' => 409,
                    'status' => 'conflict',
                    'message' => 'email already existed'
                ], 409);
            }

            $data = User::create([
                'email' => $request->email,
                'password' => $request->password,
                'name' => $request->name,
            ]);


            if ($data) {
                return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'data' => $data
                ], 200);
            }

        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'fail',
                'message' => $e
            ], 500);
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'user' => $user,
                    'token' => $token
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'fail',
                'message' => $e
            ], 500);
        }
    }
}
