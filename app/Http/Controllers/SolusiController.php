<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use Illuminate\Http\Request;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Solusi::all();
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

        Solusi::create($data);
        return redirect()->route('solusi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solusi $solusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solusi $solusi)
    {
        return view('pages.admin.solusi.update', compact('solusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solusi $solusi)
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
    public function destroy(Solusi $solusi)
    {
        $solusi->delete();
        return redirect()->route('solusi.index');
    }
}
