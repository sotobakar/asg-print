<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $orders = Order::with(['items', 'ongkir'])
            ->where('tanggal_pembelian', '>=', $validated['start'])
            ->where('tanggal_pembelian', '<=', $validated['end']);

        $order = Order::where('status_pembelian', '!=', 'pending')->first();

        $statistics['Total Penjualan Produk (Unit SKU)'] = OrderItem::whereHas('order', function (Builder $query) use ($validated) {
            $query->where('status_pembelian', 'sent')
                ->where('tanggal_pembelian', '>=', $validated['start'])
                ->where('tanggal_pembelian', '<=', $validated['end']);
        })->sum('jumlah');

        $statistics['Total Pesanan'] = $orders->where('status_pembelian', 'sent')->count();

        $total_penghasilan = OrderItem::whereHas('order', function (Builder $query) use ($validated) {
            $query->where('status_pembelian', 'sent')
                ->where('tanggal_pembelian', '>=', $validated['start'])
                ->where('tanggal_pembelian', '<=', $validated['end']);
        })->sum('subharga');

        $total_penghasilan += $orders->get()->sum('ongkir.tarif');

        $statistics['Total Penghasilan'] = 'Rp. ' . number_format($total_penghasilan, 0, ',', '.');

        // Kategori Terpopuler
        $kategori_terpopuler = DB::table('pembelian_produk')
            ->join('sku', 'pembelian_produk.id_sku', '=', 'sku.id')
            ->join('produk', 'sku.id_produk', '=', 'produk.id_produk')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('pembelian', 'pembelian_produk.id_pembelian', '=', 'pembelian.id_pembelian')
            ->where('pembelian.status_pembelian', 'sent')
            ->where('pembelian.tanggal_pembelian', '>=', $validated['start'])
            ->where('pembelian.tanggal_pembelian', '<=', $validated['end'])
            ->select('kategori.nama_kategori', DB::raw('sum(pembelian_produk.jumlah) as jumlah'))
            ->groupBy('kategori.nama_kategori')
            ->orderBy('jumlah', 'desc')
            ->first();

        $statistics['Kategori Terpopuler'] = $kategori_terpopuler ? ucwords($kategori_terpopuler->nama_kategori) : 'Tidak Ada Penjualan';

        // Produk Terpopuler
        $produk_terpopuler = DB::table('pembelian_produk')
            ->join('sku', 'pembelian_produk.id_sku', '=', 'sku.id')
            ->join('produk', 'sku.id_produk', '=', 'produk.id_produk')
            ->join('pembelian', 'pembelian_produk.id_pembelian', '=', 'pembelian.id_pembelian')
            ->where('pembelian.status_pembelian', 'sent')
            ->where('pembelian.tanggal_pembelian', '>=', $validated['start'])
            ->where('pembelian.tanggal_pembelian', '<=', $validated['end'])
            ->select('produk.nama_produk', DB::raw('sum(pembelian_produk.jumlah) as jumlah'))
            ->groupBy('produk.nama_produk')
            ->orderBy('jumlah', 'desc')
            ->first();

        $statistics['Produk Terpopuler'] = $produk_terpopuler ? ucwords($produk_terpopuler->nama_produk) : 'Tidak Ada Penjualan';

        // Kategori dengan profit terbesar
        $kategori_profit_terbesar = DB::table('pembelian_produk')
            ->join('sku', 'pembelian_produk.id_sku', '=', 'sku.id')
            ->join('produk', 'sku.id_produk', '=', 'produk.id_produk')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('pembelian', 'pembelian_produk.id_pembelian', '=', 'pembelian.id_pembelian')
            ->where('pembelian.status_pembelian', 'sent')
            ->where('pembelian.tanggal_pembelian', '>=', $validated['start'])
            ->where('pembelian.tanggal_pembelian', '<=', $validated['end'])
            ->select('kategori.nama_kategori', DB::raw('sum(pembelian_produk.subharga) as total_harga'))
            ->groupBy('kategori.nama_kategori')
            ->orderBy('total_harga', 'desc')
            ->first();

        $statistics['Kategori dengan Profit Terbesar'] = $kategori_profit_terbesar ? ucwords($kategori_profit_terbesar->nama_kategori) : 'Tidak Ada Penjualan';

        // Daerah dengan pembeli terbanyak  
        $daerah_pembeli_terbanyak = DB::table('pembelian')
            ->where('pembelian.status_pembelian', 'sent')
            ->where('pembelian.tanggal_pembelian', '>=', $validated['start'])
            ->where('pembelian.tanggal_pembelian', '<=', $validated['end'])
            ->join('ongkir', 'pembelian.id_ongkir', '=', 'ongkir.id_ongkir')
            ->select('ongkir.nama_kota', DB::raw('count(*) as jumlah_pembelian'))
            ->groupBy('ongkir.nama_kota')
            ->orderBy('jumlah_pembelian', 'desc')
            ->first();

        $statistics['Daerah Pembeli Terbanyak'] = $daerah_pembeli_terbanyak ? ucwords($daerah_pembeli_terbanyak->nama_kota) : 'Tidak Ada Penjualan';

        // Statistik Lain
        $other_statistics = [
            'Total Penghasilan Custom Sablon' => 'Rp. ' . number_format(20000000, 0, ',', '.'),
        ];

        $other_statistics['Total Pesanan Custom Sablon'] = $orders->where('status_pembelian', 'sent')
            ->whereHas('items', function (Builder $query) {
                $query->whereHas('sku', function (Builder $query) {
                    $query->whereHas('product', function (Builder $query) {
                        $query->where('nama_produk', 'Custom Sablon');
                    });
                });
            })->count();

        $other_statistics['Total Penjualan Produk Custom Sablon'] = OrderItem::whereHas('order', function (Builder $query) use ($validated) {
            $query->where('status_pembelian', 'sent')
                ->where('tanggal_pembelian', '>=', $validated['start'])
                ->where('tanggal_pembelian', '<=', $validated['end']);
        })->whereHas('sku', function (Builder $query) {
            $query->whereHas('product', function (Builder $query) {
                $query->where('nama_produk', 'Custom Sablon');
            });
        })->sum('jumlah');

        $penghasilan_custom_sablon = OrderItem::whereHas('order', function (Builder $query) use ($validated) {
            $query->where('status_pembelian', 'sent')
                ->where('tanggal_pembelian', '>=', $validated['start'])
                ->where('tanggal_pembelian', '<=', $validated['end']);
        })->whereHas('sku', function (Builder $query) {
            $query->whereHas('product', function (Builder $query) {
                $query->where('nama_produk', 'Custom Sablon');
            });
        })->sum('subharga');

        $penghasilan_custom_sablon += $orders->whereHas('items.sku.product', function (Builder $query) {
            $query->where('nama_produk', 'Custom Sablon');
        })->get()->sum('ongkir.tarif');

        $other_statistics['Total Penghasilan Custom Sablon'] = 'Rp. ' . number_format($penghasilan_custom_sablon, 0, ',', '.');


        Carbon::setLocale('id');

        $pdf = Pdf::loadView('admin.report.pdf', [
            'order' => $order,
            'statistics' => $statistics,
            'other_statistics' => $other_statistics,
            'start' => Carbon::parse($validated['start'])->translatedFormat('d F Y'),
            'end' => Carbon::parse($validated['end'])->translatedFormat('d F Y'),
        ]);

        return $pdf->download('Laporan Pembelian ' . $validated['start'] . ' ' . $validated['end'] . '.pdf');
    }
}
