@extends('layouts.customer.app')

@section('title', 'Landing Page')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <div class="bg-white">
        <div class="py-12 sm:py-16 lg:mx-auto lg:max-w-7xl lg:px-8">
            <a href="{{ route('products') }}" class="flex items-center text-primary-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                  </svg>                  
                <h4 class="ml-2 font-medium text-xl">Kembali</h4>
            </a>
            <h2 class="text-center text-5xl font-bold tracking-tight text-gray-900">{{ ucwords($category->nama_kategori) }}</h2>
            <div class="relative mt-8">
                <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                    <ul role="list"
                        class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 gap-y-8 lg:space-x-0">
                        @foreach ($products as $product)
                        <li class="inline-flex w-64 flex-col text-center lg:w-auto">
                            <div class="group relative">
                                <div class="aspect-square w-full overflow-hidden rounded-md bg-gray-200">
                                    <img src={{ url('storage/' . $product->foto_produk) }}
                                    alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                    class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <div class="mt-6">
                                    <h3 class="mt-1 font-semibold text-gray-900">
                                        <a
                                            href="{{ route('customer.products.detail', ['product' => $product->id_produk]) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $product->nama_produk }}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-gray-900 font-medium">IDR {{
                                        number_format($product->harga_produk) }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection