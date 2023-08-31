<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function generateTokenForUser(Request $request) {
        try {
            $user = User::where('email', $request->email)->first();
    
            if (!$user) {
                return response()->json([
                    "status" => false,
                    "message" => "User not found",
                ], 404);
            }
    
            return response()->json([
                "status" => true,
                "message" => "Token Generated Successfully!",
                "token" => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => "Error generating token",
                "error" => $th->getMessage()
            ], 500);
        }
    }
}
