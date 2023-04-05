<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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

        return to_route('penjualan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function invoice(Request $request, $id)
    {
        $data = Penjualan::findOrFail($id);
        $data->update([
            'nama_pembeli' => $request->nama_pembeli
        ]);
        $harga = $data->details->sum('total_harga');
        $pdf = Pdf::loadView('transaksi.penjualan.invoice', [
            'data' => $data,
            'harga' => $harga,
            'alamat_pembeli' => $request->alamat_pembeli,
            'telp_pembeli' => $request->telp_pembeli
        ])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
