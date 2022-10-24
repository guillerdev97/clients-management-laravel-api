<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        try {
            $validations = [
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ];
    
            $validator = Validator::make(
                $request->all(),
                $validations
            );
    
            if($validator->fails()) {
                $errors = $validator->errors();

                throw new Exception(
                    $errors,
                    400
                );
            }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
    
            return response()->json([
                'status' => 1,
                'msg' => 'User registered',
                'data' => $user
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => 0,
                'msg' => json_decode($e->getMessage()),
            ], $e->getCode());
        }
    }
}
