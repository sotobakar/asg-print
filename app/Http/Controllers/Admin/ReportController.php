<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.report.index');
    }

    public function cetak(Request $request)
    {
        // Periksa jenis filter (Minggu, Bulan, Tahun)
        $filter = $request->input('filter_period');
        $input_date = [
            'start_week' => $request->input('start_week'),
            'end_week' => $request->input('end_week'),
            'start_month' => $request->input('start_month'),
            'end_month' => $request->input('end_month'),
            'start_year' => $request->input('start_year'),
            'end_year' => $request->input('end_year')
        ];

        if ($filter == 'weekly') {
            // Combine start and end into date

            // Query with whereDate
            Order::with(['user'])
                ->whereDate('');
        } else if ($filter == 'monthly') {
            // ignore _week, combine start and end into date

            // Query with whereDate
        } else if ($filter == 'yearly') {
            // only year, combine start and end year into daye

            // Query with whereDate
        }

        // return view with order data

        var_dump($filter);
        echo "<br>";
        var_dump($input_date);
    }
}
