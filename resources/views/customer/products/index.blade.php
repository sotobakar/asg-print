@extends('layouts.customer.app')

@section('title', 'Landing Page')

@section('css')
@endsection

@section('content')
    <main class="lg:relative">
        <div class="bg-white">
            <div class="py-16 sm:py-24 lg:mx-auto lg:max-w-7xl lg:px-8">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">New Arrival</h2>
                    <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="relative mt-8">
                    <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                        <ul role="list"
                            class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">
                            @foreach ($products as $product)
                                <li class="inline-flex w-64 flex-col text-center lg:w-auto">
                                    <div class="group relative">
                                        <div class="aspect-square w-full overflow-hidden rounded-md bg-gray-200">
                                            <img src={{ url('assets/images/foto_produk/' . $product->foto_produk) }}
                                                alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-500">M | L | XL | XXL</p>
                                            <h3 class="mt-1 font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $product->nama_produk }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-gray-900 font-medium">IDR {{ $product->harga_produk }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <a href="#"
                                            class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Tambah
                                            ke Keranjang</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-12 flex px-4 sm:hidden">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
            <div class="pb-16 sm:pb-24 lg:mx-auto lg:max-w-7xl lg:px-8">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">T-Shirt</h2>
                    <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="relative mt-8">
                    <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                        <ul role="list"
                            class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">
                            @foreach ($products as $product)
                                <li class="inline-flex w-64 flex-col text-center lg:w-auto">
                                    <div class="group relative">
                                        <div class="aspect-square w-full overflow-hidden rounded-md bg-gray-200">
                                            <img src={{ url('assets/images/foto_produk/' . $product->foto_produk) }}
                                                alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-500">M | L | XL | XXL</p>
                                            <h3 class="mt-1 font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $product->nama_produk }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-gray-900 font-medium">IDR {{ $product->harga_produk }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <a href="#"
                                            class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Tambah
                                            ke Keranjang</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-12 flex px-4 sm:hidden">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
            <div class="pb-16 sm:pb-24 lg:mx-auto lg:max-w-7xl lg:px-8">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Tas / Ransel</h2>
                    <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="relative mt-8">
                    <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                        <ul role="list"
                            class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">
                            @foreach ($products as $product)
                                <li class="inline-flex w-64 flex-col text-center lg:w-auto">
                                    <div class="group relative">
                                        <div class="aspect-square w-full overflow-hidden rounded-md bg-gray-200">
                                            <img src={{ url('assets/images/foto_produk/' . $product->foto_produk) }}
                                                alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-500">M | L | XL | XXL</p>
                                            <h3 class="mt-1 font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $product->nama_produk }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-gray-900 font-medium">IDR {{ $product->harga_produk }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <a href="#"
                                            class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Tambah
                                            ke Keranjang</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-12 flex px-4 sm:hidden">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
            <div class="pb-16 sm:pb-24 lg:mx-auto lg:max-w-7xl lg:px-8">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Jaket</h2>
                    <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="relative mt-8">
                    <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                        <ul role="list"
                            class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">
                            @foreach ($products as $product)
                                <li class="inline-flex w-64 flex-col text-center lg:w-auto">
                                    <div class="group relative">
                                        <div class="aspect-square w-full overflow-hidden rounded-md bg-gray-200">
                                            <img src={{ url('assets/images/foto_produk/' . $product->foto_produk) }}
                                                alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-500">M | L | XL | XXL</p>
                                            <h3 class="mt-1 font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $product->nama_produk }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-gray-900 font-medium">IDR {{ $product->harga_produk }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <a href="#"
                                            class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Tambah
                                            ke Keranjang</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-12 flex px-4 sm:hidden">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        Lihat seluruhnya
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
@endsection
