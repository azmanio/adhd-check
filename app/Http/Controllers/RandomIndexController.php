<?php

namespace App\Http\Controllers;

use App\Models\RandomIndex;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RandomIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RandomIndex::all();
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('pages.admin.random_index.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.random_index.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jumlah_matriks' => ['required', 'numeric'],
            'nilai' => ['required', 'numeric'],
        ]);

        RandomIndex::create($data);
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('random-index.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RandomIndex $randomIndex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RandomIndex $randomIndex)
    {
        return view('pages.admin.random_index.update', compact('randomIndex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RandomIndex $randomIndex)
    {
        $data = $request->validate([
            'jumlah_matriks' => ['required', 'numeric'],
            'nilai' => ['required', 'numeric'],
        ]);

        $randomIndex->update($data);
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('random-index.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RandomIndex $randomIndex)
    {
        $randomIndex->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('random-index.index');
    }
}
