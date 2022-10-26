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
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Data-data pesanan pada tanggal {{ $order->tanggal_pembelian }}
        dengan nomor ID #{{ $order->id_pembelian }}.</p>
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
          @elseif($order->status_pembelian == 'sent')
          <dd class="mt-1 text-sm text-gray-900">Sudah Dikirim</dd>
          @elseif($order->status_pembelian == 'canceled')
          <dd class="mt-1 text-sm text-gray-900">Dibatalkan</dd>
          @endif
          @if($order->status_pembelian != 'sent' && $order->status_pembelian != 'canceled')
          <dt class="mt-3 text-sm font-medium text-gray-500">Ubah Status</dt>
          <form class="mt-2 flex" action={{ route('admin.orders.updateStatus', ['order'=> $order->id_pembelian])}}
            method="post">
            @csrf
            @method('PUT')
            <select name="status_pembelian" id="status_pembelian"
              class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              <option value="sent">Dikirim
              </option>
              <option value="canceled">Batal
              </option>
            </select>
            <button type="submit" onclick="return confirm('Ubah Status Pengiriman?')"
              class="ml-4  inline-flex items-center rounded-md border border-transparent bg-primary-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
              Ubah Status
            </button>
          </form>
          @endif
          @if($errors->any())
          <div class="mt-2 sm:w-full sm:max-w-xl rounded-md bg-red-50 p-4">
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
                <h3 class="text-sm text-red-800"><a class="font-medium"
                    href="{{ route('admin.products.skus.edit', ['product' => $errors->first('id_produk'), 'sku' => $errors->first('id_sku')]) }}">SKU
                    #{{ $errors->first('id_sku')}}</a> Produk {{ $errors->first('nama_produk')}}
                  kehabisan stok. Silahkan restok ulang sku.</h3>
              </div>
            </div>
          </div>
          @endif
          <dt class="mt-4 text-sm font-medium text-gray-500">Bukti Pembayaran</dt>
          @if($order->payment)
          <dd class="mt-1 text-sm text-primary-600"><a href={{ url('storage/' . $order->payment->bukti) }}
              target="_blank">Gambar</a></dd>
          @else
          <dd class="mt-1 text-sm text-gray-900">Belum diunggah</dd>
          @endif
        </div>
        <div class="sm:col-span-2">
          <dt class="text-sm font-medium text-gray-500">Rincian Pesanan</dt>
          <dd class="mt-1 text-sm text-gray-900">
            <section aria-labelledby="summary-heading"
              class="bg-gray-50 px-4 sm:px-6 lg:col-start-2 lg:row-start-1 lg:bg-transparent lg:px-0 lg:pb-16">
              <div class="mx-auto max-w-lg lg:max-w-none">
                <ul role="list" class="divide-y divide-gray-200 text-sm font-medium text-gray-900">
                  @foreach($order->items as $item)
                  <li class="flex items-start space-x-4 py-6">
                    <img src={{ url('storage/' . $item->sku->product->foto_produk) }} class="aspect-square w-20">
                    <div class="flex-auto space-y-1">
                      <h3>{{ $item->sku->product->nama_produk }}</h3>
                      <p class="text-gray-500">{{ strtoupper($item->sku->warna . ', ' . $item->sku->ukuran) }}</p>
                      <p class="text-gray-500">{{ ucwords($item->sku->product->category->nama_kategori) }}</p>
                      @if($item->sku->print_design)
                      <div x-data="{ open: false }">
                        <button x-on:click="open = !open" class="text-primary-600">Tampilkan Desain Sablon</button>
                        <div class="mt-4 flex flex-col gap-y-2" x-show="open">
                          <div class="flex gap-x-4">
                            <div>
                              <h3 class="text-sm font-medium text-gray-600">Letak Sablon</h3>
                              <p class="text-sm font-normal text-black">{{ ucwords(str_replace('_', ' ',
                                $item->sku->print_design->letak_sablon)) }}</p>
                            </div>
                            <div>
                              <h3 class="text-sm font-medium text-gray-600">Bahan Produk</h3>
                              <p class="text-sm font-normal text-black">{{ ucwords(
                                $item->sku->print_design->bahan_produk) }}</p>
                            </div>
                          </div>
                          <div class="flex gap-x-4">
                            @if($item->sku->print_design->desain_depan)
                            <div>
                              <h3 class="text-sm font-medium text-gray-600">Foto Depan</h3>
                              <a class="font-normal text-primary-700" target="_blank"
                                href="{{ url('storage/' . $item->sku->print_design->desain_depan) }}">Link Foto</a>
                            </div>
                            @endif
                            @if($item->sku->print_design->desain_belakang)
                            <div>
                              <h3 class="text-sm font-medium text-gray-600">Foto Belakang</h3>
                              <a class="font-normal text-primary-700" target="_blank"
                                href="{{ url('storage/' . $item->sku->print_design->desain_belakang) }}">Link Foto</a>
                            </div>
                            @endif
                          </div>
                          <div>
                            <h3 class="text-sm font-medium text-gray-600">Catatan</h3>
                            <p class="text-sm font-normal text-black">{{ $item->sku->print_design->catatan ?? '-' }}</p>
                          </div>
                        </div>
                      </div>
                      @endif
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
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                          fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd"
                            d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                            clip-rule="evenodd" />
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