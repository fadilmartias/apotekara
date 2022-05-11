<?php

namespace App\Http\Controllers;

use App\Exports\ObatExport;
use App\Imports\ObatsImport;
use App\Models\Obat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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
        // DB::table('obats')->orderBy('nama_obat')->chunk(100, function ($obats) {
        //     foreach ($obats as $obat) {
        //         //
        //     }
        // });

    //     //to use parameter or variable sent from ajax view

    // $query = DB::table('obats')->orderBy('nama_obat');


    // return DataTables::queryBuilder($query)->toJson();

        // $item = Obat::get();

        // if (request()->ajax()) {
        //     return DataTables::of($item)
        //     ->addColumn('nama_obat', function ($item){
        //         return $item->nama_obat;
        //     })
        //     ->addColumn('harga_satuan', function ($item){
        //         return $item->harga_satuan;
        //     })
        //     ->addColumn('harga_strip', function ($item){
        //         return $item->harga_strip;
        //     })
        //     ->addColumn('stok', function ($item){
        //         return $item->stok;
        //     })
        //     ->rawColumns(['nama_obat', 'harga_satuan', 'harga_strip', 'stok'])
        //     ->make(true);
        // }

        // return view('data.obat.index');

    }

    public function serverSide()
    {
        return view('data.obat.serverside');
    }

    public function json()
    {
        $data = Obat::limit(10);
        if (request()->ajax()) {
            return DataTables::of($data)
            ->addColumn('aksi', function ($data)
            {
                $button = "<a href='" . route('obat.edit', $data->id) . "' id'" . $data->id . "' class='btn btn-warning mr-2'>
                <i class='fab fa-solid fa-pen-to-square'></i>
            </a>";
                $button .= '<button type="submit" class="btn btn-danger"
                onclick="swalDelete('. $data->id.' )">
                <i class="fab fa-solid fa-trash"></i>
                <form id="id-' . $data->id . '"
                    action="' . route('obat.destroy', $data->id) .'" method="POST">
                    <input type="hidden" name="_token" value="'. csrf_token() .'" />
                </form>
            </button>';
                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

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

        $name = $request->name;
        $satuan = $request->satuan;
        $harga_satuan = $request->harga_satuan;
        $harga_strip = $request->harga_strip;
        $stok = $request->stok;

        for ($i=0; $i < count($name); $i++) {
            $data = [
                'nama_obat' =>$name[$i],
                'satuan' => $satuan[$i],
                'harga_satuan' => $harga_satuan[$i],
                'harga_strip' => $harga_strip[$i],
                'stok' => $stok[$i],
            ];
            Obat::create($data);
        }
        return redirect()->route('obat.serverSide')->with('success', 'Data obat berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {

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
            'nama_obat' => $data['name'],
            'satuan' => $data['satuan'],
            'harga_satuan' => $data['harga_satuan'],
            'harga_strip' => $data['harga_strip'],
            'stok' => $data['stok'],
        ]);
        return redirect()->route('obat.serverSide')->with('success', 'Data obat berhasil diupdate');
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

        return redirect()->route('obat.serverSide')->with('success', 'Data obat berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new ObatExport, 'daftar-obat.xlsx');
    }

    public function import(Request $request)
    {

        $file = $request->file('file');
        $import = new ObatsImport;
        Excel::queueImport($import, $file);

        return redirect(route('obat.serverSide'))->with('success', 'Excel Berhasil Di-Upload');
    }
}
