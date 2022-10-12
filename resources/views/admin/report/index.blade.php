@extends('layouts.admin.app')

@section('title', 'Laporan Pembelian')

@section('css')
@endsection

@section('content')
<main>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <form action="{{ route('admin.report.print') }}" method="POST" class="px-8">
                @csrf
                <h1 class="text-center text-2xl font-bold">Menu Laporan Pembelian</h1>
                <div class="mt-4">
                    <label class="text-base font-medium text-gray-900">Filter</label>
                    <p class="text-sm leading-5 text-gray-500">Pilih jangka waktu yang Anda inginkan.</p>
                    <fieldset class="mt-4">
                        <legend class="sr-only">Filter</legend>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input id="weekly" name="filter_period" type="radio" checked
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="weekly">
                                <label for="weekly"
                                    class="ml-3 block text-sm font-medium text-gray-700">Mingguan</label>
                            </div>

                            <div class="flex items-center">
                                <input id="monthly" name="filter_period" type="radio"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="monthly">
                                <label for="monthly"
                                    class="ml-3 block text-sm font-medium text-gray-700">Bulanan</label>
                            </div>

                            <div class="flex items-center">
                                <input id="yearly" name="filter_period" type="radio"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="yearly">
                                <label for="yearly" class="ml-3 block text-sm font-medium text-gray-700">Tahunan</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="mt-6 flex flex-col gap-y-4">
                    <div class="flex gap-x-12">
                        <div class="w-1/3">
                            <label for="start_week" class="block text-sm font-medium text-gray-700">Start Minggu</label>
                            <div class="mt-1">
                                <input type="text" name="start_week" id="start_week"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="1" aria-describedby="week-description">
                            </div>
                            <p class="mt-2 text-sm text-gray-500" id="week-description">(contoh: 1 untuk tanggal 1).
                            </p>
                        </div>
                        <div class="w-1/3">
                            <label for="start_month" class="block text-sm font-medium text-gray-700">Start Bulan</label>
                            <div class="mt-1">
                                <input type="text" name="start_month" id="start_month"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="5" aria-describedby="month-description">
                            </div>
                            <p class="mt-2 text-sm text-gray-500" id="month-description">(contoh: 5 untuk Mei).
                            </p>
                        </div>
                        <div class="w-1/3">
                            <label for="start_year" class="block text-sm font-medium text-gray-700">Start Tahun</label>
                            <div class="mt-1">
                                <input type="text" name="start_year" id="start_year"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="2022" aria-describedby="year-description">
                            </div>
                            <p class="mt-2 text-sm text-gray-500" id="year-description">(contoh: 2022).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex flex-col gap-y-4">
                    <div class="flex gap-x-12">
                        <div class="w-1/3">
                            <label for="end_week" class="block text-sm font-medium text-gray-700">End Minggu</label>
                            <div class="mt-1">
                                <input type="text" name="end_week" id="end_week"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="1" aria-describedby="week-description">
                            </div>
                            <p class="mt-2 text-sm text-gray-500" id="week-description">(contoh: 1 untuk tanggal 1).
                            </p>
                        </div>
                        <div class="w-1/3">
                            <label for="end_month" class="block text-sm font-medium text-gray-700">End Bulan</label>
                            <div class="mt-1">
                                <input type="text" name="end_month" id="end_month"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="5" aria-describedby="month-description">
                            </div>
                            <p class="mt-2 text-sm text-gray-500" id="month-description">(contoh: 5 untuk Mei).
                            </p>
                        </div>
                        <div class="w-1/3">
                            <label for="end_year" class="block text-sm font-medium text-gray-700">End Tahun</label>
                            <div class="mt-1">
                                <input type="text" name="end_year" id="end_year"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="2022" aria-describedby="year-description">
                            </div>
                            <p class="mt-2 text-sm text-gray-500" id="year-description">(contoh: 2022).
                            </p>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="mt-12 mx-auto flex items-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                    <!-- Heroicon name: mini/envelope -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="-ml-1 mr-3 h-5 w-5">
                        <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z" clip-rule="evenodd" />
                      </svg>                      
                    Cetak
                </button>
            </form>

            <!-- /End replace -->
        </div>
    </div>
</main>
@endsection

@section('js')
<script src={{ url('assets/js/admin/report/index.js')}}></script>
@endsection