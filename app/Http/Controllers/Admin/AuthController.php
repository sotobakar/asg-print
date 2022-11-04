<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Authenticate the "admin" user.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors('Username atau password Anda salah.');
        }
    }

    /**
     * View login page of admin.
     */
    public function loginPage(Request $request)
    {
        return view('admin.auth.login');
    }

    /**
     * Log user out of session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
