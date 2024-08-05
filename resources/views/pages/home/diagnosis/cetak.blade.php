<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Hasil Diagnosa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-size: 12px;
        }

        .header h3,
        .header h4 {
            margin: 5px 0;
        }

        .header p {
            margin: 2px 0;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid black !important;
        }

        .section-header {
            font-weight: bold;
        }

        .section {
            margin-bottom: 10px;
        }

        .text-end-center {
            text-align: center;
            float: right;
            width: 250px;
        }
    </style>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>



</head>

<body class="border p-3">
    <div class="copy-right">
        <p class="text-start" style="font-size: 10px">
            <strong>ADHDCheck</strong><br>
            Sistem Pakar Diagnosis Penyakit ADHD<br>
            Developed By Azis Rahman Prasetio<br>
        </p>
    </div>

    <div class="kop">
        <div class="header text-center mb-3">
            <h2>HASIL DIAGNOSIS PENYAKIT ADHD</h2>
        </div>
    </div>

    <div class="section mb-4">
        <h6 class="section-header mb-2">Biodata Anak</h6>
        <table>
            <tr>
                <th width="150px">Nama</th>
                <td>: {{ ucwords($riwayat->nama_anak) }}</td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>: {{ $riwayat->umur_anak }}</td>
            </tr>
            <tr>
                <th>Instansi</th>
                <td>: {{ ucwords($riwayat->instansi) }}</td>
            </tr>
            <tr>
                <th>Tanggal Tes</th>
                <td>: {{ date_format($riwayat->created_at, 'd-m-Y H:i') }}</td>
            </tr>

        </table>
    </div>

    <div class="section">
        <div class="alert alert-primary text-center pt-2 pb-0 mb-0" style="color: black">
            <p class="mb-1">Berdasarkan Diagnosis yang Telah Dilakukan, Anak Anda Kemungkinan Mengalami:</p>
            <h1>
                {{ number_format($riwayat->persentase_combined, 2) }}% ADHD</h1>
            <h3>Kategori: <strong>{{ $riwayat->kategori }}</strong></h3>
        </div>
        <div class="my-3">
            <p><Strong>Keterangan:</Strong></p>
            {{ $keterangan_kategori }}
        </div>
        @if ($total_nilai_user > 2)
            <h6 class="section-header mb-2">Nilai Akhir Kriteria</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach ($nilai_akhir_kriteria as $kriteria => $nilai)
                            <th class="text-center">{{ $kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($nilai_akhir_kriteria as $kriteria => $nilai)
                            <td class="text-center">{{ number_format($nilai, 3) }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <div class="alert alert-info text-center mt-3">
                Kriteria dari Gejala ADHD Terbesarmu adalah :
                <strong>{{ $riwayat->kriteria_dominan }} (Nilai:
                    {{ number_format($riwayat->nilai_hasil, 3) }})</strong>
            </div>
            <div class="mt-0">
                <strong>Deskripsi:</strong> {{ $riwayat->kriteria->deskripsi }}<br><br>
                <strong>Solusi:</strong> {{ $riwayat->kriteria->solusi }}
            </div>
        @endif
    </div>

    <div class="section text-end-center mt-3">
        <p class="m-0 p-0">Instrumen dan konten telah divalidasi oleh</p>
        <p class="mb-6"><b>Psikolog Pemeriksa,</b></p>
        <br>
        <br>
        <p class="m-0 p-0"><b>Muhammad Azka Maulana, M. Psi, Psikolog</b></p>
        <p class="m-0 p-0">SIPPK: 503/011-Dinkes/SIPPK/XII/2021</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
