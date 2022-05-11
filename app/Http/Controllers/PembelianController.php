<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianObat;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = Pembelian::get();
        return view('transaksi.pembelian.index', [
            'pembelians' => $pembelians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembelian::create([
            'no_transaksi' => 'PB-'.rand(0,9999),
            'total_harga' => $request->total_harga,
            'nama_user' => Auth::user()->nama_user
        ]);

        $pembelian = Pembelian::orderBy('id', 'desc')->first();

        $nama_obat = $request->nama_obat;
        $qty = $request->qty;
        $satuan = $request->satuan;
        $harga = $request->harga;

        for ($i=0; $i < count($nama_obat); $i++) {
            $data = [
                'nama_obat' => $nama_obat[$i],
                'qty' =>$qty[$i],
                'satuan' => $satuan[$i],
                'harga' => $harga[$i],
                'id_pembelian' => $pembelian->id,
                'no_transaksi' => $pembelian->no_transaksi
            ];
            PembelianObat::create($data);
        }
        return redirect()->route('pembelian.index')->with('success', 'Data obat berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
