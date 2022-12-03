<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::get();
        $detailPenjualan = PenjualanDetail::get();
        return view('transaksi.penjualan.index', [
            'penjualan' => $penjualan,
            'detailPenjualan' => $detailPenjualan
        ]);
    }

    public function create()
    {
        $obat = Obat::orderBy('nama_obat')->get();
        return view('transaksi.penjualan.create', [
            'obat' => $obat
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'qty' => 'required',
            'total_transaksi' => 'required',
        ]);
        for ($i=0; $i < count($validatedData['obat_id']); $i++) {
            $obat[$i] = Obat::where('id', $validatedData['obat_id'][$i])->first();
            $stokAwal[$i] = $obat[$i]->stok; 
            if($validatedData['qty'][$i] > $stokAwal[$i]){
                return redirect()->back()->with('error', 'Stok tidak cukup');
            }
        }

        $expTotal = explode('.', $validatedData['total_transaksi']);
        $impTotal = implode('', $expTotal);

        Penjualan::create([
            'no_transaksi' => 'PJ-'.rand(0,9999),
            'total_transaksi' => $impTotal,
            'user_id' => Auth::id(),
        ]);

        $penjualan = Penjualan::latest()->first();
        
        for ($i=0; $i < count($validatedData['obat_id']); $i++) {
            $obat[$i] = Obat::where('id', $validatedData['obat_id'][$i])->first();
            $data = [
                'obat_id' => $validatedData['obat_id'][$i],
                'qty' =>$validatedData['qty'][$i],
                'harga' => $obat[$i]->harga,
                'total_harga' => $obat[$i]->harga * $validatedData['qty'][$i],
                'no_transaksi' => $penjualan->no_transaksi
            ];
            $stokAwal[$i] = $obat[$i]->stok; 
            $stokAkhir[$i] = $stokAwal[$i] - $validatedData['qty'][$i];
            PenjualanDetail::create($data);
            $obat[$i]->update([
                'stok' => $stokAkhir[$i]
            ]);
        }

        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'satuan' => 'required',
        //     'qty' => 'required',
        //     'nama_penjual' => 'required',
        //     'harga_satuan' => 'required',
        // ]);


        // $stokAwal = $obat->stok;
        // $stokAkhir = $stokAwal + $validatedData['qty'];
        // $totalHarga = $validatedData['harga_satuan'] * $validatedData['qty'];

        // Pembelian::create([
        //     'user_id' => Auth::user()->id,
        //     'obat_id' => $validatedData['name'],
        //     'satuan' => $validatedData['satuan'],
        //     'qty' => $validatedData['qty'],
        //     'harga_satuan' => $validatedData['harga_satuan'],
        //     'total_harga' => $totalHarga,
        //     'nama_penjual' => $validatedData['nama_penjual'],
        // ]);

        // $obat->update([
        //     'stok' => $stokAkhir
        // ]);

        return to_route('penjualan.index')->with('success', 'Data berhasil ditambahkan');
    }
}
