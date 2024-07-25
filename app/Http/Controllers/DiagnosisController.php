<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.home.diagnosis.form');
    }

    public function createDiagnosis(Request $request)
    {
        $user_id = Auth::id();

        $data = [
            'nama_anak' => $request->nama_anak,
            'umur_anak' => $request->umur_anak,
            'instansi' => $request->instansi ?? 'Umum',
            'user_id' => $user_id,
        ];

        $riwayat = Riwayat::create($data);
        session()->put('riwayat_id', $riwayat->id);
        return redirect()->route('diagnosis');
    }

    public function diagnosis()
    {
        $riwayat_id = session()->get('riwayat_id');

        $data = [
            'gejalas' => Gejala::with('kriteria')->get(),
            'riwayat' => Riwayat::find($riwayat_id),
        ];
        return view('pages.home.diagnosis.diagnosis', $data);
    }

    public function prosesDiagnosis(Request $request)
    {
        $riwayat_id = $request->input('riwayat_id');
        $gejalas = $request->input('gejalas');

        foreach ($gejalas as $gejala_id => $nilai_user) {
            $gejala = Gejala::find($gejala_id);
            $data = [
                'riwayat_id' => $riwayat_id,
                'kriteria_id' => $gejala->kriteria_id,
                'gejala_id' => $gejala_id,
                'nilai_user' => $nilai_user,
            ];
            Diagnosis::create($data);
        }

        // Inisialisasi variabel untuk perhitungan Bayes berdasarkan kriteria
        $nilai_pakars = [];
        $nilai_user = [];
        $nilai_semesta = [];
        $total_pakar = [];
        $total_sementaras = [];

        $gejalas = Gejala::with('kriteria')->get();

        // Hitung nilai pakar dan user untuk setiap kriteria
        foreach ($gejalas as $gejala) {
            $kriteria = $gejala->kriteria->nama;
            if (!isset($nilai_pakars[$kriteria])) {
                $nilai_pakars[$kriteria] = [];
                $nilai_user[$kriteria] = [];
                $nilai_semesta[$kriteria] = [];
                $total_pakar[$kriteria] = 0;
            }

            $nilai_pakars[$kriteria][$gejala->id] = $gejala->bobot_prioritas;

            $nilai_user[$kriteria][$gejala->id] = $request->input('gejalas')[$gejala->id];

            $total_pakar[$kriteria] += $gejala->bobot_prioritas;
        }

        // Hitung nilai semesta P(Hi) dan ΣHi P(E|Hi) * P(Hi) untuk setiap kriteria
        foreach ($nilai_pakars as $kriteria => $nilai_pakar) {
            $total_sementara = 0;
            foreach ($nilai_pakar as $id => $nilai) {
                $nilai_semesta[$kriteria][$id] = $nilai / $total_pakar[$kriteria];
                $total_sementara += $nilai_semesta[$kriteria][$id] * $nilai_user[$kriteria][$id];
            }
            $total_sementaras[$kriteria] = $total_sementara;
        }

        // Hitung P(Hi|E) dan hasil diagnosis untuk setiap kriteria
        $hasil_diagnosis = [];
        foreach ($nilai_semesta as $kriteria => $nilai_sementara) {
            foreach ($nilai_sementara as $id => $nilai) {
                $PHiE = ($total_sementaras[$kriteria] != 0) ? $nilai / $total_sementaras[$kriteria] : 0;
                $hasil_diagnosis[$kriteria][$id] = $PHiE * $nilai_pakars[$kriteria][$id];
            }
        }

        // Simpan hasil diagnosis
        foreach ($hasil_diagnosis as $kriteria => $hasil) {
            foreach ($hasil as $gejala_id => $nilai_hasil) {
                Diagnosis::where('riwayat_id', $riwayat_id)
                    ->where('gejala_id', $gejala_id)
                    ->update([
                        'nilai_hasil' => $nilai_hasil,
                    ]);
            }
        }

        // Simpan total_pakar dan total_sementara ke session untuk digunakan di view
        session()->put('total_pakar', $total_pakar);
        session()->put('total_sementaras', $total_sementaras);

        return $this->kategoriHasil($request);
    }

    public function kategoriHasil(Request $request)
    {
        $nilai_inattention = 0;
        $nilai_hyperactive = 0;

        $diagnosis = Diagnosis::where('riwayat_id', $request->input('riwayat_id'))->get();

        foreach ($diagnosis as $item) {
            $gejala = Gejala::with('kriteria')->find($item->gejala_id);

            if ($gejala->kriteria->kode_kriteria == 'AD') { // Kriteria Inattention
                $nilai_inattention += $item->nilai_user;
            } elseif ($gejala->kriteria->kode_kriteria == 'HD') { // Kriteria Hyperactive-Impulsive
                $nilai_hyperactive += $item->nilai_user;
            }
        }

        // Tentukan kategori inattention berdasarkan tabel kategori
        $kategori_inattention = $this->getKategori($nilai_inattention, 'AD');

        // Tentukan kategori hyperactive-impulsive berdasarkan tabel kategori
        $kategori_hyperactive = $this->getKategori($nilai_hyperactive, 'HD');

        // Hitung nilai combined
        $nilai_combined = $nilai_inattention + $nilai_hyperactive;

        // Tentukan kategori combined berdasarkan tabel kategori
        $kategori_combined = $this->getKategori($nilai_combined, 'ADHD');

        // Tentukan kriteria dominan
        $kriteria_dominan = $this->getKriteriaDominan($nilai_inattention, $nilai_hyperactive);

        // Hitung persentase combined
        $total_gejala = Gejala::count(); // Total gejala dari database
        $persentase_combined = ($nilai_combined / $total_gejala) * 100;

        // Simpan hasil diagnosis ke database
        Riwayat::where('id', $request->input('riwayat_id'))->update([
            'kategori_inattention' => $kategori_inattention,
            'kategori_hyperactive' => $kategori_hyperactive,
            'kategori_combined' => $kategori_combined,
            'kriteria_dominan' => $kriteria_dominan,
            'persentase_combined' => $persentase_combined,
            'nilai_hasil' => max($nilai_inattention, $nilai_hyperactive),
        ]);

        // Redirect ke halaman hasil diagnosis
        return redirect()->route('hasil-diagnosis');
    }

    private function getKategori($nilai, $kode_kriteria)
    {
        $kriteria_id = Kriteria::where('kode_kriteria', $kode_kriteria)->value('id');
        $kategori = Kategori::where('kriteria_id', $kriteria_id)
            ->where('range_min', '<=', $nilai)
            ->where('range_max', '>=', $nilai)
            ->first();
        return $kategori ? $kategori->kategori : 'Tidak Diketahui';
    }

    private function getKriteriaDominan($nilai_inattention, $nilai_hyperactive)
    {
        $kriteria_inattention = Kriteria::where('kode_kriteria', 'AD')->first();
        $kriteria_hyperactive = Kriteria::where('kode_kriteria', 'HD')->first();

        if ($nilai_inattention > $nilai_hyperactive) {
            return $kriteria_inattention->nama ?? 'Tidak Diketahui';
        } elseif ($nilai_hyperactive > $nilai_inattention) {
            return $kriteria_hyperactive->nama ?? 'Tidak Diketahui';
        } else {
            return 'Seimbang';
        }
    }
}