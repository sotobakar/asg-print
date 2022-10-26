@extends('layouts.customer.app')

@section('title', 'Desain Sendiri')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <div class="flex min-h-full flex-col bg-white pt-16 pb-12">
        <div class="mx-auto w-[800px]">
            <h1 class="mt-2 text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Desain Sablonmu
                Sendiri</h1>
            <h3 class="mt-2 text-center text-sm text-gray-500">Isi form dibawah untuk melakukan pemesanan produk
                sablonmu sendiri.</h3>
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
                            saat memesan custom sablon.</h3>
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
            <form class="mt-8 flex flex-col gap-y-4" action="{{ route('customer.design') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="flex gap-x-4">
                    <div class="w-1/2">
                        <label for="kategori_produk" class="block text-sm font-medium text-gray-700">Kategori
                            Produk</label>
                        <div class="mt-1">
                            <select name="kategori_produk" id="kategori_produk"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($categories as $category)
                                <option value={{ $category->id_kategori }}>{{ ucwords($category->nama_kategori)}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="letak_sablon" class="block text-sm font-medium text-gray-700">Letak Sablon</label>
                        <div class="mt-1">
                            <select name="letak_sablon" id="letak_sablon"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="depan">Depan</option>
                                <option value="belakang">Belakang</option>
                                <option value="depan_belakang">Depan + Belakang</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-4">
                    <div class="w-1/2">
                        <label for="warna" class="block text-sm font-medium text-gray-700">Warna</label>
                        <div class="mt-1">
                            <input type="text" name="warna" id="warna"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Hitam">
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="kode_warna" class="block text-sm font-medium text-gray-700">Kode Warna</label>
                        <div class="mt-1">
                            <input type="text" name="kode_warna" id="kode_warna"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="#000000">
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-4">
                    <div class="w-full">
                        <label for="bahan_produk" class="block text-sm font-medium text-gray-700">Bahan Produk</label>
                        <div class="mt-1">
                            <select name="bahan_produk" id="bahan_produk"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="Cotton Combed">Cotton Combed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-4">
                    <div class="w-1/2">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <div class="mt-1">
                            <input type="number" name="jumlah" id="jumlah"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder=20>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="ukuran" class="block text-sm font-medium text-gray-700">Ukuran</label>
                        <div class="mt-1">
                            <select name="ukuran" id="ukuran"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($sizes as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">contoh: XL</p>
                    </div>
                </div>
                <div class="flex gap-x-4">
                    <div class="w-1/2">
                        <label for="desain_depan" class="block text-sm font-medium text-gray-700">Desain bagian
                            depan</label>
                        <div class="mt-1">
                            <input type="file" name="desain_depan" id="desain_depan"
                                class="block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Tipe file .jpg, .jpeg, .png tidak lebih dari 2 MB.</p>
                    </div>
                    <div class="w-1/2">
                        <label for="desain_belakang" class="block text-sm font-medium text-gray-700">Desain bagian
                            belakang</label>
                        <div class="mt-1">
                            <input type="file" name="desain_belakang" id="desain_belakang"
                                class="block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Tidak perlu diisi jika tidak memilih.</p>
                    </div>
                </div>
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan untuk pesanan</label>
                    <div class="mt-1">
                        <input type="text" name="catatan" id="catatan"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="Mohon konfirmasi dulu pak ke WA saya.">
                    </div>
                </div>
                <button type="submit"
                    class="self-end inline-block items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
            </form>
        </div>
    </div>


</main>
@endsection

@section('js')
@endsection