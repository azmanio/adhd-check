@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('kriteria.index') }}">Kelola Kriteria</a>
                </li>
                <li class="breadcrumb-item active">
                    Ubah Kriteria
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Kriteria</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('kriteria.update', $kriterium) }}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                            <input type="text" name="kode_kriteria" class="form-control" id="kode_kriteria"
                                value="{{ old('kode_kriteria') ?? $kriterium->kode_kriteria }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="{{ old('nama') ?? $kriterium->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" style="min-height: 100px" required>{{ old('deskripsi') ?? $kriterium->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="solusi" class="form-label">Solusi</label>
                            <textarea name="solusi" id="solusi" class="form-control" style="min-height: 100px" required>{{ old('solusi') ?? $kriterium->solusi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
