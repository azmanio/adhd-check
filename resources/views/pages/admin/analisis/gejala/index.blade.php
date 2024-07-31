@extends('layouts.admin')

@push('script')
    <script>
        function delete_confirm(url) {
            Swal.fire({
                title: "Apa Kamu Yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan lagi",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url
                }
            });
        }
    </script>
@endpush

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Analisis Perbandingan Gejala
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Analisis Perbandingan Gejala</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <p class="card-text">Silahkan pilih kriteria di bawah ini untuk memulai perbandingan gejala yang diinginkan.
                </p>
                <form action="{{ route('rel-gejala.index') }}" method="GET">
                    <div class="mb-3">
                        <select name="kriteria_id" id="kriteria_id" class="form-select" required
                            onchange="this.form.submit()">
                            <option value="" disabled selected>--- Pilih Kriteria ---</option>
                            @foreach ($kriteria as $item)
                                <option value="{{ $item->id }}"
                                    {{ isset($selectedKriteria) && $selectedKriteria == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
        @if ($gejalas->isNotEmpty())
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Perbandingan Gejala</h5>
                        </div>

                        <form action="{{ route('rel-gejala.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kriteria_id" value="{{ $selectedKriteria }}">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">Pilih yang lebih penting</th>
                                            <th class="text-center">Nilai perbandingan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $urut = 0;
                                        @endphp

                                        @for ($x = 0; $x < count($gejalas) - 1; $x++)
                                            @for ($y = $x + 1; $y < count($gejalas); $y++)
                                                @php
                                                    $urut++;
                                                    $nilai =
                                                        \App\Models\RelGejala::where('gejala1', $gejalas[$x]->id)
                                                            ->where('gejala2', $gejalas[$y]->id)
                                                            ->first()->nilai ?? 1;
                                                @endphp

                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="pilih{{ $urut }}" value="1"
                                                                id="pilih{{ $urut }}1" checked>
                                                            <label class="form-check-label" for="pilih{{ $urut }}1">
                                                                {{ $gejalas[$x]->nama }}
                                                                ({{ $gejalas[$x]->kode_gejala }})
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="pilih{{ $urut }}" value="2"
                                                                id="pilih{{ $urut }}2">
                                                            <label class="form-check-label"
                                                                for="pilih{{ $urut }}2">
                                                                {{ $gejalas[$y]->nama }}
                                                                ({{ $gejalas[$y]->kode_gejala }})
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" type="number" min="1"
                                                                max="9" name="bobot{{ $urut }}"
                                                                value="{{ number_format($nilai, 2) }}" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
