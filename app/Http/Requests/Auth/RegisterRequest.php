<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'            => 'required|string',
            'last_name'             => 'required|string',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
            'phone'                 => 'required|integer',
            'phone_code'            => 'required|string',
        ];
    }

}
