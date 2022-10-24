<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
{
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];    
    }

    public function checkValidation(Request $request) {
        $validator = Validator::make(
            $request->all(),
            $this->validations()
        );

        if($validator->fails()) {
            $errors = $validator->errors();

            return new Exception(
                json_encode($errors),
                400
            );
        }
    }
}
