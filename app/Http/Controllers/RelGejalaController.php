<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kriteria;
use App\Models\RandomIndex;
use App\Models\RelGejala;
use Illuminate\Http\Request;

class RelGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kriteria = Kriteria::all();
        $selectedKriteria = $request->input('kriteria_id');
        $gejalas = collect();

        if ($selectedKriteria) {
            $gejalas = Gejala::where('kriteria_id', $selectedKriteria)->get();
        }

        return view('pages.admin.analisis.gejala.index', compact('kriteria', 'selectedKriteria', 'gejalas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $selectedKriteria = $request->input('kriteria_id');
        $gejalas = Kriteria::findOrFail($selectedKriteria)->gejalas;

        $n = $gejalas->count();
        $matriks = [];
        $urut = 0;

        // validasi input bobot
        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;

                $bobot_prioritas = $request[$bobot] ?? 1;

                if ($bobot_prioritas <= 0) {
                    return redirect()->back()->with('error', 'Nilai bobot harus lebih besar dari 0.');
                }

                if ($request[$pilih] == 1) {
                    $matriks[$x][$y] = $bobot_prioritas;
                    $matriks[$y][$x] = 1 / $bobot_prioritas;
                } else {
                    $matriks[$x][$y] = 1 / $bobot_prioritas;
                    $matriks[$y][$x] = $bobot_prioritas;
                }

                RelGejala::updateOrCreate(
                    ['gejala1' => $gejalas[$x]->id, 'gejala2' => $gejalas[$y]->id],
                    ['nilai' => $matriks[$x][$y]],
                );
            }
        }

        // diagonal --> bernilai 1
        for ($i = 0; $i <= ($n - 1); $i++) {
            $matriks[$i][$i] = 1;
        }

        // inisialisasi jumlah tiap kolom dan baris penyakit
        $jmlmpb = array_fill(0, $n, 0);
        $jmlmnk = array_fill(0, $n, 0);

        // menghitung jumlah pada kolom penyakit tabel perbandingan berpasangan
        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $value = $matriks[$x][$y];
                $jmlmpb[$y] += $value;
            }
        }

        // menghitung jumlah pada baris penyakit tabel nilai penyakit
        // matriks merupakan matriks yang telah dinormalisasi
        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $matriksb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
                $value = $matriksb[$x][$y];
                $jmlmnk[$x] += $value;
            }

            // nilai priority vektor
            $pv[$x] = $jmlmnk[$x] / $n;

            $gejalas[$x]->update(['bobot_prioritas' => $pv[$x]]);
        }

        // cek konsistensi
        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('pages.admin.analisis.gejala.hasil', compact('matriks', 'jmlmpb', 'matriksb', 'jmlmnk', 'pv', 'eigenvektor', 'consIndex', 'consRatio', 'n', 'gejalas'));
    }

    // Fungsi untuk menghitung eigenvektor
    private function getEigenVector($matriks_a, $matriks_b, $n)
    {
        $eigenvektor = 0;
        for ($i = 0; $i < $n; $i++) {
            $eigenvektor += ($matriks_a[$i] * ($matriks_b[$i] / $n));
        }
        return $eigenvektor;
    }

    // Fungsi untuk menghitung Consistency Index
    private function getConsIndex($matriks_a, $matriks_b, $n)
    {
        $eigenvektor = $this->getEigenVector($matriks_a, $matriks_b, $n);
        $consindex = ($eigenvektor - $n) / ($n - 1);

        return $consindex;
    }

    // Fungsi untuk menghitung Consistency Ratio
    private function getConsRatio($matriks_a, $matriks_b, $n)
    {
        $consindex = $this->getConsIndex($matriks_a, $matriks_b, $n);
        $ri = RandomIndex::where('jumlah_matriks', $n)->first();
        $nilaiIR = $ri ? $ri->nilai : 0;

        // Prevent division by zero
        if ($nilaiIR == 0) {
            return 0;
        }

        $consratio = $consindex / $nilaiIR;

        return $consratio;
    }
}