<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name'      => 'required|min:3|max:255',
            // 'username'  => 'required|min:3|max:255|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:7|max:255|confirmed',
        ]);
        User::create($attributes);

        return redirect()->route('home');
    }
}
