@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Kelola Random Index
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Data Random Index</h1>
            <a href="{{ route('random-index.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2">
                <i class="cil-plus icon"></i>
                Tambah Random Index
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle w-100" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Jumlah Matriks</th>
                                <th class="text-center" scope="col">Nilai</th>
                                <th class="text-center" scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $item->jumlah_matriks }}</td>
                                    <td class="text-center">{{ $item->nilai }}</td>
                                    <td class="text-center d-flex flex-column d-md-block py-3">
                                        <a class="btn btn-primary mb-1 mb-md-0"
                                            href="{{ route('random-index.edit', $item) }}">
                                            <i class="cil-pen"></i>
                                        </a>
                                        <a class="btn btn-danger" href="{{ route('random-index.destroy', $item) }}"
                                            data-confirm-delete="true">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </a>
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
