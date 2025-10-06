<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [], [
            'email' => __('Email'),
            'password' => __('Kata Sandi')
        ]);

        if (Auth::attempt($credentials, $request->remember ?? false)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('message', __('Email atau Kata Sandi salah.'))->onlyInput('email');
    }
}
