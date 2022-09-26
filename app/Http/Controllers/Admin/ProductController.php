<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category'])
                            ->orderBy('id_produk', 'desc')
                            ->paginate(10);
                            
        foreach($products as $product) {
            $product->stok = ProductSku::where('id_produk', $product->id_produk)
                                        ->sum('stok');
        }

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function detail(Request $request, Product $product)
    {
        return view('admin.products.index');
    }
}
