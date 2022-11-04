@extends('layouts.admin.app')

@section('title', 'Tambah SKU')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>
@endsection

@section('js')
@parent
@endsection

@section('content')
<main>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Tambah SKU</h1>
                        <h2 class="text-lg font-medium text-gray-500">Produk: {{
                            ucwords($product->category->nama_kategori) .' '. $product->nama_produk }}</h2>
                    </div>
                </div>
                @if ($errors->any())
                <div class="mt-8 sm:w-full sm:max-w-xl rounded-md bg-red-50 p-4">
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
                                saat membuat sku.</h3>
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
                <div class="mt-4 flex flex-col">
                    <form action={{ route('admin.products.skus', ['product'=> $product->id_produk]) }} method="POST">
                        @csrf
                        @method('POST')
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="ukuran"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Ukuran SKU</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <select id="ukuran" name="ukuran" autocomplete="ukuran"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                        @foreach($sizes as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="stok"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Stok</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="number" name="stok" id="stok" autocomplete="stok"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                </div>
                            </div>
                            <div x-data="{ warna: 'hitam', kode_warna: '#000000' }" class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="warna" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Warna</label>
                                <div class="mt-1 sm:col-span-2 flex items-center max-w-lg sm:max-w-xs">
                                    <i class="fas fa-circle fa-2x mr-4" id="color-circle"
                                        x-bind:style="{ color: `${kode_warna}`}"></i>
                                    <input type="hidden" name="kode_warna" x-bind:value="kode_warna">
                                    <select x-on:change="kode_warna = $el.options[$el.selectedIndex].dataset.warna"
                                        name="warna" id="warna"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @foreach($sku_colors as $warna => $kode_warna)
                                        <option data-warna="{{ $kode_warna }}" value="{{ $warna }}">{{ ucwords($warna)
                                            }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href={{ route('admin.products') }}
                                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batalkan</a>
                            <button type="submit"
                                class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- /End replace -->
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection