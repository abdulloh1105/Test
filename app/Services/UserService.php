<?php

namespace App\Services;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function resigter($params)
    {
        return User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password']),
        ]);
    }

    public function login($params)
    {
        $user = User::whereEmail($params['email'])->first();
        if ($user instanceof User){
            if (Hash::check($params['password'], $user->password)){
                $token = $user->createToken('Access Token');
                return $token->plainTextToken;
            }
            return false;
        }
        return false;
    }
}
