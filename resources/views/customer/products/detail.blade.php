@extends('layouts.customer.app')

@section('title', $product->nama_produk)

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <div class="bg-white">
        <div class="pt-6 pb-16 sm:pb-24">
            <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('products') }}" class="mr-4 text-sm font-medium text-gray-900">Produk</a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="h-5 w-auto text-gray-300">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('products.listByCategory', ['category' => $product->category->slug]) }}" class="mr-4 text-sm font-medium text-gray-900">{{ ucwords($product->category->nama_kategori) }}</a>
                            <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="h-5 w-auto text-gray-300">
                                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{
                            $product->nama_produk }}</a>
                    </li>
                </ol>
            </nav>
            <div class="mx-auto mt-8 max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                @if (session('success'))
                <div class="rounded-md bg-green-50 p-4 mb-4" x-show="open" x-data="{ open: true }">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: mini/check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Berhasil menambahkan ke keranjang.</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>{{ 'Produk ' . $product->nama_produk . ' sudah ada di keranjangmu. Silahkan checkout
                                    atau belanja lagi.' }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <div class="-mx-2 -my-1.5 flex">
                                    <a href={{ route('customer.cart') }}
                                        class="rounded-md bg-green-50 px-2 py-1.5 text-sm font-medium text-green-800 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">Checkout</a>
                                    <button x-on:click="open = !open" type="button"
                                        class="ml-3 rounded-md bg-green-50 px-2 py-1.5 text-sm font-medium text-green-800 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
                    <div class="lg:col-span-5 lg:col-start-8">
                        <div class="flex justify-between">
                            <h1 class="text-xl font-medium text-gray-900">{{ $product->nama_produk }}</h1>
                            <p class="text-xl font-medium text-gray-900">Rp. {{ $product->harga_produk }}</p>
                        </div>
                    </div>

                    <!-- Image gallery -->
                    <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
                        <h2 class="sr-only">Images</h2>
                        <img src={{ url('storage/' . $product->foto_produk) }}
                        alt="The Beatles Shirt." class="w-full rounded-lg">
                    </div>

                    <div class="mt-8 lg:col-span-5">
                        <form>
                            @if ($product_colors->count() > 0)
                            <!-- Color picker -->
                            <div>
                                <h2 class="text-sm font-medium text-gray-900">Pilih warna</h2>

                                <fieldset class="mt-2">
                                    <legend class="sr-only">Choose a color</legend>
                                    <form action="?" method="GET">
                                        <div class="flex items-center space-x-3">
                                            @foreach ($product_colors as $color)
                                            <label
                                                class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-900">
                                                <input type="radio" name="color" value={{ $color->warna }}
                                                class="sr-only" aria-labelledby="color-choice-0-label"
                                                onchange="this.form.submit()">
                                                <span id="color-choice-0-label" class="sr-only">
                                                    {{ $color->warna }}
                                                </span>
                                                <span aria-hidden="true"
                                                    class="h-8 w-8 border border-black border-opacity-10 rounded-full {{ request()->color == $color->warna ? 'ring ring-offset-1 ring-gray-900' : '' }}"
                                                    style="background-color: {{ $color->kode_warna }}"></span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </form>
                                </fieldset>
                            </div>

                            <!-- Size picker -->
                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-sm font-medium text-gray-900">Pilih ukuran yang tersedia</h2>
                                </div>

                                <fieldset class="mt-2">
                                    <legend class="sr-only">Pilih Ukuran</legend>
                                    <form id="addToCart" action={{ route('customer.cart.add') }} method="POST">
                                        @csrf
                                        <div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
                                            @foreach ($skus as $sku)
                                            <label
                                                class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium uppercase sm:flex-1 cursor-pointer focus:outline-none">
                                                <input type="radio" name="sku[]" value={{ $sku->id }}
                                                class="sr-only" aria-labelledby="size-choice-0-label"
                                                required>
                                                <span id="size-choice-0-label">{{ $sku->ukuran }}</span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </form>
                                </fieldset>
                            </div>

                            <button type="submit" form="addToCart"
                                class="mt-8 flex w-full items-center justify-center rounded-md border border-transparent bg-primary-700 py-3 px-8 text-base font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">Add
                                to cart</button>
                            @else
                            <h2 class="text-center text-xl font-bold">Barang belum tersedia.</h2>
                            @endif
                        </form>

                        <!-- Product details -->
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">Deskripsi Produk</h2>

                            <div class="prose prose-sm mt-4 text-gray-500">
                                <p>{{ $product->deskripsi_produk }}</p>
                            </div>
                        </div>
                        <div class="mt-8 border-t border-gray-200 pt-8">
                            <h2 class="text-sm font-medium text-gray-900">Kualitas & Perawatan</h2>

                            <div class="prose prose-sm mt-4 text-gray-500">
                                <ul role="list">
                                    <li>Hanya dari materi yang terbaik</li>

                                    <li>Produk lokal 100%</li>

                                    <li>Pre-washed dan pre-shrunk</li>

                                    <li>Setelan mesin cuci cold dan jangan dicampur.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Policies -->
                        <section aria-labelledby="policies-heading" class="mt-10">
                            <h2 id="policies-heading" class="sr-only">Our Policies</h2>

                            <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                                <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                                    <dt>
                                        <!-- Heroicon name: outline/globe-americas -->
                                        <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                        </svg>
                                        <span class="mt-4 text-sm font-medium text-gray-900">Nusantara
                                            delivery</span>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-500">Pengantaran ke seluruh daerah Indonesia.
                                    </dd>
                                </div>

                                <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                                    <dt>
                                        <!-- Heroicon name: outline/currency-dollar -->
                                        <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="mt-4 text-sm font-medium text-gray-900">Reward
                                            pelanggan</span>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-500">Pelanggan mendapat diskon di pembelian
                                        berikutnya.</dd>
                                </div>
                            </dl>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src={{ url('assets/js/product/detail.js') }}></script>
@endsection