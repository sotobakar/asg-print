<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cartItem = Cart::where('id_user', auth()->id())
            ->where('id_sku', $request->input('sku')[0])
            ->first();

        // If item doesn't exists then add to cart else increment
        if (!$cartItem) {
            Cart::create([
                'id_user' => auth()->id(),
                'id_sku' => $request->input('sku')[0],
                'jumlah' => 1
            ]);
        } else {
            $cartItem->increment('jumlah');
        }

        return back()->with('success', 'Berhasil menambah ke keranjang!');
    }

    public function userCart(Request $request)
    {
        $cart = Cart::where('id_user', auth()->id())
            ->with('sku.product.category')
            ->get();

        $subtotal = 0;
        foreach ($cart as $cartItem) {
            $subtotal += $cartItem->sku->product->harga_produk * $cartItem->jumlah;
        }

        $cities = DB::table('ongkir')
                    ->get();

        $ongkir = 10000;

        return view('customer.cart.index', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'cities' => $cities,
            'ongkir' => $ongkir,
            'total' => $subtotal + $ongkir
        ]);
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'jumlah' => $request->input('quantity')
        ]);

        return back()->with('success', 'Keranjang diupdate');
    }

    public function remove(Request $request, Cart $cart)
    {
        $cart->delete();

        return back()->with('success', 'Keranjang diupdate');
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('id_user', auth()->id())
            ->get();

        $subtotal = 0;
        foreach ($cart as $cartItem) {
            $subtotal += $cartItem->sku->product->harga_produk * $cartItem->jumlah;
        }

        // Get city destination (for ongkir)
        $city_destination = $request->input('kota_tujuan');
        $ongkir = DB::table('ongkir')
            ->where('id_ongkir', $city_destination)
            ->first();

        // Get customer address if box checked (else get custom address)
        $address = '';
        if ($request->input('my_address')) {
            $address = auth()->user()->alamat;
        } else {
            $address = $request->input('alamat_lengkap');
        }

        // Create order
        $order = DB::table('pembelian')
                    ->insertGetId([
                        'id_user' => auth()->id(),
                        'id_ongkir' => $ongkir->id_ongkir,
                        'tanggal_pembelian' => Carbon::now('Asia/Jakarta')->toDateString(),
                        'total_pembelian' => $subtotal + $ongkir->tarif,
                        'alamat_pengiriman' => $address,
                        'status_pembelian' => 'pending'
                    ]);
        
        // Insert items from cart
        foreach($cart as $cartItem) {
            DB::table('pembelian_produk')
                ->insert([
                    'id_pembelian' => $order,
                    'id_sku' => $cartItem->sku->id,
                    'jumlah' => $cartItem->jumlah,
                    'nama' => $cartItem->sku->product->nama_produk,
                    'harga' => $cartItem->sku->product->harga_produk,
                    'subharga' => $cartItem->sku->product->harga_produk * $cartItem->jumlah
                ]);
        }

        // Delete user cart
        foreach ($cart as $cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('customer.orders');
    }
}
