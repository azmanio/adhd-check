@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="card rounded shadow text-center">
                        <div class="card-header alert alert-primary">{{ __('Reset Password') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('assets/img/forgot-password.png') }}" alt="forgot password" style="width: 80%"
                        class="img-fluid mx-5">
                </div>
            </div>
        </div>
    </div>
@endsection
