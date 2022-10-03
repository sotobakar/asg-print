<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['items', 'user'])
            ->where('id_user', auth()->id())
            ->orderBy('id_pembelian', 'desc')
            ->get();

        return view('customer.orders.index', [
            'orders' => $orders
        ]);
    }

    public function detail(Request $request, Order $order)
    {
        $order = $order->load(['items', 'user', 'payment']);

        return view('customer.orders.detail', [
            'order' => $order
        ]);
    }

    public function uploadPayment(Request $request, Order $order)
    {
        // Kalau sudah pernah bayar
        if ($order->payment) {
            return redirect()->route('customer.orders.detail', ['order' => $order->id_pembelian]);
        }

        $request->validate([
            'nama' => 'required',
            'bank' => 'required',
            'tanggal_pembayaran' => 'required',
            'jumlah' => 'required',
            'bukti' => 'required'
        ]);

        $bukti = $request->file('bukti');

        $bukti_path = Storage::disk('public')->putFile('bukti', $bukti);

        $paymentCreated = Payment::create([
            'id_pembelian' => $order->id_pembelian,
            'nama' => $request->input('nama'),
            'bank' => $request->input('bank'),
            'tanggal' => $request->input('tanggal_pembayaran'),
            'jumlah' => $request->input('jumlah'),
            'bukti' => $bukti_path
        ]);

        $order->update([
            'status_pembelian' => 'paid'
        ]);

        return redirect()->route('customer.orders.detail', ['order' => $order->id_pembelian]);
    }

    public function invoice(Request $request, Order $order)
    {
        return view('customer.orders.invoice', [
            'order' => $order
        ]);
    }

    public function cetakInvoice(Request $request, Order $order)
    {
        Carbon::setLocale('id');
        $pdf = Pdf::loadView('customer.orders.invoice',[
            'order' => $order
        ]);

        return $pdf->stream();
    }
}
