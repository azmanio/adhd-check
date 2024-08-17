<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('pages.admin.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'range_min' => ['required', 'numeric'],
            'range_max' => ['required', 'numeric'],
        ]);

        Kategori::create($data);
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('pages.admin.kategori.update', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
            'kategori' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'range_min' => ['required', 'numeric'],
            'range_max' => ['required', 'numeric'],
        ]);

        $kategori->update($data);
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('kategori.index');
    }
}