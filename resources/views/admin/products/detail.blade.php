@extends('layouts.admin.app')

@section('title', 'Ubah Produk')

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
                @if ($errors->any())
                <div class="mb-8 sm:w-full rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: mini/x-circle -->
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan pada
                                saat mengubah produk.</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul role="list" class="list-disc space-y-1 pl-5">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ __($error)}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <a class="font-medium text-sm text-primary-600" href="{{ back() }}">Kembali Ke Halaman Produk</a>
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Ubah Produk</h1>
                    </div>
                </div>
                <div class="mt-4 flex flex-col">
                    <form action={{ route('admin.products.update', ['product' => $product->id_produk]) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="nama_produk"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nama Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="flex max-w-lg rounded-md shadow-sm">
                                        <input type="text" name="nama_produk" id="nama_produk"
                                            autocomplete="nama_produk"
                                            class="block rounded-md w-full min-w-0 flex-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            value="{{ $product->nama_produk }}">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="kategori_produk"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Kategori
                                    Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <select id="kategori_produk" name="kategori_produk" autocomplete="kategori_produk"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id_kategori }}" {{ $category->id_kategori ==
                                            $product->id_kategori ? 'selected': '' }}>{{
                                            ucwords($category->nama_kategori) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="harga_produk"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Harga Produk (cth.
                                    150000)</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="number" name="harga_produk" id="harga_produk"
                                        autocomplete="harga_produk"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm"
                                        value="{{ $product->harga_produk }}">
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="deskripsi"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Deskripsi
                                    Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <textarea id="deskripsi" name="deskripsi" rows="3"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $product->deskripsi_produk }}</textarea>
                                    <p class="mt-2 text-sm text-gray-500">Tulis beberapa kalimat mengenai produk disini.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="photo" class="block text-sm font-medium text-gray-700">Foto Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="flex flex-col">
                                        <div id="preview"
                                            class="self-start aspect-square max-h-48 overflow-hidden rounded-md">
                                            <img src={{ url('storage/' . $product->foto_produk) }} class="w-full h-full"
                                            alt="Foto">
                                        </div>
                                        <input name="foto_produk" id="files" type="file" accept="image/*" multiple
                                            class="mt-4 self-start text-md font-medium leading-4 text-gray-700" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex justify-end">
                            <a href={{ route('admin.products') }} class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium
                                text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2
                                focus:ring-indigo-500 focus:ring-offset-2">Batalkan</a>
                            <button type="submit"
                                class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-secondary py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="mt-8 sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">SKU Produk</h1>
                        <p class="mt-2 text-sm text-gray-700">Stock keeping unit produk. Setiap SKU memiliki variasi
                            dari warna, ukuran, dan stok.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href={{ route('admin.products.skus.create', ['product'=> $product->id_produk]) }}
                            class="inline-flex items-center justify-center rounded-md border border-transparent
                            bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700
                            focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">Tambah
                            SKU</a>
                    </div>
                </div>
                @if($product->skus->count() == 0)
                <div class="py-8">
                    <h3 class="text-center font-semibold text-xl">Belum Ada SKU</h3>
                </div>
                @else
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                ID SKU</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Warna</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Ukuran</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900">
                                                Stok Tersedia</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900">
                                                Terjual</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach($product->skus as $sku)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm sm:pl-6">
                                                <div class="text-lg font-medium text-gray-900">{{ $sku->id }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 border-2 border-black flex-shrink-0 rounded-full"
                                                        style="background-color: {{ $sku->kode_warna }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">{{ ucfirst($sku->warna)
                                                            }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <div class="font-medium text-gray-900 text-lg">{{ $sku->ukuran }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-right text-gray-500">
                                                {{ $sku->stok }}
                                            </td>
                                            {{-- TODO: Stok terjual --}}
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-right text-gray-500">0
                                            </td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href={{ route('admin.products.skus.edit', [
                                                    'product' => $product->id_produk,
                                                    'sku' => $sku->id
                                                ])}} class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Lindsay Walton</span></a>
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
                @endif
            </div>


            <!-- /End replace -->
        </div>
    </div>
</main>
@endsection

@section('js')
<script src={{ url('assets/js/admin/product/create.js')}}></script>
@endsection