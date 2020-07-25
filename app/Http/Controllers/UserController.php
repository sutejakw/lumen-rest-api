<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $hashPassoword = Hash::make($password);

        $user = User::create([
            'email' => $email,
            'password' => $hashPassoword
        ]);

        return response()->json([
            'message' => 'Success'
        ], 201);

    }

}