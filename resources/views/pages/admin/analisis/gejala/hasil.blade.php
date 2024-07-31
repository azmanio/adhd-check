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
                <li class="breadcrumb-item">
                    <a href="{{ route('rel-gejala.index') }}">Analisis Perbandingan Gejala</a>
                </li>
                <li class="breadcrumb-item active">
                    Hasil Analisis Perbandingan Gejala
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <h5 class="card-title">Matriks Perbandingan Gejala</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Gejala</th>
                                @foreach ($gejalas as $gejala)
                                    <th>{{ $gejala->kode_gejala }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @for ($x = 0; $x < $n; $x++)
                                <tr>
                                    <td>{{ $gejalas[$x]->kode_gejala }}</td>
                                    @for ($y = 0; $y < $n; $y++)
                                        <td>{{ number_format($matriks[$x][$y], 3) }}</td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Jumlah</th>
                                @for ($i = 0; $i < $n; $i++)
                                    <th>{{ number_format($jmlmpb[$i], 3) }}</th>
                                @endfor
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <h5 class="card-title">Matriks Nilai Eigen</h5>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Gejala</th>
                                @foreach ($gejalas as $gejala)
                                    <th>{{ $gejala->kode_gejala }}</th>
                                @endforeach
                                <th>Jumlah</th>
                                <th>Priority Vector</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($x = 0; $x < $n; $x++)
                                <tr>
                                    <td>{{ $gejalas[$x]->kode_gejala }}</td>
                                    @for ($y = 0; $y < $n; $y++)
                                        <td>{{ number_format($matriksb[$x][$y], 3) }}</td>
                                    @endfor
                                    <td>{{ number_format($jmlmnk[$x], 3) }}</td>
                                    <td>{{ number_format($pv[$x], 3) }}</td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Principe Eigen Vector (λ maks)</th>
                                <th>{{ number_format($eigenvektor, 3) }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Consistency Index</th>
                                <th>{{ number_format($consIndex, 3) }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Consistency Ratio</th>
                                <th>{{ number_format($consRatio, 3) }} </th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Persentase</th>
                                <th>{{ number_format($consRatio * 100, 3) }} %</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @if ($consRatio > 0.1)
                    <div class="alert alert-danger mt-4" role="alert">
                        <h5 class="alert-heading">Nilai Consistency Ratio melebihi 10% !!!</h5>
                        <p>Mohon input kembali tabel perbandingan...</p>
                    </div>
                    <a href='javascript:history.back()' class="btn btn-primary">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>
                @else
                    <a href="{{ route('rel-gejala.index') }}" class="btn btn-primary mt-4" style="float: right;">
                        Lanjut <i class="bx bx-arrow-right"></i>
                    </a>
                @endif

            </div>
        </div>
    </div>
@endsection
