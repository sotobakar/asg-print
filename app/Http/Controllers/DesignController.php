<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\PrintDesign;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();
        return view('customer.design.form', [
            'categories' => $categories,
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'All Size', 'Normal']
        ]);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'kategori_produk' => ['required', 'integer'],
            'letak_sablon' => ['required', 'string'],
            'bahan_produk' => ['required', 'string'],
            'warna' => ['required', 'string'],
            'kode_warna' => ['required', 'string'],
            'jumlah' => ['required', 'integer'],
            'ukuran' => ['required', 'string'],
            'catatan' => ['sometimes', 'nullable', 'string']
        ]);

        // Buat Produk sesuai jenis produk dengan nama Custom Order, SKU sesuai warna dan ukuran
        $product = Product::where('nama_produk', 'Custom Sablon')
            ->where('id_kategori', $validated['kategori_produk'])
            ->first();

        $sku = $product->skus()->create([
            'ukuran' => $validated['ukuran'],
            'stok' => $validated['jumlah'],
            'warna' => $validated['warna'],
            'kode_warna' => $validated['kode_warna']
        ]);

        $desain_depan = $request->file('desain_depan');
        $desain_belakang = $request->file('desain_belakang');
        // Save foto desain depan dan belakang jika ada
        if (isset($desain_depan)) {
            $desain_depan_path = Storage::disk('public')->putFile('desain_depan', $desain_depan);

            $validated['desain_depan'] = $desain_depan_path;
        }

        if (isset($desain_belakang)) {
            $desain_belakang_path = Storage::disk('public')->putFile('desain_belakang', $desain_belakang);

            $validated['desain_belakang'] = $desain_belakang_path;
        }

        // ID Sku beserta data custom sablon diinsert ke tabel desain_sablon
        $validated['id_sku'] = $sku->id;
        PrintDesign::create($validated);

        // Insert ke keranjang dengan SKU tersebut, lalu arahkan user ke halaman checkout
        Cart::create([
            'id_user' => auth()->id(),
            'id_sku' => $sku->id,
            'jumlah' => $validated['jumlah']
        ]);
        return redirect()->route('customer.cart')->with('success', 'Barangmu berhasil ditambahkan di keranjang nih. Ayo checkout!');
    }
}
