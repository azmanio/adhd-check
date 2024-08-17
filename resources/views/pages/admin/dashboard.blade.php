@extends('layouts.admin')

@section('content')
    <div class="container-lg px-4">
        <div class="mb-4">
            <h2 class="text-gray-800">Dashboard</h2>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-6">
                <div class="card border-0 shadow">
                    <a href="{{ route('user.index') }}"
                        class="card-body d-flex justify-content-between align-items-center text-decoration-none">
                        <div>
                            <h5>Users</h5>
                            <h1><strong>{{ App\Models\User::count() }}</strong></h1>
                        </div>
                        <i class="fas fa-users fa-3x mx-3" style="color:lightgray"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow">
                    <a href="{{ route('kriteria.index') }}"
                        class="card-body d-flex justify-content-between align-items-center text-decoration-none">
                        <div>
                            <h5>Kriteria</h5>
                            <h1><strong>{{ App\Models\Kriteria::count() }}</strong></h1>
                        </div>
                        <i class="fas fa-list-ul fa-3x mx-3" style="color:lightgray"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow">
                    <a href="{{ route('gejala.index') }}"
                        class="card-body d-flex justify-content-between align-items-center text-decoration-none">
                        <div>
                            <h5>Gejala</h5>
                            <h1><strong>{{ App\Models\Gejala::count() }}</strong></h1>
                        </div>
                        <i class="fas fa-notes-medical fa-3x mx-3" style="color:lightgray"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-12">
                <div class="card border-0 shadow">
                    <a href="{{ route('riwayat.index') }}"
                        class="card-body d-flex justify-content-between align-items-center text-decoration-none">
                        <div>
                            <h5>Diagnosis</h5>
                            <h1><strong>{{ App\Models\Riwayat::count() }}</strong></h1>
                        </div>
                        <i class="fas fa-stethoscope fa-3x mx-3" style="color:lightgray"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="card border-0 shadow">
                    <a href="{{ route('random-index.index') }}"
                        class="card-body d-flex justify-content-between align-items-center text-decoration-none">
                        <div>
                            <h5>Random Index</h5>
                            <h1><strong>{{ App\Models\RandomIndex::count() }}</strong></h1>
                        </div>
                        <i class="fas fa-sliders-h fa-3x mx-3" style="color:lightgray"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="card border-0 shadow">
                    <a href="{{ route('kategori.index') }}"
                        class="card-body d-flex justify-content-between align-items-center text-decoration-none">
                        <div>
                            <h5>Kategori</h5>
                            <h1><strong>{{ App\Models\Kategori::count() }}</strong></h1>
                        </div>
                        <i class="fas fa-list-ol fa-3x mx-3" style="color:lightgray"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
