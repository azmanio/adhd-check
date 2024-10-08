@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Kelola Kategori
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Data Kategori</h1>
            <a href="{{ route('kategori.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2">
                <i class="cil-plus icon"></i>
                Tambah Kategori
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-100" id="dataTable">
                        <thead>
                            <tr class="align-middle">
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Kategori</th>
                                <th class="text-center" scope="col">Keterangan</th>
                                <th class="text-center" scope="col">Range Min</th>
                                <th class="text-center" scope="col">Range Maks</th>
                                <th class="text-center" scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $item->kategori }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td class="text-center">{{ $item->range_min }}</td>
                                    <td class="text-center">{{ $item->range_max }}</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column d-md-block">
                                            <a class="btn btn-primary mb-0 mb-md-2"
                                                href="{{ route('kategori.edit', $item) }}">
                                                <i class="cil-pen"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('kategori.destroy', $item) }}"
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
