<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show products sorted by name.
     */
    public function index(Request $request)
    {
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

    /**
     * Show products sorted by name.
     */
    public function detail(Request $request, Product $product)
    {
        $color = $request->query('color');

        $skus = [];
        if ($color) {
            $skus = ProductSku::where('id_produk', $product->id_produk)
                ->where('warna', $color)
                ->get();
        }

        $product->harga_produk = number_format($product->harga_produk);
        $product_colors = ProductSku::select('warna', 'kode_warna')
                                    ->where('id_produk', $product->id_produk)
                                    ->distinct()
                                    ->get();

        return view('customer.products.detail', [
            'product' => $product,
            'skus' => $skus,
            'product_colors' => $product_colors
        ]);
    }
}
