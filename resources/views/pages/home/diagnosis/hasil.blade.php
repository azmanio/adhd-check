@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card mb-4 mt-3 shadow rounded-3">
                                    <div class="card-header text-center bg-info">
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4>Biodata Anak</h4>
                                            <span>Tanggal Tes: {{ date_format($riwayat->created_at, 'd-m-Y H:i') }}</span>
                                        </div>
                                        <p><strong>Nama Anak:</strong> {{ $riwayat->nama_anak }}</p>
                                        <p><strong>Umur Anak:</strong> {{ $riwayat->umur_anak }}</p>
                                        <p><strong>Instansi :</strong> {{ $riwayat->instansi }}</p>
                                        <div class="alert alert-primary text-center pt-3 pb-0 mb-0">
                                            <h5>Hasil Diagnosis Penyakit ADHD yang Telah
                                                Dilakukan:</h5>
                                            <h3>
                                                {{ number_format($riwayat->persentase_combined, 2) }}% ADHD</h3>
                                            <p>Kategori: <strong>{{ $riwayat->kategori }}</strong></p>
                                        </div>
                                        <div class="alert mb-0 pb-0">
                                            <p><Strong>Keterangan:</Strong></p>
                                            <p>{{ $keterangan_kategori }}</p>
                                        </div>
                                        @if ($total_nilai_user > 2)
                                            <h5 class="text-center mb-3">Nilai Akhir Kriteria</h5>
                                            <div class="d-flex gap-4 justify-content-center">
                                                @if ($nilai_akhir_kriteria)
                                                    @foreach ($nilai_akhir_kriteria as $kriteria => $nilai)
                                                        <div class="card text-center alert-info p-3 pb-0">
                                                            <h6>{{ $kriteria }}</h6>
                                                            <p>Nilai Akhir: <strong>{{ number_format($nilai, 3) }}</strong>
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>Tidak ada detail nilai untuk kriteria.</p>
                                                @endif
                                            </div><br>
                                            <div class="card">
                                                <div class="card-header text-center alert my-0">
                                                    Kriteria dari Gejala ADHD Terbesarmu adalah :
                                                    <strong>{{ $riwayat->kriteria_dominan }}</strong>
                                                </div>
                                                <div class="card-body">
                                                    <p><strong>Deskripsi:</strong></p>
                                                    <p>{{ $riwayat->kriteria->deskripsi }}</p>
                                                    <p><strong>Solusi:</strong></p>
                                                    <p>{{ $riwayat->kriteria->solusi }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-flex gap-2 mx-auto mb-3">
                                        <a href="{{ route('home') }}"
                                            class="btn btn-secondary text-decoration-none">Home</a>
                                        <a href="{{ route('cetak-pdf', $riwayat->id) }}"
                                            class="btn btn-success text-decoration-none">Cetak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
