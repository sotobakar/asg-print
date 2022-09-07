@extends('layouts.customer.app')

@section('title', 'Under Construction')

@section('css')
@endsection

@section('content')
    <main class="lg:relative">
        <div class="flex min-h-full flex-col bg-white pt-16 pb-12">
            <main class="mx-auto flex w-full max-w-7xl flex-grow flex-col justify-center px-4 sm:px-6 lg:px-8">
                <div class="flex flex-shrink-0 justify-center">
                    <a href="/" class="inline-flex">
                        <span class="sr-only">ASG Print</span>
                        <img class="h-12 w-auto" src={{ url('assets/images/logo.png') }}
                            alt="">
                    </a>
                </div>
                <div class="py-16">
                    <div class="text-center">
                        <p class="text-base font-semibold text-primary-700">404</p>
                        <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Under construction.</h1>
                        <p class="mt-2 text-base text-gray-500">Maaf, halaman sedang dikembangkan. Silahkan kembali lagi di masa yang akan datang.</p>
                        <div class="mt-6">
                            <a href="/" class="text-base font-medium text-primary-700 hover:text-primary-600">
                                Balik ke halaman utama
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>


    </main>
@endsection

@section('js')
@endsection
