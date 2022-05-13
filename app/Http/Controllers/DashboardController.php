<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $total_penjualan = Penjualan::whereDate('created_at', Carbon::today())->sum('total_harga');
        $today_penjualan = "Rp. " . number_format($total_penjualan,0,",",".");
        return view('dashboard', [
            'today_penjualan' => $today_penjualan
        ]);
    }
}
