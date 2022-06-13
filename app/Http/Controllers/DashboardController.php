<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function index()
    {
        $total_penjualan = Penjualan::whereDate('created_at', Carbon::today())->sum('total_harga');
        $total_pembelian = Pembelian::whereDate('created_at', Carbon::today())->sum('total_harga');
        $total_pendapatan = $total_penjualan - $total_pembelian;
        $today_penjualan = "Rp. " . number_format($total_penjualan,0,",",".");
        $today_pembelian = "Rp. " . number_format($total_pembelian,0,",",".");
        $today_pendapatan = "Rp. " . number_format($total_pendapatan,0,",",".");
        
        if (Auth::user()->first_time_login) {
            $first_time_login = true;
            Auth::user()->first_time_login = false;
            Auth::user()->save();
        } else {
            $first_time_login = false;
        }
        return view('dashboard', [
            'today_penjualan' => $today_penjualan,
            'today_pembelian' => $today_pembelian,
            'today_pendapatan' => $today_pendapatan,
            'first_time_login' => $first_time_login,
        ]);
    }
}
