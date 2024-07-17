<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
        return view('pages.admin.solusi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.solusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => ['required', 'string'],
            'solusi' => ['required', 'string'],
            'bobot_kategori' => ['required', 'numeric'],
        ]);

        Kategori::create($data);
        return redirect()->route('solusi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $solusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $solusi)
    {
        return view('pages.admin.solusi.update', compact('solusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $solusi)
    {
        $data = $request->validate([
            'kategori' => ['required', 'string'],
            'solusi' => ['required', 'string'],
            'bobot_kategori' => ['required', 'numeric'],
        ]);

        $solusi->update($data);
        return redirect()->route('solusi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $solusi)
    {
        $solusi->delete();
        return redirect()->route('solusi.index');
    }
}
