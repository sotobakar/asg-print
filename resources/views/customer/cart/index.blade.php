@extends('layouts.customer.app')

@section('title', 'Keranjangku')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <!--
      This example requires Tailwind CSS v2.0+
      
      This example requires some changes to your config:
      
      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/forms'),
        ],
      }
      ```
    -->
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Keranjang Belanja</h1>
            @if($cart->count() > 0)
            <div class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">
                    <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                    <ul role="list" class="divide-y divide-gray-200 border-t border-b border-gray-200">
                        @foreach($cart as $cartItem)
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src={{ url('storage/' . $cartItem->sku->product->foto_produk) }}
                                alt="Front of men&#039;s Basic Tee in sienna."
                                class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{
                                                    $cartItem->sku->product->nama_produk }}</a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="capitalize text-gray-500">{{ $cartItem->sku->warna }}</p>

                                            <p class="ml-4 border-l border-gray-200 pl-4 text-gray-500">{{
                                                $cartItem->sku->ukuran }}</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-900">Rp. {{
                                            number_format($cartItem->sku->product->harga_produk * $cartItem->jumlah) }}
                                        </p>
                                        @if($cartItem->sku->print_design)
                                        <div class="mt-2 flex flex-col text-sm gap-y-2">
                                            <div class="flex gap-x-4">
                                                <div>
                                                    <h4 class="font-medium text-gray-500 hover:text-gray-600">Letak
                                                        Sablon
                                                    </h4>
                                                    <p>{{ ucwords(str_replace("_", " ",
                                                        $cartItem->sku->print_design->letak_sablon)) }}</p>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-500 hover:text-gray-600">Bahan
                                                        Produk
                                                    </h4>
                                                    <p>{{ ucwords( $cartItem->sku->print_design->bahan_produk) }}</p>
                                                </div>
                                            </div>
                                            <div class="flex gap-x-4">
                                                @if($cartItem->sku->print_design->desain_depan)
                                                <div>
                                                    <h4 class="font-medium text-gray-500 hover:text-gray-600">Sablon Depan
                                                    </h4>
                                                    <a class="text-primary-600" href="{{ url('storage/' . $cartItem->sku->print_design->desain_depan)}}" target="_blank">Foto</a>
                                                </div>
                                                @endif
                                                @if($cartItem->sku->print_design->desain_belakang)
                                                <div>
                                                    <h4 class="font-medium text-gray-500 hover:text-gray-600">Sablon Belakang
                                                    </h4>
                                                    <a class="text-primary-600" href="{{ url('storage/' . $cartItem->sku->print_design->desain_belakang)}}" target="_blank">Foto</a>
                                                </div>
                                                @endif
                                            </div>
                                            <div>
                                                <h4 class="font-medium text-gray-500 hover:text-gray-600">Catatan</h4>
                                                <p>{{ $cartItem->sku->print_design->catatan ?? "-" }}</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9">
                                        <form action={{ route("customer.cart.update", ['cart'=> $cartItem->id]) }}
                                            method="post" id={{ $cartItem->id }}>
                                            @csrf
                                            @method('PUT')

                                            <label for="quantity" class="sr-only">Quantity, Basic Tee</label>
                                            <select onchange="this.form.submit()" form={{ $cartItem->id }}
                                                name="quantity"
                                                class="max-w-full rounded-md border border-gray-300 py-1.5 text-left
                                                text-base font-medium leading-5 text-gray-700 shadow-sm
                                                focus:border-indigo-500 focus:outline-none focus:ring-1
                                                focus:ring-indigo-500 sm:text-sm">
                                                @for ($i = 1; $i <= min(100, $cartItem->sku->stok); $i++)
                                                    <option value={{ $i }} {{ $cartItem->jumlah == $i ? 'selected' :
                                                        ''}}> {{ $i }}</option>
                                                    @endfor
                                            </select>
                                        </form>

                                        <div class="absolute top-0 right-0">
                                            <form action={{ route('customer.cart.remove', [ 'cart'=> $cartItem->id
                                                ]) }} method="POST" id={{ "delete_".$cartItem->id }}>
                                                @csrf
                                                @method('DELETE')
                                                <button form={{ "delete_" .$cartItem->id }} type="submit"
                                                    class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <!-- Heroicon name: mini/x-mark -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-4 flex space-x-2 text-sm text-gray-700">
                                    <!-- Heroicon name: mini/check -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Tersedia</span>
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </section>

                <form action={{ route('customer.cart.checkout')}} method="POST" aria-labelledby="summary-heading"
                    class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
                    @csrf
                    @method('POST')
                    <h2 id="summary-heading" class="mt-4 text-lg font-medium text-gray-900">Yang dibayar</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">Subtotal</dt>
                            <dd class="text-sm font-medium text-gray-900">Rp. {{ number_format($subtotal) }}</dd>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                            <dt class="flex items-center text-sm text-gray-600">
                                <span>Ongkir (flat fee)</span>
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">Rp {{ number_format($ongkir) }}</dd>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                            <dt class="text-base font-medium text-gray-900">Total yang harus dibayar.</dt>
                            <dd class="text-base font-medium text-gray-900">Rp. {{ number_format($total) }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full rounded-md border border-transparent bg-primary-700 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
                    </div>
                </form>
            </div>
            @else
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="mt-12 text-center">
                <svg class="mx-auto h-48 w-48 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <h3 class="mt-2 text-2xl font-medium text-gray-900">Belum ada barang di keranjang.</h3>
                <p class="mt-1 text-lg text-gray-500">Silahkan belanja terlebih dahulu.</p>
                <div class="mt-6">
                    <a href="/produk"
                        class="inline-flex items-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>

                        Halaman Produk
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</main>
@endsection

@section('js')
<script src={{ url('assets/js/cart/index.js')}}></script>
@endsection