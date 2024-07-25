@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="card rounded shadow">
                        <div class="card-body p-4 text-center">
                            <form action="{{ route('auth.loginStore') }}" method="POST">
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
                                <h2>Login</h2>
                                <p class="text-body-secondary">
                                    Sign In to your account
                                </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Email" name="email"
                                        value="{{ old('email') }}">
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
                                <button class="btn btn-primary px-5" type="submit">Login</button>
                                <hr>
                                <p>
                                    <small>
                                        Belum memiliki akun?
                                        <a href="{{ route('auth.register') }}" class="text-decoration-none"
                                            style="color: blue;">Daftar
                                            Sekarang!</a>
                                    </small>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="login" style="width: 80%" class="img-fluid mx-5">
                </div>
            </div>
        </div>
    </div>
@endsection
