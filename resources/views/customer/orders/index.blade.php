@extends('layouts.customer.app')

@section('title', 'Pesanan Saya')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <div class="bg-white">
        <main class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:pt-24 sm:pb-32 lg:px-8">
            <div class="max-w-xl">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pesananmu</h1>
                <p class="mt-2 text-sm text-gray-500">Seluruh pesanan dan status pesananmu dapat diperiksa di halaman
                    ini.</p>
            </div>

            <div class="mt-12 space-y-16 sm:mt-16">
                @foreach($orders as $order)
                <section aria-labelledby="4376-heading">
                    <div class="space-y-1 md:flex md:items-baseline md:space-y-0 md:space-x-4">
                        <h2 id="4376-heading" class="text-lg font-medium text-gray-900 md:flex-shrink-0">Pesanan #{{
                            $order->id_pembelian }}</h2>
                        <div
                            class="space-y-5 sm:flex sm:items-baseline sm:justify-between sm:space-y-0 md:min-w-0 md:flex-1">
                            @if($order->status_pembelian == 'sent')
                            <p class="text-sm font-medium text-green-700">Sudah Dikirim</p>
                            @elseif($order->status_pembelian == 'paid')
                            <p class="text-sm font-medium text-primary-600">Sudah Dibayar</p>
                            @elseif($order->status_pembelian == 'pending')
                            <p class="text-sm font-medium text-yellow-400">Menunggu Pembayaran</p>
                            @elseif($order->status_pembelian == 'canceled')
                            <p class="text-sm font-medium text-red-600">Dibatalkan</p>
                            @endif

                            <div class="flex text-sm font-medium">
                                <a href={{ route('customer.orders.detail', ['order'=> $order->id_pembelian]) }}
                                    class="text-indigo-600 hover:text-indigo-500">Detail pesanan</a>
                                @if($order->status_pembelian == 'sent')
                                <div class="ml-4 border-l border-gray-200 pl-4 sm:ml-6 sm:pl-6">
                                    <a href={{ route('customer.orders.invoice.cetak', ['order' => $order->id_pembelian]) }} class="text-indigo-600 hover:text-indigo-500">Cetak invoice</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @foreach($order->items as $item)
                    <div class="mt-6 -mb-6 flow-root divide-y divide-gray-200 border-t border-gray-200">
                        <div class="py-6 sm:flex">
                            <div class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                                <img src={{ url( 'storage/' . $item->sku->product->foto_produk) }}
                                alt="Brass puzzle in the shape of a jack with overlapping rounded posts."
                                class="h-20 w-20 flex-none rounded-md object-cover object-center">
                                <div class="min-w-0 flex-1 pt-1.5 sm:pt-0">
                                    <h3 class="text-sm font-medium text-gray-900">
                                        <a href="#">{{ $item->sku->product->nama_produk }}</a>
                                    </h3>
                                    <p class="truncate text-sm text-gray-500">
                                        <span>{{ $item->sku->ukuran }}</span>
                                        <span class="mx-1 text-gray-400" aria-hidden="true">&middot;</span>
                                        <span>{{ ucwords($item->sku->warna) }}</span>
                                    </p>
                                    <p class="mt-1 font-medium text-gray-900">Rp. {{ number_format($item->subharga) }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg">Jumlah:</h3>
                                <h3 class="text-right font-bold text-2xl">{{ $item->jumlah }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </section>
                @endforeach
            </div>
        </main>
    </div>
</main>
@endsection

@section('js')
@endsection