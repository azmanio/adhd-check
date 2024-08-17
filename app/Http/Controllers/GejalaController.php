<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gejala::all();
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('pages.admin.gejala.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('pages.admin.gejala.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string'],
            'gejala' => ['required', 'string'],
            'kriteria_id' => ['required', 'string', 'exists:kriterias,id'],
        ]);

        Gejala::create($data);
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('gejala.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        $kriterias = Kriteria::all();
        return view('pages.admin.gejala.update', compact('gejala', 'kriterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string'],
            'gejala' => ['required', 'string'],
            'kriteria_id' => ['required', 'string', 'exists:kriterias,id'],
        ]);

        $gejala->update($data);
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('gejala.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('gejala.index');
    }
}