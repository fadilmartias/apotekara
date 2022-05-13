<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualans = Penjualan::get();
        return view('transaksi.penjualan.index', [
            'penjualans' => $penjualans,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obats = Obat::orderBy('nama_obat')->get();
        return view('transaksi.penjualan.create', [
            'obats' => $obats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'satuan' => 'required',
            'qty' => 'required',
        ]);


        $obat = Obat::where('id', $validatedData['name'])->first();

        $stokAwal = $obat->stok;
        $stokAkhir = $stokAwal - $validatedData['qty'];

        if ($validatedData['satuan'] === 'Strip') {
            $harga = $validatedData['qty'] * $obat->harga_strip;
        } else {
            $harga = $validatedData['qty'] * $obat->harga_satuan;
        }

        Penjualan::create([
            'user_id' => Auth::user()->id,
            'obat_id' => $validatedData['name'],
            'satuan' => $validatedData['satuan'],
            'qty' => $validatedData['qty'],
            'total_harga' => $harga
        ]);

        $obat->update([
            'stok' => $stokAkhir
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
