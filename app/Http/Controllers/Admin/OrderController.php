<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['user', 'payment'])
                        ->orderBy('id_pembelian', 'desc')
                        ->paginate(10);
        
        // Filter order by status

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }
    
    public function detail(Request $request, Order $order)
    {
        $order = $order->load(['items', 'user']);

        return view('admin.orders.detail', [
            'order' => $order
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update([
            'status_pembelian' => 'sent'
        ]);

        return back();
    }
}
