@extends('layouts.admin.app')

@section('title', 'Daftar Pesanan')

@section('css')
@endsection

@section('content')
<main>
    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Pesanan #{{ $order->id_pembelian }}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Data-data pesanan pada tanggal {{ $order->tanggal_pembelian }} dengan nomor ID #{{ $order->id_pembelian }}.</p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
      <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Nama Pembeli</dt>
          <dd class="mt-1 text-sm text-gray-900">{{ $order->user->nama }}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Alamat Pengiriman</dt>
          <dd class="mt-1 text-sm text-gray-900">{{ $order->alamat_pengiriman }}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Nomor Telepon Pembeli</dt>
          <dd class="mt-1 text-sm text-gray-900">{{ $order->user->telepon}}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Total Harga Pesanan</dt>
          <dd class="mt-1 text-sm text-gray-900">Rp. {{ number_format($order->total_pembelian, 0, ',', '.') }}</dd>
        </div>
        <div class="sm:col-span-2">
          <dt class="text-sm font-medium text-gray-500">Status Pembelian</dt>
          @if($order->status_pembelian == 'pending')
          <dd class="mt-1 text-sm text-gray-900">Menunggu Pembayaran</dd>
          @elseif($order->status_pembelian == 'paid')
          <dd class="mt-1 text-sm text-gray-900">Sudah Dibayar</dd>
          <dt class="mt-3 text-sm font-medium text-gray-500">Ubah Status</dt>
          <form action={{ route('admin.orders.updateStatus', ['order' => $order->id_pembelian])}} method="post">
            @csrf
            @method('PUT')
            <button type="submit" onclick="return confirm('Ubah Status Pengiriman?')" class="mt-2 inline-flex items-center rounded-md border border-transparent bg-green-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
              <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M400 96a48 48 0 1 0-48-48 48 48 0 0 0 48 48zm-4 121a31.9 31.9 0 0 0 20 7h64a32 32 0 0 0 0-64h-52.78L356 103a31.94 31.94 0 0 0-40.81.68l-112 96a32 32 0 0 0 3.08 50.92L288 305.12V416a32 32 0 0 0 64 0V288a32 32 0 0 0-14.25-26.62l-41.36-27.57 58.25-49.92zm116 39a128 128 0 1 0 128 128 128 128 0 0 0-128-128zm0 192a64 64 0 1 1 64-64 64 64 0 0 1-64 64zM128 256a128 128 0 1 0 128 128 128 128 0 0 0-128-128zm0 192a64 64 0 1 1 64-64 64 64 0 0 1-64 64z"/></svg>
              Dikirim
            </button>
          </form>
          @elseif($order->status_pembelian == 'sent')
          <dd class="mt-1 text-sm text-gray-900">Sudah Dikirim</dd>
          @endif
          <dt class="mt-4 text-sm font-medium text-gray-500">Bukti Pembayaran</dt>
          @if($order->payment)
          <dd class="mt-1 text-sm text-primary-600"><a href={{ url('storage/' . $order->payment->bukti) }} target="_blank">Gambar</a></dd>
          @else
          <dd class="mt-1 text-sm text-gray-900">Belum diunggah</dd>
          @endif
        </div>
        <div class="sm:col-span-2">
          <dt class="text-sm font-medium text-gray-500">Rincian Pesanan</dt>
          <dd class="mt-1 text-sm text-gray-900">
            <section aria-labelledby="summary-heading" class="bg-gray-50 px-4 sm:px-6 lg:col-start-2 lg:row-start-1 lg:bg-transparent lg:px-0 lg:pb-16">
                <div class="mx-auto max-w-lg lg:max-w-none">          
                  <ul role="list" class="divide-y divide-gray-200 text-sm font-medium text-gray-900">
                    @foreach($order->items as $item)
                    <li class="flex items-start space-x-4 py-6">
                      <img src={{ url('storage/' . $item->sku->product->foto_produk) }} class="aspect-square w-20">
                      <div class="flex-auto space-y-1">
                        <h3>{{ $item->sku->product->nama_produk }}</h3>
                        <p class="text-gray-500">{{ strtoupper($item->sku->warna . ', ' . $item->sku->ukuran) }}</p>
                        <p class="text-gray-500">{{ ucwords($item->sku->product->category->nama_kategori) }}</p>
                      </div>
                      <div class="flex-none">
                          <p class="text-base font-medium">Rp. {{ number_format($item->subharga, 0, ',', '.') }}</p>
                          <p class="text-right text-gray-500">Jumlah: {{ $item->jumlah }}</p>
                      </div>
                    </li>
                    @endforeach
                  </ul>
          
                  <dl class="hidden space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-900 lg:block">
                    <div class="flex items-center justify-between">
                      <dt class="text-gray-600">Subtotal</dt>
                      <dd>Rp. {{ number_format($order->total_pembelian - $order->ongkir->tarif, 0, ',', '.')}}</dd>
                    </div>
          
                    <div class="flex items-center justify-between">
                      <dt class="text-gray-600">Ongkir</dt>
                      <dd>Rp. {{ number_format($order->ongkir->tarif, 0, ',', '.')}}</dd>
                    </div>
          
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                      <dt class="text-base">Total</dt>
                      <dd class="text-base">Rp. {{ number_format($order->total_pembelian, 0, ',', '.')}}</dd>
                    </div>
                  </dl>
          
                  <div class="fixed inset-x-0 bottom-0 flex flex-col-reverse text-sm font-medium text-gray-900 lg:hidden">
                    <div class="relative z-10 border-t border-gray-200 bg-white px-4 sm:px-6">
                      <div class="mx-auto max-w-lg">
                        <button type="button" class="flex w-full items-center py-6 font-medium" aria-expanded="false">
                          <span class="mr-auto text-base">Total</span>
                          <span class="mr-2 text-base">$361.80</span>
                          <!-- Heroicon name: mini/chevron-up -->
                          <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
          
                    <div>
                      <!--
                        Mobile summary overlay, show/hide based on mobile summary state.
          
                        Entering: "transition-opacity ease-linear duration-300"
                          From: "opacity-0"
                          To: "opacity-100"
                        Leaving: "transition-opacity ease-linear duration-300"
                          From: "opacity-100"
                          To: "opacity-0"
                      -->
                      <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
          
                      <!--
                        Mobile summary, show/hide based on mobile summary state.
          
                        Entering: "transition ease-in-out duration-300 transform"
                          From: "translate-y-full"
                          To: "translate-y-0"
                        Leaving: "transition ease-in-out duration-300 transform"
                          From: "translate-y-0"
                          To: "translate-y-full"
                      -->
                      <div class="relative bg-white px-4 py-6 sm:px-6">
                        <dl class="mx-auto max-w-lg space-y-6">
                          <div class="flex items-center justify-between">
                            <dt class="text-gray-600">Subtotal</dt>
                            <dd>$320.00</dd>
                          </div>
          
                          <div class="flex items-center justify-between">
                            <dt class="text-gray-600">Shipping</dt>
                            <dd>$15.00</dd>
                          </div>
          
                          <div class="flex items-center justify-between">
                            <dt class="text-gray-600">Taxes</dt>
                            <dd>$26.80</dd>
                          </div>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
          </dd>
        </div>
      </dl>
    </div>
  </div>  
</main>
@endsection

@section('js')
@endsection