@extends('layouts.admin.app')

@section('title', 'Daftar Pelanggan')

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
                        <h1 class="text-xl font-semibold text-gray-900">Pelanggan</h1>
                        <p class="mt-2 text-sm text-gray-700">Daftar pelanggan yang daftar di website toko Anda. Anda dapat mengatur pelanggan disini.</p>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $customers->links() }}
                </div>
                <div class="mt-4 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Nama</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Telepon
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Alamat
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total Pesanan
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach($customers as $customer)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ ucwords($customer->nama) }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $customer->email }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $customer->telepon }}</td>
                                            @if(strlen($customer->alamat) > 40)
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ substr($customer->alamat, 0, 40) }}...</td>
                                            @else
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $customer->alamat }}</td>
                                            @endif
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $customer->total_pesanan }} pesanan</td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Lindsay Walton</span></a>
                                            </td>
                                        </tr>
                                        @endforeach
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