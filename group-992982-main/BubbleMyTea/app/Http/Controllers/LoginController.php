<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentification(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]
        );

        // if the user is admin he will be redirected to the admin dashboard and he can't access the admin dashboard
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1])) {
            return redirect()->route('dashboardAdmin');
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 0])) {
            return redirect()->route('welcome');
        } else {
            return redirect()->route('login')->with('error', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        //
        auth()->logout();
        return redirect()->route('welcome');
    }
}
