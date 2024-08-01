@extends('layouts.app')

@push('script')
    <script>
        $(document).ready(function() {
            $("#btnUpdateProfile").click(function() {
                $("#updateProfileNama").removeAttr("readonly");
                $("#updateProfileEmail").removeAttr("readonly");
                $("#updateProfileNoHp").removeAttr("readonly");
                $("#btnUpdateProfile").attr('hidden', true);
                $("#btnSubmitProfile").removeAttr('hidden');
                $("#password").removeAttr('hidden');
                $("#password-confirm").removeAttr('hidden');
                $("#img-profile").removeAttr('hidden');
            });
        });
    </script>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10 my-5">
                <div class="card mt-2">
                    <div class="alert alert-info text-center pt-3 pb-2 mb-0">
                        <h4>Detail Profil</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('profile.update', $user_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body text-center">
                            @if ($user->image_path)
                                <img src="/storage/{{ $user->image_path }}" alt="Foto" class="rounded-circle"
                                    style="height: 150px; width: 150px; object-fit: cover">
                            @else
                                <img src="{{ asset('assets/admin/img/user.png') }}" alt="Foto" class="rounded-circle"
                                    style="height: 150px; width: 150px; object-fit: cover">
                            @endif
                            <div class="custom-file mt-3" id="img-profile" hidden>
                                <input type="file" name="image_path" class="custom-file-input border p-2"
                                    id="customFile">
                            </div>
                            <div class="container w-75 mt-3 text-start">
                                <table class="w-100 table-responsive">
                                    <tr>
                                        <th>Nama</th>
                                        <td>
                                            <input id="updateProfileNama" class="form-control mb-2" type="text"
                                                value="{{ old('nama') ?? $user->nama }}" name="nama" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <input id="updateProfileEmail" class="form-control mb-2" type="text"
                                                value="{{ old('email') ?? $user->email }}" name="email" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No Handphone</th>
                                        <td>
                                            <input id="updateProfileNoHp" class="form-control mb-2" type="text"
                                                value="{{ old('no_hp') ?? $user->no_hp }}" name="no_hp" readonly>
                                        </td>
                                    </tr>
                                    <tr id="password" hidden>
                                        <th>
                                            Password
                                        </th>
                                        <td>
                                            <input type="password" name="password" class="form-control mb-2" id="password"
                                                value="" placeholder="Isi Jika Ingin Ganti Password">
                                        </td>
                                    </tr>
                                    <tr id="password-confirm" hidden>
                                        <th>
                                            Ketik Ulang Password
                                        </th>
                                        <td>
                                            <input type="password" name="password_confirmation" class="form-control mb-2"
                                                id="password-confirm" value=""
                                                placeholder="Isi Jika Ingin Ganti Password">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary my-3" id="btnUpdateProfile">
                                Edit Profil
                            </button>
                            <button type="submit" class="btn btn-primary my-3" id="btnSubmitProfile" hidden>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="alert alert-info pb-2">
                <h4>Riwayat Diagnosis ({{ $riwayats->count() }})</h4>
            </div>
            @if ($riwayats->count())
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama Anak</th>
                                <th scope="col" class="text-center">Umur Anak</th>
                                <th scope="col" class="text-center">Instansi</th>
                                <th scope="col" class="text-center">Nilai Hasil</th>
                                <th scope="col" class="text-center">Kriteria</th>
                                <th scope="col" class="text-center">Kategori</th>
                                <th scope="col" class="text-center">Persentase ADHD</th>
                                <th scope="col" class="text-center">Tanggal Tes</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayats as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ ucwords($item->nama_anak) }}</td>
                                    <td class="text-center">{{ $item->umur_anak }}</td>
                                    <td class="text-center">{{ $item->instansi }}</td>
                                    <td class="text-center">{{ number_format($item->nilai_hasil, 3) }}</td>
                                    <td class="text-center">{{ $item->kriteria->nama }}</td>
                                    <td class="text-center">{{ $item->kategori }}</td>
                                    <td class="text-center">{{ number_format($item->persentase_combined, 2) }}%</td>
                                    <td class="text-center">{{ date_format($item->created_at, 'd-m-Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column d-md-block justify-content-center">
                                            <a class="btn btn-primary mb-2"
                                                href="{{ route('hasil-diagnosis', $item->id) }}">
                                                <i class="fas fa-info-circle"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="container mt-5">
                    <div class="my-5">
                        <div class="mt-5">
                            <p class="text-center fs-3">Tidak Ada Riwayat Tes</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
