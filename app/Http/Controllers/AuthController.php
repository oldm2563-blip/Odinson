<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form()
    {
        if (!auth()->check()) {
            return view('auth.login');
        } else {
            return redirect('/');
        }
    }
    public function register_form()
    {
        if (!auth()->check()) {
            return view('auth.register');
        } else {
            return redirect('/');
        }
    }
}
