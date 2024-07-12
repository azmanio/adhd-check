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
                    Dashboard
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Data User</h1>
            <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="cil-user-plus icon"></i>
                Tambah User
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Foto</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">No Hp</th>
                                <th class="text-center" scope="col">Role</th>
                                <th class="text-center" scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        @if ($item->image_path)
                                            <img src="/storage/{{ $item->image_path }}" alt="Foto" style="height: 50px"
                                                class="rounded-circle">
                                        @else
                                            <img src="{{ asset('assets/img/user.png') }}" alt="Foto"
                                                style="height: 50px" class="rounded-circle">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->nama }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->no_hp }}</td>
                                    <td class="text-center">{{ $item->role }}</td>
                                    <td class="text-center d-flex flex-column d-md-block py-3">
                                        <a class="btn btn-primary mb-1 mb-md-0" href="{{ route('user.edit', $item) }}">
                                            <i class="cil-pen"></i>
                                        </a>
                                        <button class="btn btn-danger"
                                            onclick="delete_confirm('{{ route('user.delete', $item) }}')">
                                            <i class="cil-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
