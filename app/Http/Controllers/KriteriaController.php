<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kriteria::all();
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('pages.admin.kriteria.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_kriteria' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'solusi' => ['required', 'string'],
        ]);

        Kriteria::create($data);
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('kriteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriterium)
    {
        return view('pages.admin.kriteria.update', compact('kriterium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriterium)
    {
        $data = $request->validate([
            'kode_kriteria' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'solusi' => ['required', 'string'],
        ]);

        $kriterium->update($data);
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('kriteria.index');
    }
}
