<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\RandomIndex;
use App\Models\RelKriteria;
use Illuminate\Http\Request;

class RelKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::get();

        return view('pages.admin.analisis.kriteria.index', compact('kriterias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kriterias = Kriteria::all();

        $n = Kriteria::count();
        $matriks = [];
        $urut = 0;

        // validasi input bobot_prioritas
        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot_prioritas = "bobot" . $urut;

                if ($request[$pilih] == 1) {
                    $matriks[$x][$y] = $request[$bobot_prioritas];
                    $matriks[$y][$x] = 1 / $request[$bobot_prioritas];
                } else {
                    $matriks[$x][$y] = 1 / $request[$bobot_prioritas];
                    $matriks[$y][$x] = $request[$bobot_prioritas];
                }

                RelKriteria::updateOrCreate(
                    ['kriteria1' => $kriterias[$x]->id, 'kriteria2' => $kriterias[$y]->id],
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

            $kriterias[$x]->update(['bobot_prioritas' => $pv[$x]]);
        }

        // cek konsistensi
        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('pages.admin.analisis.kriteria.hasil', compact('matriks', 'jmlmpb', 'matriksb', 'jmlmnk', 'pv', 'eigenvektor', 'consIndex', 'consRatio', 'n', 'kriterias'));
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
