<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::get();
        return view('data.obat.index', [
            'obats' => $obats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // Obat::create([
        //     'name' => $data['name'],
        //     'satuan' => $data['satuan'],
        //     'harga' => $data['harga'],
        //     'stok' => $data['stok'],
        // ]);

        $name = $request->name;
        $satuan = $request->satuan;
        $harga = $request->harga;
        $stok = $request->stok;

        for ($i=0; $i < count($name); $i++) {
            $data = [
                'name' =>$name[$i],
                'satuan' => $satuan[$i],
                'harga' => $harga[$i],
                'stok' => $stok[$i],
            ];
            Obat::create($data);
        }
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('data.obat.edit', [
            'obat' => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $obat = Obat::findOrFail($id);
        $obat->update([
            'name' => $data['name'],
            'satuan' => $data['satuan'],
            'harga' => $data['harga'],
            'stok' => $data['stok'],
        ]);
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::where('id',$id)->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus');
    }
}
