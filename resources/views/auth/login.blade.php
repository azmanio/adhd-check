@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="card rounded shadow">
                        <div class="card-header bg-primary"></div>
                        <div class="card-body p-4 mx-4 text-center">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2>Login</h2>
                                <p class="text-body-secondary">
                                    Sign In to your account
                                </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        placeholder="Email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        placeholder="Password" name="password" id="password" required
                                        autocomplete="password">
                                    <button type="button" id="togglePassword" class="btn btn-outline-info">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-end mb-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            <small>{{ __('Forgot Your Password?') }}</small>
                                        </a>
                                    @endif
                                </div>
                                <button class="btn btn-primary px-5" type="submit">Login</button>
                                <hr>
                                <p class="mb-0">
                                    <small>
                                        Belum memiliki akun?
                                        <a href="{{ route('register') }}" class="text-decoration-none"
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
