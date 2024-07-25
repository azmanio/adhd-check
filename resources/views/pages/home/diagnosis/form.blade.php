@extends('layouts.app')

@section('content')
    <div class="row mt-5 mx-auto">
        <div class="container col-10 col-sm-6 card rounded shadow my-5">
            <div class="card-body p-4">
                <form action="{{ route('form-identitas.store') }}" method="POST">
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
                    <div class="py-3 text-center">
                        <h3>Form Identitas Anak</h3>
                        <p class="text-body-secondary">
                            Lengkapi identitas anak sebelum melakukan diagnosis.
                        </p>
                    </div>
                    <input class="form-control mb-3" type="text" placeholder="Nama Lengkap Anak *" name="nama_anak"
                        required autofocus>
                    <input class="form-control mb-3" type="number" placeholder="Umur Anak *" name="umur_anak" required>
                    <input class="form-control mb-3" type="text" placeholder="Asal Instansi / Umum" name="instansi"
                        id="instansi">

                    <div class="text-center py-3">
                        <a class="btn btn-outline-secondary text-decoration-none" href="{{ route('home') }}">Kembali</a>
                        <button class="btn btn-primary" type="submit">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
