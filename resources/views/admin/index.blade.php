@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('css')
@endsection

@section('content')
<main>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <div>
                <h3 class="mt-5 text-xl font-medium leading-6 text-gray-900">Pemberitahuan</h3>
                <div class="mt-4 flow-root">
                    <ul role="list" class="-mb-8">
                        @foreach($receivedOrders as $received)
                        <li>
                            <div class="relative pb-8">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                            <!-- Heroicon name: mini/check -->
                                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                        <div>
                                            <p class="text-sm text-gray-500"><a
                                                    href="{{ route('admin.orders.detail', ['order' => $received->id_pembelian]) }}"
                                                    class="font-medium text-gray-900">Pesanan #{{
                                                    $received->id_pembelian }}</a> sudah diterima oleh pembeli.</p>
                                        </div>
                                        <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                            <time datetime="2020-10-04">{{
                                                \Carbon\Carbon::parse($received->waktu_diterima)->diffForHumans()
                                                }}</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-3 w-48 ml-auto">
                    {{ $receivedOrders->links() }}
                </div>
            </div>
            <div>
                <h3 class="mt-5 text-xl font-medium leading-6 text-gray-900">Keseluruhan</h3>

                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Pelanggan</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-2 sm:pb-3">
                            <p class="text-2xl font-semibold text-gray-900">{{ $statistics['customers_total'] }}</p>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <!-- Heroicon name: outline/envelope-open -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                </svg>

                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Pesanan Terkirim</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-2 sm:pb-3">
                            <p class="text-2xl font-semibold text-gray-900">{{ $statistics['orders_sent'] }}</p>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-6 w-6 text-white"
                                    fill="currentColor">
                                    <path
                                        d="M551.9 312c-31.1-26.4-69.3-16.1-88.4-1.8l-60.4 45.5h-3.3c-.2-38-30.5-67.8-69.2-67.8h-144c-28.4 0-56.3 9.4-78.5 26.3L79.8 336H16c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h80l41.3-31.5c14-10.7 31.4-16.5 49.4-16.5h144c27.9 0 29.1 40.2-1.1 40.2h-59.8c-7.6 0-13.8 6.2-13.8 13.8v.1c0 7.6 6.2 13.8 13.8 13.8h134.5c9.7 0 19.2-3.2 26.9-9l61.3-46.1c8.3-6.2 20.5-6.7 28.4 0 10.1 8.5 9.3 23.1-.9 30.7L419.4 455c-7.8 5.8-17.2 9-26.9 9H16c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h376.8c19.9 0 39.3-6.5 55.2-18.5l100.8-75.9c16.6-12.5 26.5-31.5 27.1-52 .7-20.5-8.1-40.1-24-53.6zM257.6 144.3l50.1 14.3c3.6 1 6.1 4.4 6.1 8.1 0 4.6-3.8 8.4-8.4 8.4h-32.8c-3.6 0-7.1-.8-10.3-2.2-4.8-2.2-10.4-1.7-14.1 2l-17.5 17.5c-5.3 5.3-4.7 14.3 1.5 18.4 9.5 6.3 20.4 10.1 31.8 11.5V240c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16v-17.6c30.3-3.6 53.4-31 49.3-63-2.9-23-20.7-41.3-42.9-47.7l-50.1-14.3c-3.6-1-6.1-4.4-6.1-8.1 0-4.6 3.8-8.4 8.4-8.4h32.8c3.6 0 7.1.8 10.3 2.2 4.8 2.2 10.4 1.7 14.1-2l17.5-17.5c5.3-5.3 4.7-14.3-1.5-18.4-9.5-6.3-20.4-10.1-31.8-11.5V16c0-8.8-7.2-16-16-16h-16c-8.8 0-16 7.2-16 16v17.6c-30.3 3.6-53.4 31-49.3 63 2.9 23 20.6 41.3 42.9 47.7z" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Produk Terjual (SKU)</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-2 sm:pb-3">
                            <p class="text-2xl font-semibold text-gray-900">{{ $statistics['products_sold'] }}</p>

                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <!-- Heroicon name: outline/users -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>

                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Penghasilan</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-2 sm:pb-3">
                            <p class="text-2xl font-semibold text-gray-900">Rp. {{
                                number_format($statistics['revenue_total'], 0, ',', '.') }}</p>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <!-- Heroicon name: outline/envelope-open -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Pesanan Total</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-2 sm:pb-3">
                            <p class="text-2xl font-semibold text-gray-900">{{ $statistics['orders_total'] }}</p>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="h-6 w-6 text-white"
                                    fill="currentColor">
                                    <path
                                        d="M638 121c-3.3-9.8-10.2-17.8-19.5-22.4L420.2 0c-9.5 13.2-28.4 50.3-100.2 50.3-72.4 0-91.1-37.7-100.2-50.3L21.6 98.6C12.3 103.2 5.3 111.2 2 121c-3.3 9.9-2.6 20.4 2.1 29.7l53 106.2c9.6 19.2 33 27 51.6 17.7l24-11.3c5.3-2.5 11.4 1.4 11.4 7.2v185.3c0 31 25.1 56.2 56 56.2h240c30.9 0 56-25.2 56-56.2V270.6c0-5.9 6.1-9.7 11.4-7.2l23.5 11.1c19.1 9.7 42.5 1.8 52.1-17.4l53-106.2c4.4-9.5 5.2-20 1.9-29.9zm-94 106.4l-73.2-34.6c-10.6-5-22.8 2.7-22.8 14.5v248.6c0 4.4-3.6 8-8 8H200c-4.4 0-8-3.6-8-8V207.3c0-11.7-12.2-19.5-22.8-14.5L96 227.4l-44.8-89.9 155.5-77.3c26.4 24 67.8 38.3 113.3 38.3s86.9-14.3 113.2-38.2l155.5 77.3-44.7 89.8z" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Jumlah Produk</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-2 sm:pb-3">
                            <p class="text-2xl font-semibold text-gray-900">{{ $statistics['products_total'] }}</p>
                        </dd>
                    </div>
                </dl>
            </div>

            <!-- /End replace -->
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection