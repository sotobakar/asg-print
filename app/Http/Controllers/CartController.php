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
            ->get();

        return view('customer.cart.index', [
            'cart' => $cart
        ]);
    }

    public function updateCart(Request $request, Cart $cart)
    {
        $cart->update([
            'jumlah' => $request->input('jumlah')
        ]);

        return back()->with('success', 'Keranjang diupdate');
    }
    
    public function checkout(Request $request)
    {
        $cart = Cart::where('id_user', auth()->id())
            ->get();

        return view('customer.cart', [
            'cart' => $cart
        ]);
    }
}
