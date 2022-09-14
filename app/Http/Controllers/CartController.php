<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
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

        $ongkir = 10000;

        return view('customer.cart.index', [
            'cart' => $cart,
            'subtotal' => $subtotal,
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

        return view('customer.cart', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }
}
