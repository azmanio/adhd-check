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
                    Ubah Kategori
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Kategori</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="kategori"
                                value="{{ old('kategori') ?? $kategori->kategori }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Solusi</label>
                            <input type="text" name="kategori" class="form-control" id="kategori"
                                value="{{ old('kategori') ?? $kategori->kategori }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="bobot_kategori" class="form-label">Solusi</label>
                            <input type="number" step="0.01" name="bobot_kategori" class="form-control"
                                id="bobot_kategori" value="{{ old('bobot_kategori') ?? $kategori->bobot_kategori }}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
