@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('random-index.index') }}">Kelola Random Index</a>
                </li>
                <li class="breadcrumb-item active">
                    Ubah Random Index
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Random Index</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('random-index.update', $randomIndex) }}" method="POST"
                    enctype="multipart/form-data">
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
                            <label for="jumlah_matriks" class="form-label">Jumlah Matriks</label>
                            <input type="number" name="jumlah_matriks" class="form-control" id="jumlah_matriks"
                                value="{{ old('jumlah_matriks') ?? $randomIndex->jumlah_matriks }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="number" step="0.01" name="nilai" class="form-control" id="nilai"
                                value="{{ old('nilai') ?? $randomIndex->nilai }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
