<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = User::where('role', 'customer')
                        ->paginate(10);

        foreach($customers as $customer) {
            $customer->total_pesanan = Order::where('id_user', $customer->id)->count();
        }

        return view('admin.customers.index', [
            'customers' => $customers
        ]);
    }
}
