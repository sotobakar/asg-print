@extends('layouts.admin.app')

@section('title', 'Daftar Pesanan')

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
                        <h1 class="text-xl font-semibold text-gray-900">Pesanan</h1>
                        <p class="mt-2 text-sm text-gray-700">Daftar pesanan di toko ASG PRINT. Status dan informasi dapat dicek di tabel dibawah.</p>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $orders->links() }}
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
                                                ID Pesanan</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status Pembelian
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Jumlah dibayar
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tanggal Pembelian
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Ubah</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($orders as $order)                             
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $order->id_pembelian }}</td>
                                            @if($order->status_pembelian == 'pending')
                                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-amber-300">Menunggu Pembayaran</td>
                                            @elseif($order->status_pembelian == 'paid')
                                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-primary-700">Sudah Dibayar</td>
                                            @elseif($order->status_pembelian == 'sent')
                                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-green-600">Pesanan Dikirim</td>
                                            @elseif($order->status_pembelian == 'canceled')
                                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-red-600">Dibatalkan</td>
                                            @endif
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Rp. {{ number_format($order->total_pembelian, 0, ',', '.') }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $order->tanggal_pembelian }}</td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href={{ route('admin.orders.detail', ['order' => $order->id_pembelian])}} class="text-indigo-600 hover:text-indigo-900">Edit<span
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
            </div>


            <!-- /End replace -->
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection