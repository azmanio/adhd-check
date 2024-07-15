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
                    Analisis Perbandingan Kriteria
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Analisis Perbandingan Kriteria</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <h5 class="card-title">Matriks Perbandingan Kriteria</h5>
                </div>

                <form action="{{ route('analisis-kriteria.store') }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th colspan="2">Pilih yang lebih penting</th>
                                    <th>Nilai perbandingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $urut = 0;
                                @endphp

                                @for ($x = 0; $x < count($kriterias) - 1; $x++)
                                    @for ($y = $x + 1; $y < count($kriterias); $y++)
                                        @php
                                            $urut++;
                                            $nilai =
                                                \App\Models\RelKriteria::where('kriteria1', $kriterias[$x]->id)
                                                    ->where('kriteria2', $kriterias[$y]->id)
                                                    ->first()->nilai ?? 1;
                                        @endphp

                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="pilih{{ $urut }}" value="1"
                                                        id="pilih{{ $urut }}1" checked>
                                                    <label class="form-check-label" for="pilih{{ $urut }}1">
                                                        {{ $kriterias[$x]->nama }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="pilih{{ $urut }}" value="2"
                                                        id="pilih{{ $urut }}2">
                                                    <label class="form-check-label" for="pilih{{ $urut }}2">
                                                        {{ $kriterias[$y]->nama }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control" type="text"
                                                        name="bobot{{ $urut }}" value="{{ $nilai }}"
                                                        required>
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
@endsection
