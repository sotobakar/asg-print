<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        if ($request->input('status_pembelian') == 'sent') {
            foreach($order->items as $item) {
                $current_stock = $item->sku->stok - $item->jumlah;
                if ($current_stock < 0) {
                    return back()->withErrors(['Stok barang tidak cukup, silahkan tambah terlebih dahulu.']);
                }

                $item->sku->update([
                    'stok' => $current_stock
                ]);
            }
        }

        $order->update([
            'status_pembelian' => $request->input('status_pembelian')
        ]);

        return back();
    }
}
