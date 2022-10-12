<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show products sorted by name.
     */
    public function index(Request $request)
    {
        $products = [];

        // TODO: Get 4 products for each category
        $categories = Category::where('nama_kategori', '!=', 'custom')->get();

        foreach ($categories as $category) {
            $products[$category->nama_kategori] = Product::where('id_kategori', $category->id_kategori)
                ->limit(4)
                ->get();
        }

        return view('customer.products.index', [
            'all_products' => $products
        ]);
    }

    /**
     * Show product detail page.
     */
    public function detail(Request $request, Product $product)
    {
        $color = $request->query('color');

        $skus = [];
        if ($color) {
            $skus = ProductSku::where('id_produk', $product->id_produk)
                ->where('warna', $color)
                ->where('stok', '!=', 0)
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

    public function listByCategory(Request $request, Category $category)
    {
        return view('customer.products.by_category', [
            'category' => $category,
            'products' => $category->products
        ]);
    }
}
