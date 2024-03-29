@extends('layouts.customer.app')

@section('title', 'Register')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <!--
                      This example requires updating your template:

                      ```
                      <html class="h-full bg-gray-50">
                      <body class="h-full">
                      ```
                    -->
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-12 w-auto" src={{ url('assets/images/logo.png') }} alt="Your Company">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Daftar sebagai pelanggan baru
            </h2>
        </div>

        @if ($errors->any())
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl rounded-md bg-red-50 p-4">
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
                    <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan pada saat
                        Anda mendaftar.</h3>
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
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action={{ route('customer.register') }} method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex flex-row gap-x-4">
                        <div class="w-1/2">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama lengkap</label>
                            <div class="mt-1">
                                <input id="nama" name="nama" type="text" autocomplete="name" required
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor telpon
                                (08xxx)</label>
                            <div class="mt-1">
                                <input id="phone" name="phone" type="text" autocomplete="phone" required
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Anda</label>
                        <div class="mt-1">
                            <input id="alamat" name="alamat" type="text" autocomplete="alamat" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="id_ongkir" class="block text-sm font-medium text-gray-700">Domisili Anda (untuk
                            Ongkir)</label>
                        <div class="mt-1">
                            <select id="id_ongkir" name="id_ongkir" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                                @foreach($cities as $city)
                                <option value="{{ $city->id_ongkir }}">{{ $city->nama_kota }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-primary-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Daftarkan
                            saya sebagai pelanggan.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
@endsection

@section('js')
@endsection