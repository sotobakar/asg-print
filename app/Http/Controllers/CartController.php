<?php

namespace App\Http\Controllers;

use App\Models\ProductSku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request) {
        Log::info("User: ", $request->user()->toArray());

        Log::info("Request: ", $request->all());
        $sku = ProductSku::where('id', $request->input('sku'))->first();
        Log::info("SKU: ", $sku->toArray());

        return [];
    }
}
