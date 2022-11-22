<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required|string|min:2|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed|min:4',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('login');
    }
}
