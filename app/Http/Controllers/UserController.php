<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function store(Request $req) {

        if (!$req->email) {
            $errors[] = 'Provide an email';
        }
        if (!$req->password) {
            $errors[] = 'Provide a password';
        }
        if (isset($errors)) {
            return response()->json([
                'message' => $errors
            ], 400);
        }

        try {
            $user = User::create([
                'email' => $req->email,
                'password' => Hash::make($req->password)
            ]);
        
            if ($user) {
                return response()->json([
                    'data' => [
                        'email' => $req->email
                    ],
                        'message' => 'User Created'
                    ], 201);
            }
        } catch (Exception $e) {
            return response()->json([
                    'message' => $e->getMessage()
                ], 500);
        }
    }
}
