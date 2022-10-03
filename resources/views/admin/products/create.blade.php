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
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Tambah Produk</h1>
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
                                saat membuat produk.</h3>
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
                    <form action={{ route('admin.products') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="nama_produk"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nama Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="flex max-w-lg rounded-md shadow-sm">
                                        <input type="text" name="nama_produk" id="nama_produk"
                                            autocomplete="nama_produk"
                                            class="block rounded-md w-full min-w-0 flex-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                                        <option value="{{ $category->id_kategori }}">{{ ucwords($category->nama_kategori) }}</option>
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
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="deskripsi"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Deskripsi
                                    Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <textarea id="deskripsi" name="deskripsi" rows="3"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                    <p class="mt-2 text-sm text-gray-500">Tulis beberapa kalimat mengenai produk disini.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="photo" class="block text-sm font-medium text-gray-700">Foto Produk</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="flex flex-col">
                                        <div id="preview" class="self-start aspect-square max-h-48 overflow-hidden rounded-md">

                                        </div>
                                        <input name="foto_produk" id="files" type="file" accept="image/*" multiple
                                            class="mt-4 self-start text-md font-medium leading-4 text-gray-700" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex justify-end">
                            <a href={{ route('admin.products') }} class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batalkan</a>
                            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Simpan</button>
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
<script src={{ url('assets/js/admin/product/create.js')}}></script>
@endsection