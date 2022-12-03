<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianObat;
use App\Models\PembelianDetail;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::get();
        $detailPembelian = PembelianDetail::get();
        return view('transaksi.pembelian.index', [
            'pembelian' => $pembelian,
            'detailPembelian' => $detailPembelian
        ]);
    }

    public function create()
    {
        $obat = Obat::orderBy('nama_obat')->get();
        return view('transaksi.pembelian.create', [
            'obat' => $obat
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'qty' => 'required',
            'total_transaksi' => 'required',
            'nama_penjual' => 'required',
        ]);

        $expTotal = explode('.', $validatedData['total_transaksi']);
        $impTotal = implode('', $expTotal);

        Pembelian::create([
            'no_transaksi' => 'PB-'.rand(0,9999),
            'total_transaksi' => $impTotal,
            'user_id' => Auth::id(),
            'nama_penjual' => $validatedData['nama_penjual']
        ]);

        $pembelian = Pembelian::latest()->first();
        
        for ($i=0; $i < count($validatedData['obat_id']); $i++) {
            $obat[$i] = Obat::where('id', $validatedData['obat_id'][$i])->first();
            $data = [
                'obat_id' => $validatedData['obat_id'][$i],
                'qty' =>$validatedData['qty'][$i],
                'harga' => $obat[$i]->harga,
                'total_harga' => $obat[$i]->harga * $validatedData['qty'][$i],
                'no_transaksi' => $pembelian->no_transaksi
            ];
            $stokAwal[$i] = $obat[$i]->stok;
            $stokAkhir[$i] = $stokAwal[$i] + $validatedData['qty'][$i];
            PembelianDetail::create($data);
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

        return to_route('pembelian.index')->with('success', 'Data berhasil ditambahkan');
    }
}
