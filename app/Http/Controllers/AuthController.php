<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Attempt to login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            // Kalau bukan customer tidak bisa login
            if (Auth::user()->role != 'customer') {
                Auth::logout();
                return back()->withErrors([
                    'Anda bukan customer. Silahkan login ke bagian admin'
                ]);
            }

            $request->session()->regenerate();

            return redirect('/');
        } else {
            return back()->withErrors([
                'Username atau password Anda salah.'
            ]);
        }
    }

    /**
     * Log user out of session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Register new customer.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'nama' => 'required|string|regex:/^[a-zA-Z ]*$/',
            'phone' => 'required|starts_with:0',
            'password' => 'required|confirmed',
            'alamat' => 'required'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create([
            'email' => $validated['email'],
            'nama' => $validated['nama'],
            'password' => $validated['password'],
            'telepon' => $validated['phone'],
            'alamat' => $validated['alamat'],
            'role' => 'customer'
        ]);

        Auth::login($user);

        return redirect()->route('customer.home');
    }

    /**
     * View login page of user.
     */
    public function loginPage(Request $request)
    {
        return view('customer.auth.login');
    }

    /**
     * View register page of user.
     */
    public function registerPage(Request $request)
    {
        return view('customer.auth.register');
    }

    /**
     * View under construction page.
     */
    public function underConstruction(Request $request)
    {
        return view('customer.errors.under_construction');
    }
}
