@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Kelola Kriteria
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Data Kriteria</h1>
            <a href="{{ route('kriteria.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2">
                <i class="cil-plus icon"></i>
                Tambah Kriteria
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-100" id="dataTable">
                        <thead>
                            <tr class="align-middle">
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Kode Kriteria</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Deskripsi</th>
                                <th class="text-center" scope="col">Solusi</th>
                                <th class="text-center" scope="col">Bobot Prioritas</th>
                                <th class="text-center" scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $item->kode_kriteria }}</td>
                                    <td class="text-center">{{ $item->nama }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->solusi }}</td>
                                    <td class="text-center">{{ number_format($item->bobot_prioritas, 3) }}</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column d-md-block justify-content-center">
                                            <a class="btn btn-primary mb-2" href="{{ route('kriteria.edit', $item) }}">
                                                <i class="cil-pen"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('kriteria.destroy', $item) }}"
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
