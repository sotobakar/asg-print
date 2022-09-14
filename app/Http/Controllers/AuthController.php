<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Attempt to login.
     */
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    /**
     * Register new customer.
     */
    public function register(Request $request) {
        Log::info(App::currentLocale());
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'nama' => 'required|string|alpha',
            'phone' => 'required|starts_with:0',
            'password' => 'required|confirmed',
            'alamat' => 'required'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('customer.index');
    }

    /**
     * View login page of user.
     */
    public function loginPage(Request $request) {
        return view('customer.auth.login');
    }

    /**
     * View register page of user.
     */
    public function registerPage(Request $request) {
        return view('customer.auth.register');
    }

    /**
     * View under construction page.
     */
    public function underConstruction(Request $request) {
        return view('customer.errors.under_construction');
    }


}
