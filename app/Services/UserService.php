<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function store($data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'phone_code' => $data['phone_code'],
        ]);

        return $user;
    }

    public function logout(Request $request)
    {
        return $request->user()->token()->revoke();
    }
}
