<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Registers a user
     *
     */

    public function register(RegisterRequest $request){
        $data = $request -> validated();
        $data['password'] = Hash::make($data['password']);
        $data['username'] = strstr($data['email'],'@',true);

        $user = User::create($data);
        $token = $user->crateToken(User::USER_TOKEN);

        return $this->success([
            'user'=>$user,
            'token' => $token->plainTextToken,
        ], 'User has been register successfully.')
    }

    public function login(){

    }

    public function loginWithToken(){

    }

    public function logout(){

    }
}
