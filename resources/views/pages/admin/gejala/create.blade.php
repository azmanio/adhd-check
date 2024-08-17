@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('gejala.index') }}">Kelola Gejala</a>
                </li>
                <li class="breadcrumb-item active">
                    Tambah Gejala
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Gejala</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('gejala.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label for="kriteria_id" class="form-label">Kriteria</label>
                        <select name="kriteria_id" id="kriteria_id" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Kriteria --</option>
                            @foreach ($kriteria as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kode_gejala" class="form-label">Kode Gejala</label>
                        <input type="text" name="kode_gejala" class="form-control" id="kode_gejala" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="gejala" class="form-label">Gejala</label>
                        <input type="text" name="gejala" class="form-control" id="gejala" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
