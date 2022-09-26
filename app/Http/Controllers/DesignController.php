<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function form(Request $request) {
        return view('customer.design.form');
    }

    public function submit(Request $request) {
        return view('customer.design.form');
    }
}
