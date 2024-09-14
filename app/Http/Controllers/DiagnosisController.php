<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;
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

            $nilai_pakars[$kriteria][$gejala->id] = $gejala->nilai_pakar;

            $nilai_user[$kriteria][$gejala->id] = $request->input('gejalas')[$gejala->id];

            $total_pakar[$kriteria] += $gejala->nilai_pakar;
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
            $total_sementara = $total_sementaras[$kriteria];
            foreach ($nilai_sementara as $id => $nilai) {
                $PHiE = ($total_sementara != 0) ? $nilai * $nilai_user[$kriteria][$id] / $total_sementara : 0;
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

        return $this->kategoriHasil($request);
    }

    public function kategoriHasil(Request $request)
    {
        $total_nilai_user = 0;
        $nilai_kriteria = [];
        $riwayat_id = $request->input('riwayat_id');
        $diagnosis = Diagnosis::where('riwayat_id', $riwayat_id)->get();

        // Hitung total nilai user dan nilai per kriteria
        foreach ($diagnosis as $item) {
            $total_nilai_user += $item->nilai_user;

            if (!isset($nilai_kriteria[$item->kriteria_id])) {
                $nilai_kriteria[$item->kriteria_id] = 0;
            }
            $nilai_kriteria[$item->kriteria_id] += $item->nilai_hasil;
        }

        $nilai_combined = array_sum($nilai_kriteria);

        arsort($nilai_kriteria);
        $kriteria_dominan_id = key($nilai_kriteria);
        $kriteria_dominan = Kriteria::find($kriteria_dominan_id);
        $kriteria_dominan_nama = $kriteria_dominan->nama;

        $kategoris = Kategori::where('range_min', '<=', $total_nilai_user)
            ->where('range_max', '>=', $total_nilai_user)
            ->first();
        $kategori = $kategoris->kategori;
        $keterangan_kategori = $kategoris->keterangan;

        $total_gejala = Gejala::count();
        $persentase_combined = ($total_nilai_user / $total_gejala) * 100;

        $nilai_hasil_max = max($nilai_kriteria);

        // Simpan nilai kriteria dan deskripsi ke session
        $nilai_akhir_kriteria = [];
        $deskripsi_kriteria = [];

        foreach ($nilai_kriteria as $kriteria_id => $nilai) {
            $kriteria = Kriteria::find($kriteria_id);
            $nilai_akhir_kriteria[$kriteria->nama] = $nilai;
            $deskripsi_kriteria[$kriteria->nama] = $kriteria->deskripsi;
        }

        session()->put('nilai_akhir_kriteria', $nilai_akhir_kriteria);
        session()->put('deskripsi_kriteria', $deskripsi_kriteria);
        session()->put('keterangan_kategori', $keterangan_kategori);
        session()->put('total_nilai_user', $total_nilai_user);

        // Simpan hasil diagnosis ke database
        Riwayat::where('id', $riwayat_id)->update([
            'nilai_hasil' => $nilai_hasil_max,
            'kriteria_dominan' => $kriteria_dominan_nama,
            'nilai_combined' => $nilai_combined,
            'persentase_combined' => $persentase_combined,
            'kategori' => $kategori,
            'kriteria_id' => Kriteria::where('nama', $kriteria_dominan_nama)->value('id'),
            'kategori_id' => $kategoris->id,
        ]);

        // Redirect ke halaman hasil diagnosis
        return redirect()->route('hasil-diagnosis', ['riwayat_id' => $riwayat_id]);
    }

    public function hasilDiagnosis($riwayat_id)
    {
        $riwayat = Riwayat::where('id', $riwayat_id)->firstOrFail();

        // Ambil nilai kriteria dan deskripsi dari session
        $nilai_akhir_kriteria = session()->get('nilai_akhir_kriteria');
        $deskripsi_kriteria = session()->get('deskripsi_kriteria');
        $keterangan_kategori = session()->get('keterangan_kategori');
        $total_nilai_user = session()->get('total_nilai_user');

        // Periksa apakah data diperlukan ada di session, jika tidak hitung ulang
        if (!$nilai_akhir_kriteria || !$deskripsi_kriteria || !$keterangan_kategori) {
            $diagnosis = Diagnosis::where('riwayat_id', $riwayat_id)->get();

            $total_nilai_user = 0;
            $nilai_kriteria = [];

            // Hitung total nilai user dan nilai per kriteria
            foreach ($diagnosis as $item) {
                $total_nilai_user += $item->nilai_user;

                if (!isset($nilai_kriteria[$item->kriteria_id])) {
                    $nilai_kriteria[$item->kriteria_id] = 0;
                }
                $nilai_kriteria[$item->kriteria_id] += $item->nilai_hasil;
            }

            arsort($nilai_kriteria);
            $kriteria_dominan_id = key($nilai_kriteria);
            $kriteria_dominan = Kriteria::find($kriteria_dominan_id);
            $kriteria_dominan_nama = $kriteria_dominan->nama;

            $kategoris = Kategori::where('range_min', '<=', $total_nilai_user)
                ->where('range_max', '>=', $total_nilai_user)
                ->first();
            $kategori = $kategoris->kategori;
            $keterangan_kategori = $kategoris->keterangan;

            $nilai_akhir_kriteria = [];
            $deskripsi_kriteria = [];

            foreach ($nilai_kriteria as $kriteria_id => $nilai) {
                $kriteria = Kriteria::find($kriteria_id);
                $nilai_akhir_kriteria[$kriteria->nama] = $nilai;
                $deskripsi_kriteria[$kriteria->nama] = $kriteria->deskripsi;
            }

            session()->put('nilai_akhir_kriteria', $nilai_akhir_kriteria);
            session()->put('deskripsi_kriteria', $deskripsi_kriteria);
            session()->put('keterangan_kategori', $keterangan_kategori);
            session()->put('total_nilai_user', $total_nilai_user);
        }

        return
            view(
                'pages.home.diagnosis.hasil',
                compact(
                    'riwayat',
                    'nilai_akhir_kriteria',
                    'deskripsi_kriteria',
                    'keterangan_kategori',
                    'total_nilai_user',
                ),
            );
    }

    public function cetakPdf($riwayat_id)
    {
        $riwayat = Riwayat::with('kriteria')->where('id', $riwayat_id)->firstOrFail();

        $nilai_akhir_kriteria = session()->get('nilai_akhir_kriteria');
        $deskripsi_kriteria = session()->get('deskripsi_kriteria');
        $keterangan_kategori = session()->get('keterangan_kategori');
        $total_nilai_user = session()->get('total_nilai_user');

        if (!$nilai_akhir_kriteria || !$deskripsi_kriteria || !$keterangan_kategori) {
            $diagnosis = Diagnosis::where('riwayat_id', $riwayat_id)->get();

            $total_nilai_user = 0;
            $nilai_kriteria = [];

            // Hitung total nilai user dan nilai per kriteria
            foreach ($diagnosis as $item) {
                $total_nilai_user += $item->nilai_user;

                if (!isset($nilai_kriteria[$item->kriteria_id])) {
                    $nilai_kriteria[$item->kriteria_id] = 0;
                }
                $nilai_kriteria[$item->kriteria_id] += $item->nilai_hasil;
            }

            arsort($nilai_kriteria);
            $kriteria_dominan_id = key($nilai_kriteria);
            $kriteria_dominan = Kriteria::find($kriteria_dominan_id);
            $kriteria_dominan_nama = $kriteria_dominan->nama;

            $kategoris = Kategori::where('range_min', '<=', $total_nilai_user)
                ->where('range_max', '>=', $total_nilai_user)
                ->first();
            $kategori = $kategoris->kategori;
            $keterangan_kategori = $kategoris->keterangan;

            $nilai_akhir_kriteria = [];
            $deskripsi_kriteria = [];

            foreach ($nilai_kriteria as $kriteria_id => $nilai) {
                $kriteria = Kriteria::find($kriteria_id);
                $nilai_akhir_kriteria[$kriteria->nama] = $nilai;
                $deskripsi_kriteria[$kriteria->nama] = $kriteria->deskripsi;
            }

            session()->put('nilai_akhir_kriteria', $nilai_akhir_kriteria);
            session()->put('deskripsi_kriteria', $deskripsi_kriteria);
            session()->put('keterangan_kategori', $keterangan_kategori);
            session()->put('total_nilai_user', $total_nilai_user);
        }

        $pdf = PDF::loadView('pages.home.diagnosis.cetak', compact('riwayat', 'nilai_akhir_kriteria', 'deskripsi_kriteria', 'keterangan_kategori', 'total_nilai_user'));

        // Format nama file PDF
        $fileName = 'Hasil_Diagnosis_' . str_replace(' ', '_', $riwayat->nama_anak) . '.pdf';

        return $pdf->download($fileName);
    }

}
