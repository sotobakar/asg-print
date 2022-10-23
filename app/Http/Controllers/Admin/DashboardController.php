<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ongkir;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Return admin dashboard view
     */
    public function index(Request $request) {
        $statistics = [
            'orders_total' => 7,
            'products_total' => 20 
        ];
        $statistics['customers_total'] = User::where('role', 'customer')->count();
        $statistics['orders_sent'] = Order::where('status_pembelian', 'sent')->count();
        $statistics['products_sold'] = OrderItem::whereHas('order', function (Builder $query) {
            $query->where('status_pembelian', 'sent');
        })->sum('jumlah');
        $statistics['revenue_total'] = OrderItem::whereHas('order', function (Builder $query) {
            $query->where('status_pembelian', 'sent');
        })->sum('subharga');
        $statistics['revenue_total'] += Order::with(['ongkir'])->where('status_pembelian', 'sent')->get()->sum('ongkir.tarif');
        $statistics['orders_total'] = Order::count();
        $statistics['products_total'] = Product::count();

        return view('admin.index', [
            'statistics' => $statistics
        ]);
    }
}
