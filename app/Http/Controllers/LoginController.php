<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{

    public function store(Request $req) {

        if (!$req->email) {
            $errors[] = 'Provide an email';
        }
        if(!$req->password) {
            $errors[] = 'Provide a password';
        }
        if(isset($errors)) {
            return response()->json([
                'message' => $errors
            ], 400);
        }

        $token = Auth::attempt($req->only('email', 'password'));

        if($token) {
            return response()->json([
                'data' => [
                    'token' => $token,
                    'email' => $req->email
                ],
                'message' => 'Token generated'
                ], 201);
        } else {
            return response()->json([
                'data' => [],
                'message' => 'Invalid User'
            ], 401);
        }
        
        
    }

    public function destroy() {
        
    }
}
