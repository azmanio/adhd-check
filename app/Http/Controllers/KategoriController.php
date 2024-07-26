<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::with('kriteria')->get();
        return view('pages.admin.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = Kriteria::all();
        return view('pages.admin.kategori.create', compact('kriterias'));
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
            'kriteria_id' => ['required', 'exists:kriterias,id'],
        ]);

        Kategori::create($data);
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
        $kriterias = Kriteria::all();
        return view('pages.admin.kategori.update', compact('kategori', 'kriterias'));
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
            'kriteria_id' => ['required', 'exists:kriterias,id'],
        ]);

        $kategori->update($data);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}