<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = Riwayat::with(['kriteria', 'user'])->whereNotNull('kriteria_id')->get();

        return view('pages.admin.riwayat.index', compact('riwayats'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        return redirect()->route('riwayat.index');
    }
}
