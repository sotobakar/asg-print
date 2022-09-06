<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Attempt to login.
     */
    public function login(Request $request) {
        return view('customer.products.index');
    }

    /**
     * Register new customer.
     */
    public function register(Request $request) {
        return view('customer.products.index');
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
