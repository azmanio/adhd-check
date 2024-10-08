@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center mt-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/register.jpg') }}" alt="register" style="width: 80%" class="img-fluid mx-5">
                </div>
                <div class="col-lg-6">
                    <div class="card rounded shadow">
                        <div class="card-header bg-primary"></div>
                        <div class="card-body p-4 mx-4 text-center">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <h2>Daftar Sekarang</h2>
                                <p class="text-body-secondary small">
                                    Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none"
                                        style="color: #157347"><strong>Masuk</strong></a>
                                </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                        placeholder="Nama" name="nama" required autocomplete="nama" autofocus
                                        value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        placeholder="Email" name="email" required autocomplete="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input class="form-control @error('no_hp') is-invalid @enderror" type="text"
                                        placeholder="No Handphone" name="no_hp" required autocomplete="no_hp"
                                        value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        placeholder="Password" name="password" id="password" required
                                        autocomplete="new-password">
                                    <button type="button" id="togglePassword" class="btn btn-outline-info">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Ulangi Password"
                                        name="password_confirmation" id="passwordConfirm" required
                                        autocomplete="new-password">
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
