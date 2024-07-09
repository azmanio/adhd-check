@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Foto Profil <small>(optional)</small></label>
                        <div class="input-group">
                            <input type="file" name="image_path" class="form-control" id="inputGroupFile"
                                aria-label="Upload">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="example@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Handphone</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <small id="passwordHelpInline" class="text-muted">
                            minimal 8 karakter
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Ketik Ulang Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="roleUser" value="user"
                                    checked>
                                <label class="form-check-label" for="roleUser">User</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin">
                                <label class="form-check-label" for="roleAdmin">Admin</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
