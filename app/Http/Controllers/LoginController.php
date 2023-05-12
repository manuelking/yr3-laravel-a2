<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Str;
use Hash;

class LoginController extends Controller
{


    // public function github() 
    // {
    //     // 
    //     return Socialite::driver('auth/login/github')->redirect();

    // }


    // public function githubRedirect() 
    // {
    //     // 
    // }




    public function login(Request $request)
    {
        return view('auth/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
