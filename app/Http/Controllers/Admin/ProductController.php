<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category'])
            ->orderBy('id_produk', 'desc')
            ->paginate(10);

        foreach ($products as $product) {
            $product->stok = ProductSku::where('id_produk', $product->id_produk)
                ->sum('stok');
            $product->terjual = OrderItem::whereHas('order', function (Builder $query) {
                $query->where('status_pembelian', 'sent');
            })
            ->whereHas('sku.product', function (Builder $query) use ($product) {
                $query->where('id_produk', $product->id_produk);
            })->sum('jumlah');
        }

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function detail(Request $request, Product $product)
    {
        $categories = Category::get();

        return view('admin.products.detail', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if (isset($validated['foto_produk'])) {
            /** @var \Illuminate\Http\UploadedFile */
            $photo = $validated['foto_produk'];
            
            // Delete old image
            Storage::disk('public')->delete($product->foto_produk);

            // Upload new image and update path
            $updated_path = Storage::disk('public')->putFile('foto_produk', $photo);
            $validated['foto_produk'] = $updated_path;
        }
        $product->update($validated);

        dd($product);
    }

    public function skuCreatePage(Request $request, Product $product)
    {
        return view('admin.products.sku.create', [
            'product' => $product,
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'All Size', 'Normal']
        ]);
    }

    public function skuCreate(Request $request, Product $product)
    {
        // Validate SKU
        $validated = $request->validate([
            'ukuran' => ['required'],
            'stok' => ['required', 'integer'],
            'warna' => ['required', 'string'],
            'kode_warna' => ['required', 'string']
        ]);

        $product->skus()->create([
            'ukuran' => $validated['ukuran'],
            'kode_warna' => $validated['kode_warna'],
            'warna' => $validated['warna'],
            'stok' => $validated['stok'],
        ]);

        return redirect()->route('admin.products.detail', ['product' => $product])->with('success', 'SKU untuk ' . ucwords($product->category->nama_kategori) . ' ' . $product->nama_produk . ' Berhasil dibuat');
    }

    public function skuEditPage(Request $request, Product $product, ProductSku $sku)
    {
        return view('admin.products.sku.edit', [
            'sku' => $sku,
            'product' => $product,
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'All Size', 'Normal']
        ]);
    }

    public function skuUpdate(Request $request, Product $product, ProductSku $sku)
    {
        // Validate SKU
        $validated = $request->validate([
            'ukuran' => ['required'],
            'stok' => ['required', 'integer'],
            'warna' => ['required', 'string'],
            'kode_warna' => ['required', 'string']
        ]);

        $sku->update($validated);

        return redirect()->route('admin.products.skus.edit', [
            'product' => $product->id_produk,
            'sku' => $sku->id
        ])->with('success', 'Update data SKU berhasil.');
    }

    public function createPage(Request $request)
    {
        // List of Categories
        $categories = Category::get();

        return view(
            'admin.products.create',
            [
                'categories' => $categories
            ]
        );
    }

    public function create(CreateProductRequest $request)
    {
        $data = $request->validated();

        // Save file to storage
        $foto_produk_path = Storage::disk('public')->putFile('foto_produk', $request->file('foto_produk'));

        // Save Product to database
        $category = Category::where('id_kategori', $data['kategori_produk'])->first();
        $category->products()->create([
            'nama_produk' => $data['nama_produk'],
            'harga_produk' => $data['harga_produk'],
            'deskripsi_produk' => $data['deskripsi'],
            'foto_produk' => $foto_produk_path
        ]);

        return redirect()->route('admin.products')->with('success', 'Produk ' . $data['nama_produk'] . ' berhasil dibuat.');
    }
}
