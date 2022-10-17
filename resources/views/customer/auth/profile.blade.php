@extends('layouts.customer.app')

@section('title', 'Profil Anda')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <div class="mx-auto max-w-lg py-8">
        <form method="POST" action="{{ route('customer.profile') }}">
            @csrf
            @method('PUT')
            <div class="space-y-6">
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
                                saat mengupdate profile.</h3>
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
                <div>
                    <h1 class="text-lg font-medium leading-6 text-gray-900">Pengaturan Profil</h1>
                    <p class="mt-1 text-sm text-gray-500">Anda dapat mengubah data profil anda di form berikut.</p>
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Anda</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                            value="{{ $user->nama }}">
                    </div>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Anda</label>
                    <div class="mt-1">
                        <input type="text" name="alamat" id="alamat"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                            value="{{ $user->alamat }}">
                    </div>
                </div>
                <div>
                    <label for="id_ongkir" class="block text-sm font-medium text-gray-700">Domisili Anda (untuk Ongkir)</label>
                    <div class="mt-1">
                        <select name="id_ongkir" id="id_ongkir"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                            @foreach($cities as $city)
                            <option value="{{ $city->id_ongkir}}" {{ $city->id_ongkir == $user->id_ongkir ? 'selected' : '' }}>{{ $city->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon Anda</label>
                    <div class="mt-1">
                        <input type="text" name="telepon" id="telepon"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                            value="{{ $user->telepon }}">
                    </div>
                </div>
                <div>
                    <label for="old_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
                    <div class="mt-1">
                        <input type="password" name="old_password" id="old_password"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                            placeholder="Password Lama Anda disini">
                    </div>
                </div>
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <div class="mt-1">
                        <input type="password" name="new_password" id="new_password"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                            placeholder="Password Baru Anda disini">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button" onClick="window.location.reload();"
                        class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">Batal</button>
                    <button type="submit"
                        class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">Simpan
                        Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@section('js')
@endsection