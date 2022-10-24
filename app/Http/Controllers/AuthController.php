<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                'password' => Hash::make($request->password)
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

    public function login(LoginRequest $request) {
        try {
            $request->checkValidation($request);
    
            $user = User::where('email', '=', $request->email)->first();
    
            if(isset($user->id) === true) {
                if(Hash::check($request->password, $user->password)) {
                    $token = $user->createToken('auth_token')->plainTextToken;
    
                    return response()->json([
                        'status' => 1,
                        'msg' => 'User is logged in',
                        'data' => $user,
                        'access_token' => $token
                    ], 200);
                }
            }
        } catch(Exception $e){
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ], $e->getCode());
        }
       
    }
}
