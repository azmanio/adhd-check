@extends('layouts.app')

@section('content')
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-md-12 text-center mt-5 mb-5">
                <h4 class="mt-3">Silakan Pilih Gejala Di Bawah Ini Untuk Melakukan Diagnosa</h4>
            </div>
            <div class="col-md-12">
                <form id="diagnosis-form" action="{{ route('proses-diagnosis') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="riwayat_id" value="{{ $riwayat->id }}">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        {{-- @php
                            $nomor_pertanyaan = ($gejalas->currentPage() - 1) * $gejalas->perPage();
                        @endphp --}}
                        @foreach ($gejalas as $index => $gejala)
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <strong>{{ $index + 1 }}. {{ $gejala->gejala }}</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="0.2{{ $gejala->id }}"
                                                name="gejalas[{{ $gejala->id }}]" value="0.2" required>
                                            <label class="form-check-label" for="0.2{{ $gejala->id }}">
                                                Tidak Pernah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="0.4{{ $gejala->id }}"
                                                name="gejalas[{{ $gejala->id }}]" value="0.4" required>
                                            <label class="form-check-label" for="0.4{{ $gejala->id }}">
                                                Sesekali terjadi dalam 6 bulan terakhir
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="0.6{{ $gejala->id }}"
                                                name="gejalas[{{ $gejala->id }}]" value="0.6" required>
                                            <label class="form-check-label" for="0.6{{ $gejala->id }}">
                                                Mungkin sering terjadi dalam 6 bulan terakhir
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="0.8{{ $gejala->id }}"
                                                name="gejalas[{{ $gejala->id }}]" value="0.8" required>
                                            <label class="form-check-label" for="0.8{{ $gejala->id }}">
                                                Hampir sering terjadi setiap hari selama 6 bulan terakhir
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="1.0{{ $gejala->id }}"
                                                name="gejalas[{{ $gejala->id }}]" value="1.0" required>
                                            <label class="form-check-label" for="1.0{{ $gejala->id }}">
                                                Sering terjadi dalam sehari minimal 5 kali selama 6 bulan terakhir
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-4 mb-3">
                        <button type="submit" id="submit-button" class="btn btn-primary">Diagnosa</button>
                    </div>

                    {{-- @if ($gejalas->currentPage() === $gejalas->lastPage())
                        <div class="text-center mt-4 mb-3">
                            <button type="submit" id="submit-button" class="btn btn-primary">Diagnosa</button>
                        </div>
                    @endif

                    <div class="mt-3 d-flex justify-content-center">
                        {{ $gejalas->links() }}
                    </div> --}}
                </form>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('diagnosis-form');
            const submitButton = document.getElementById('submit-button');

            form.addEventListener('submit', function(event) {
                let allAnswered = true;

                @foreach ($gejalas as $index => $gejala)
                    const radios = document.getElementsByName('gejalas[{{ $gejala->id }}]');
                    let answered = false;
                    for (let radio of radios) {
                        if (radio.checked) {
                            answered = true;
                            break;
                        }
                    }
                    if (!answered) {
                        allAnswered = false;
                        break;
                    }
                @endforeach

                if (!allAnswered) {
                    event.preventDefault();
                    alert('Harap menjawab semua pertanyaan sebelum mengirim.');
                }
            });
        });
    </script>
@endpush
