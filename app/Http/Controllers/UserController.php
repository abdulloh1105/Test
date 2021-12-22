<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends ResponseController
{
    public function register(RegisterRequest $request){
        $user = (new UserService())->resigter($request->all());
        if ($user instanceof User){
            $token = $user->createToken('Access Token');
            return $this->success(['token' => $token->plainTextToken]);
        }
        return $this->error();
    }

    public function login(LoginRequest $request){
        $token = (new UserService())->login($request->all());
        if ($token)
            return $this->success($token);
        return $this->error();
    }
}
