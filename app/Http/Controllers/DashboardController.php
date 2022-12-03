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
        $total_penjualan = Penjualan::whereDate('created_at', Carbon::today())->sum('total_transaksi');
        $total_pembelian = Pembelian::whereDate('created_at', Carbon::today())->sum('total_transaksi');
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

        // Bulang
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        for($i = 0; $i < count($bulan); $i++){
            $bulan[$i];
        }

        // Grafik Transaksi
        // Penjualan
        $penjualanPerBulan = Penjualan::whereYear('created_at', 2022)->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('m');
        });

        $penjualan2=[];
        $penjualan2Arr=[];
        foreach($penjualanPerBulan as $month => $values) {
            $penjualan2Arr[$month-1]=count($values);
        }

        for ($i = 0; $i <= 11; $i++) {
            if(!empty($penjualan2Arr[$i])){
                $penjualan2[$i] = $penjualan2Arr[$i];    
            }else{
                $penjualan2[$i] = 0;    
            }
        }

        // Pembelian
        $pembelianPerBulan = Pembelian::whereYear('created_at', 2022)->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('m');
        });

        $pembelian2=[];
        $pembelian2Arr=[];
        foreach($pembelianPerBulan as $month => $values) {
            $pembelian2Arr[$month-1]=count($values);
        }

        for ($i = 0; $i <= 11; $i++) {
            if(!empty($pembelian2Arr[$i])){
                $pembelian2[$i] = $pembelian2Arr[$i];    
            }else{
                $pembelian2[$i] = 0;    
            }
        }

        // Grafik Keuangan
        // Pendapatan
        $pendapatanPerBulan = Penjualan::whereYear('created_at', 2022)->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('m');
        });

        $pendapatan2=[];
        $pendapatan2Arr=[];
        foreach($pendapatanPerBulan as $month => $values) {   
            foreach($values as $value) {
                $pendapatan2Arr[$month-1]=$value->total_transaksi;
            }
        }

        for ($i = 0; $i <= 11; $i++) {
            if(!empty($pendapatan2Arr[$i])){
                $pendapatan2[$i] = $pendapatan2Arr[$i];    
            }else{
                $pendapatan2[$i] = 0;    
            }
        }

        // Pengeluaran
        $pengeluaranPerBulan = Pembelian::whereYear('created_at', 2022)->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('m');
        });

        $pengeluaran2=[];
        $pengeluaran2Arr=[];
        foreach($pengeluaranPerBulan as $month => $values) {   
            foreach($values as $value) {
                $pengeluaran2Arr[$month-1]=$value->total_transaksi;
            }
        }

        for ($i = 0; $i <= 11; $i++) {
            if(!empty($pengeluaran2Arr[$i])){
                $pengeluaran2[$i] = $pengeluaran2Arr[$i];    
            }else{
                $pengeluaran2[$i] = 0;    
            }
        }
        

        return view('dashboard', [
            'today_penjualan' => $today_penjualan,
            'today_pembelian' => $today_pembelian,
            'today_pendapatan' => $today_pendapatan,
            'first_time_login' => $first_time_login,
            'penjualan' => $penjualan2,
            'pembelian' => $pembelian2,
            'pendapatan' => $pendapatan2,
            'pengeluaran' => $pengeluaran2,
            'bulan' => $bulan,
        ]);
    }
}
