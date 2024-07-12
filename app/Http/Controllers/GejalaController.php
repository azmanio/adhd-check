<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gejala::all();
        return view('pages.admin.gejala.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.gejala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string'],
            'nama' => ['required', 'string'],
        ]);

        Gejala::create($data);
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
        return view('pages.admin.gejala.update', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $data = $request->validate([
            'kode_gejala' => ['required', 'string'],
            'nama' => ['required', 'string'],
        ]);

        $gejala->update($data);
        return redirect()->route('gejala.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect()->route('gejala.index');
    }
}