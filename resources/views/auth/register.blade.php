@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/register.jpg') }}" alt="register" style="width: 80%" class="img-fluid mx-5">
                </div>
                <div class="col-lg-6">
                    <div class="card mb-5 mx-4 rounded shadow">
                        <div class="card-body p-4 text-center">
                            <form action="{{ route('auth.registerStore') }}" method="POST">
                                @if ($errors->any())
                                    <div class="alert alert-danger pb-0">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                <h2>Daftar Sekarang</h2>
                                <p class="text-body-secondary small">
                                    Sudah punya akun? <a href="{{ route('auth.login') }}" class="text-decoration-none"
                                        style="color: #157347"><strong>Masuk</strong></a>
                                </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Nama" name="nama" autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Email" name="email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="No Handphone" name="no_hp">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Password" name="password"
                                        id="password">
                                    <button type="button" id="togglePassword" class="btn btn-outline-info">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Ulangi Password"
                                        name="password_confirmation" id="passwordConfirm">
                                    <button type="button" id="togglePasswordConfirm" class="btn btn-outline-info">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <button class="btn btn-success px-5" type="submit">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
