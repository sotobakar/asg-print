<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Return admin dashboard view
     */
    public function index(Request $request) {
        $statistics = [
            'customers_total' => 10,
            'orders_sent' => 5,
            'products_sold' => 12,
            'revenue_total' => 1500000,
            'orders_total' => 7,
            'products_total' => 20 
        ];

        return view('admin.index', [
            'statistics' => $statistics
        ]);
    }
}
