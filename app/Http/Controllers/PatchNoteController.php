<?php

namespace App\Http\Controllers;

use App\Models\PatchNote;
use Illuminate\Http\Request;

class PatchNoteController extends Controller
{
    public function index()
    {
        $patchnotes = PatchNote::get();

        return view('data.patchnote.index', [
            'patchnotes' => $patchnotes
        ]);
    }

    public function create()
    {
        return view('data.patchnote.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'thumbnail' => 'required',
            'featured_img' => 'required|string',
            'subtitle' => 'required|string',
            'body' => 'required|string'
        ]);

        $path = 'patchnotes-images/';
        $file = $validatedData['thumbnail'];
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';

        //upload
        $file->move(public_path('storage/' . $path), $new_image_name);

        // dd($validatedData);

        PatchNote::create([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'thumbnail' => $validatedData['thumbnail'],
            'featured_img' => $validatedData['featured_img'],
            'subtitle' => $validatedData['subtitle'],
            'body' => $validatedData['body'],
        ]);

        return redirect()->route('patchnote.index')->with('success', 'Patch Note berhasil dibuat');
    }

    public function show()
    {
        return view('patchnote');
    }

    public function edit($id)
    {
        $pn = PatchNote::findOrFail($id);

        return view('data.patchnote.edit', [
            'pn' => $pn
        ]);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'thumbnail' => 'required|string',
            'featured_img' => 'required|string',
            'subtitle' => 'required|string',
            'body' => 'required|string'
        ]);

        $pn = PatchNote::findOrFail($id);

        $pn->update([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'thumbnail' => $validatedData['thumbnail'],
            'featured_img' => $validatedData['featured_img'],
            'subtitle' => $validatedData['subtitle'],
            'body' => $validatedData['body'],
        ]);

        return redirect()->route('user.index')->with('success', 'Patch Note berhasil diupdate');;
    }

    public function destroy($id)
    {
        $pn = PatchNote::find($id);

        $pn->delete();
        return redirect()->route('user.index')->with('success', 'Patch Note berhasil dihapus');
    }
}
