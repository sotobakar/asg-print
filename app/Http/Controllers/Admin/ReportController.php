<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.report.index');
    }

    public function cetak(Request $request)
    {
        $validated = $request->validate([
            'start' => ['required'],
            'end' => ['required']
        ]);

        $orders = Order::with(['items'])
            ->where('tanggal_pembelian', '>=', $validated['start'])
            ->where('tanggal_pembelian', '<=', $validated['end'])
            ->get();

        $order = Order::where('status_pembelian', '!=', 'pending')->first();

        // Statistik Umum
        $statistics = [
            'Total Penjualan Produk (Unit SKU)' => 240,
            'Total Penghasilan' => 'Rp. ' . number_format(20000000,0, ',', '.'),
            'Total Pesanan' => 30,
            'Kategori Terpopuler' => 'Baju Gathering',
            'Produk Terpopuler' => 'Satoru Gojo',
            'Kategori dengan Profit Terbesar' => 'Jas',
            'Daerah Pembeli Terbanyak' => 'KOTA ADMINISTRASI JAKARTA BARAT'
        ];

        // Statistik Lain
        $other_statistics = [
            'Total Pesanan Custom Sablon' => 240,
            'Total Penjualan Produk Custom Sablon' => 40,
            'Total Penghasilan Custom Sablon' => 'Rp. ' . number_format(20000000,0, ',', '.'),
        ];

        Carbon::setLocale('id');
        $base64String = base64_encode(file_get_contents(public_path('assets/images/logo.png')));

        $pdf = Pdf::loadView('admin.report.pdf', [
            'order' => $order,
            'statistics' => $statistics,
            'other_statistics' => $other_statistics,
            'start' => Carbon::parse($validated['start'])->translatedFormat('d F Y'),
            'end' => Carbon::parse($validated['end'])->translatedFormat('d F Y'),
            'base64String' => $base64String
        ]);



        // Get total sales
        // Get total revenue
        // Get amount of product sold per category

        return $pdf->stream();
    }
}
