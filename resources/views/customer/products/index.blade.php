@extends('layouts.customer.app')

@section('title', 'Landing Page')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <div class="bg-white">
        @foreach ($all_products as $category => $products)
        <div class="py-16 sm:py-20 lg:mx-auto lg:max-w-7xl lg:px-8">
            <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                <h2 class="text-3xl font-bold tracking-tight text-primary-600">{{ ucwords($category) }}</h2>
                <a href="{{ route('products.listByCategory', ['category' => Str::slug($category)]) }}"
                    class="hidden text-sm font-semibold text-primary-600 hover:text-primary-500 sm:block">
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
                                    <img src={{ url('storage/' . $product->foto_produk) }}
                                    alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                    class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <div class="mt-6">
                                    <h3 class="mt-1 font-semibold text-gray-900 text-base">
                                        <a
                                            href="{{ route('customer.products.detail', ['product' => $product->id_produk]) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $product->nama_produk }}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-primary-600 font-bold text-lg">IDR {{
                                        number_format($product->harga_produk, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection

@section('js')
@endsection