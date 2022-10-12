@extends('layouts.admin.app')

@section('title', 'Daftar Produk')

@section('css')
@endsection

@section('content')
<main>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                @if (session('success'))
                <div class="rounded-md bg-green-50 p-4 mb-4 ">
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
                            <h3 class="text-sm font-medium text-green-800">{{ session('success') }}</h3>
                        </div>
                    </div>
                </div>
                @endif
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Produk</h1>
                        <p class="mt-2 text-sm text-gray-700">Daftar produk yang Anda miliki. Produk-produk ini
                            ditampilkan di website.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href={{ route('admin.products.create') }}
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">Tambah
                            produk</a>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
                <div class="mt-4 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                ID</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Nama</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Kategori
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Harga
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ukuran
                                                Tersedia
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-sm font-semibold text-gray-900 text-right">Stok
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-sm font-semibold text-gray-900 text-right">
                                                Terjual
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Ubah</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($products as $product)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $product->id_produk }}</td>
                                            <td
                                                class="whitespace-nowrap py-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $product->nama_produk }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                                ucwords($product->category->nama_kategori) }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Rp. {{
                                                number_format($product->harga_produk, 0, ',', '.') }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                                "M,L,XL" }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-right">{{
                                                $product->stok }}</td>
                                            {{-- TODO: Stok Terjual --}}
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-right">0</td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href={{ route('admin.products.detail', ['product'=>
                                                    $product->id_produk]) }} class="text-indigo-600
                                                    hover:text-indigo-900">Ubah</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /End replace -->
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection