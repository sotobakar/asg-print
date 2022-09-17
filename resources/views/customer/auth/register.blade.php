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
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <img class="mx-auto h-12 w-auto" src={{ url('assets/images/logo.png') }} alt="Your Company">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Daftar sebagai pelanggan baru
                </h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
                <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                    <form class="space-y-6" action="#" method="POST">
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
                                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor telpon (08xxx)</label>
                                <div class="mt-1">
                                    <input id="phone" name="phone" type="text" autocomplete="phone" required
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                                </div>
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
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat lengkap</label>
                            <div class="mt-1">
                                <input id="alamat" name="alamat" type="text" autocomplete="address" required
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md border border-transparent bg-primary-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Daftarkan saya sebagai pelanggan.</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('js')
@endsection
