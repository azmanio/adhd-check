@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('kategori.index') }}">Kelola Kategori</a>
                </li>
                <li class="breadcrumb-item active">
                    Tambah Kategori
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="range_min" class="form-label">Range Minimal</label>
                        <input type="number" class="form-control" id="range_min" name="range_min" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label for="range_max" class="form-label">Range Maximal</label>
                        <input type="number" class="form-control" step="0.1" id="range_max" name="range_max" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
