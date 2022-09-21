@extends('layouts.customer.app')

@section('title', 'Pesanan Saya')

@section('css')
@endsection

@section('content')
<main class="lg:relative">
    <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Detail Pembelian</h1>

            <div class="mt-2 border-b border-gray-200 pb-5 text-sm sm:flex sm:justify-between">
                <dl class="flex">
                    <dt class="text-gray-500">Nomor pembelian&nbsp;</dt>
                    <dd class="font-medium text-gray-900">{{ $order->id_pembelian }}</dd>
                    <dt>
                        <span class="sr-only">Date</span>
                        <span class="mx-2 text-gray-400" aria-hidden="true">&middot;</span>
                    </dt>
                    <dd class="font-medium text-gray-900">{{ $order->tanggal_pembelian }}</dd>
                </dl>
            </div>
            <div>
                <div class="mt-16">
                    <div class="overflow-hidden rounded-full bg-gray-200">
                        @if($order->status_pembelian == 'pending')
                        <div class="h-2 rounded-full bg-amber-300" style="width: calc((1) / 8 * 100%)"></div>
                        @elseif($order->status_pembelian == 'paid')
                        <div class="h-2 rounded-full bg-primary-700" style="width: calc((4) / 8 * 100%)"></div>
                        @elseif($order->status_pembelian == 'sent')
                        <div class="h-2 rounded-full bg-green-600" style="width: calc((8) / 8 * 100%)"></div>
                        @endif
                    </div>
                    <div class="mt-6 hidden grid-cols-3 font-medium text-gray-600 sm:grid">
                        <div class="text-amber-300">Menunggu Pembayaran</div>
                        <div class="text-center text-primary-700">Sudah Dibayar</div>
                        <div class="text-right text-green-600">Pesanan Dikirim</div>
                    </div>
                </div>
            </div>

            <div class="mt-16">
                <h2 class="sr-only">Produk yang dibeli</h2>

                <div class="grid grid-cols-2 sm:gap-x-8">
                    @foreach($order->items as $item)
                    <div class="flex flex-row text-sm sm:gap-x-6 md:gap-x-8 lg:gap-x-8">

                        <div class="w-1/5">
                            <div class="aspect-square overflow-hidden rounded-lg bg-gray-50">
                                <img src={{ url('assets/images/foto_produk/' . $item->sku->product->foto_produk) }}
                                alt="Off-white t-shirt with circular dot illustration on the front of mountain ridges
                                that fade."
                                class="w-full object-cover object-center">
                            </div>
                        </div>
                        <div class="w-4/5 flex">
                            <div>
                                <h3 class="text-2xl font-medium text-gray-900">
                                    <a href="#">{{ $item->nama }}</a>
                                </h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">Rp. {{ number_format($item->subharga)
                                    }}
                                </p>
                                <div class="flex">
                                    <div>
                                        <p class="mt-1 text-gray-500">{{
                                            ucwords($item->sku->product->category->nama_kategori) }}
                                        </p>
                                        <p class="text-gray-500">Jumlah: {{ $item->jumlah }}
                                        </p>
                                    </div>
                                    <div class="ml-6 self-center">
                                        <div class="flex items-center">
                                            <div aria-hidden="true"
                                                class="h-6 w-6 border border-black border-opacity-10 rounded-full"
                                                style="background-color: {{ $item->sku->kode_warna }}"></div>
                                            <h3 class="ml-2 font-medium text-gray-500 text-xl">{{ $item->sku->ukuran}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- More products... -->
                </div>
            </div>

            <!-- Billing -->
            <div class="mt-24">
                <h2 class="sr-only">Rincian Pesanan</h2>

                <div class="rounded-lg bg-gray-50 py-6 px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-0 lg:py-8">
                    <dl class="grid grid-cols-1 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-5 lg:pl-8">
                        <div>
                            <dt class="font-medium text-gray-900">Alamat Tujuan</dt>
                            <dd class="mt-3 text-gray-500">
                                <span class="block">{{ $order->alamat_pengiriman }}</span>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Informasi Pembayaran</dt>
                            <dd class="mt-3 flex">
                                @if($order->status_pembelian == 'pending')
                                <div>
                                    <h4 class="text-gray-500">Belum Bayar</h4>
                                    <a id="uploadForm" class="mt-2 block font-medium text-primary-700" href="">Upload
                                        Bukti Pembayaran</a>
                                </div>
                                @else
                                <div>
                                    <h3 class="font-bold text-lg">{{ $order->payment->bank }}</h3>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-900">{{ $order->payment->nama }}</p>
                                    <p class="text-gray-600">Rp. {{ number_format($order->payment->jumlah) }}</p>
                                    <a target="_blank" href={{ url('storage/' . $order->payment->bukti) }}
                                        class="font-medium text-primary-700">Bukti Pembayaran</a>
                                </div>
                                @endif
                            </dd>
                        </div>
                    </dl>

                    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:col-span-7 lg:mt-0 lg:pr-8">
                        <div class="flex items-center justify-between pb-4">
                            <dt class="text-gray-600">Subtotal</dt>
                            <dd class="font-medium text-gray-900">Rp. {{ number_format($order->total_pembelian -
                                $order->ongkir->tarif)}}</dd>
                        </div>
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-gray-600">Ongkir {{ '(Kota ' .$order->ongkir->nama_kota.')' }}</dt>
                            <dd class="font-medium text-gray-900">Rp. {{ number_format($order->ongkir->tarif) }}</dd>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <dt class="font-medium text-gray-900">Total yang harus dibayar</dt>
                            <dd class="font-medium text-indigo-600">Rp. {{ number_format($order->total_pembelian)}}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- This example requires Tailwind CSS v2.0+ -->
<div id="modal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                <div>
                    <a id="closeModal" href="/"
                        class="absolute right-4 top-2 font-medium text-sm text-red-500 p-1">Tutup</a>
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-primary-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Upload Bukti Pembayaran
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Silahkan input informasi pembayaran Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3 sm:mt-3">
                    <form enctype="multipart/form-data" id="uploadPembayaran" class="mb-4 flex flex-col gap-y-2"
                        action={{ route('customer.orders.upload', ['order'=> $order->id_pembelian]) }}
                        method="POST">
                        @csrf
                        <div>
                            <label for="bank" class="text-sm font-medium text-gray-700">Jenis Bank</label>
                            <select id="bank" name="bank"
                                class="mt-1 relative block w-full rounded-md border-gray-300 bg-transparent focus:z-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="BCA">BCA - 704723485610</option>
                                <option value="BNI">BNI - 923412558211</option>
                                <option value="OVO">OVO - 08979824231</option>
                            </select>
                        </div>
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pengirim</label>
                            <div class="mt-1">
                                <input type="text" name="nama" id="nama"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="ARYOBENNO PUTRA CHANIAGO">
                            </div>
                        </div>
                        <div>
                            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah yang
                                ditransfer</label>
                            <div class="mt-1">
                                <input type="number" name="jumlah" id="jumlah"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="550000">
                            </div>
                        </div>
                        <div>
                            <label for="tanggal_pembayaran" class="block text-sm font-medium text-gray-700">Tanggal
                                Transfer</label>
                            <div class="mt-1">
                                <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="bukti" class="block text-sm font-medium text-gray-700">Bukti Pembayaran
                                (.jpg/.png)</label>
                            <div class="mt-1">
                                <input type="file" name="bukti" id="bukti"
                                    class="block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </form>
                    <button form="uploadPembayaran" type="submit"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src={{ url('assets/js/order/detail.js')}}></script>
@endsection