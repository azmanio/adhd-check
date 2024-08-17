@extends('layouts.admin')

@section('breadcrumb')
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Kelola Data User
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
            <a href="{{ route('user.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2">
                <i class="cil-user-plus icon"></i>
                Tambah User
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle w-100" id="dataTable">
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
                                            <img src="{{ asset('assets/admin/img/user.png') }}" alt="Foto"
                                                style="height: 50px" class="rounded-circle">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ ucwords($item->nama) }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->no_hp }}</td>
                                    <td class="text-center">{{ ucwords($item->role) }}</td>
                                    <td class="text-center d-flex flex-column d-md-block py-3">
                                        <a class="btn btn-primary mb-1 mb-md-0" href="{{ route('user.edit', $item) }}">
                                            <i class="cil-pen"></i>
                                        </a>
                                        <a class="btn btn-danger" href="{{ route('user.destroy', $item) }}"
                                            data-confirm-delete="true">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </a>
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
