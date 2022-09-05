<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show products sorted by name.
     */
    public function index(Request $request) {
        $products = DB::table('produk')
            ->limit(4)
            ->get();
        
        $products = $products->map(function ($obj) {
            $obj->harga_produk = number_format($obj->harga_produk);
            return $obj;
        });

        return view('customer.products.index', [
            'products' => $products
        ]);
    }
}
