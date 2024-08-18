@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row align-items-center mt-5">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="card rounded shadow text-center">
                        <div class="card-header alert alert-primary">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body pt-0">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}<br><br>
                            {{ __('If you did not receive the email') }} <br>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('assets/img/verify.png') }}" alt="verify" style="width: 80%"
                        class="img-fluid mx-5">
                </div>
            </div>
        </div>
    </div>
@endsection
