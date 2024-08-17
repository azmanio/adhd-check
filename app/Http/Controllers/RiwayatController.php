<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = Riwayat::with(['kriteria', 'user'])->get();
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('pages.admin.riwayat.index', compact('riwayats'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('riwayat.index');
    }
}