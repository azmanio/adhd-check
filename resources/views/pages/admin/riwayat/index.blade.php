@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Kelola Riwayat Diagnosis
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Riwayat Diagnosis</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle w-100" id="dataTable">
                        <thead>
                            <tr class="align-middle">
                                <th class="text-center">No</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Nama Anak</th>
                                <th class="text-center">Umur Anak</th>
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Nilai Hasil</th>
                                <th class="text-center">Kriteria</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Persentase ADHD</th>
                                <th class="text-center">Tanggal Tes</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayats as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ ucwords($item->user->nama) }}</td>
                                    <td class="text-center">{{ ucwords($item->nama_anak) }}</td>
                                    <td class="text-center">{{ $item->umur_anak }}</td>
                                    <td class="text-center">{{ $item->instansi }}</td>
                                    <td class="text-center">{{ number_format($item->nilai_hasil, 3) }}</td>
                                    <td class="text-center">{{ $item->kriteria->nama ?? '-' }}</td>
                                    <td class="text-center">{{ $item->kategori ?? '-' }}</td>
                                    <td class="text-center">{{ number_format($item->persentase_combined, 2) }}%</td>
                                    <td class="text-center">{{ date_format($item->created_at, 'd-m-Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex d-md-block">
                                            @if (isset($item->kriteria))
                                                <a class="btn btn-primary mb-2"
                                                    href="{{ route('hasil-diagnosis', $item->id) }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <a class="btn btn-success mb-2" href="{{ route('cetak-pdf', $item->id) }}">
                                                    <i class="fas fa-print text-white"></i>
                                                </a>
                                            @endif
                                            <a class="btn btn-danger" href="{{ route('riwayat.destroy', $item) }}"
                                                data-confirm-delete="true">
                                                <i class="fas fa-trash-alt text-white"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
