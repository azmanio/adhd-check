<?php

use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RandomIndexController;
use App\Http\Controllers\RelGejalaController;
use App\Http\Controllers\RelKriteriaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('pages.home.app');
})->name('home');

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::resource('/profile', ProfileController::class);
        Route::get('/diagnosis/hasil/{riwayat_id}/pdf', [DiagnosisController::class, 'cetakPdf'])->name('cetak-pdf');
    });

Route::prefix('diagnosis')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/form-identitas', [DiagnosisController::class, 'index'])->name('form-identitas');
        Route::post('/form-identitas', [DiagnosisController::class, 'createDiagnosis'])->name('form-identitas.store');
        Route::get('/pilih-gejala', [DiagnosisController::class, 'diagnosis'])->name('diagnosis');
        Route::post('/proses-diagnosis', [DiagnosisController::class, 'prosesDiagnosis'])->name('proses-diagnosis');
        Route::get('/hasil-diagnosis/{riwayat_id}', [DiagnosisController::class, 'hasilDiagnosis'])->name('hasil-diagnosis');
    });

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');

        Route::resource('/user', UserController::class);
        Route::get('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');

        Route::resource('/kriteria', KriteriaController::class);
        Route::get('/kriteria/{kriterium}/delete', [KriteriaController::class, 'destroy'])->name('kriteria.delete');

        Route::resource('/gejala', GejalaController::class);
        Route::get('/gejala/{gejala}/delete', [GejalaController::class, 'destroy'])->name('gejala.delete');

        Route::resource('/kategori', KategoriController::class);
        Route::get('/kategori/{kategori}/delete', [KategoriController::class, 'destroy'])->name('kategori.delete');

        Route::resource('/random-index', RandomIndexController::class);
        Route::get('/random-index/{random_index}/delete', [RandomIndexController::class, 'destroy'])->name('random-index.delete');

        Route::get('/analisis-gejala', [RelGejalaController::class, 'index'])->name('rel-gejala.index');
        Route::post('/analisis-gejala/store', [RelGejalaController::class, 'store'])->name('rel-gejala.store');

        Route::resource('analisis-kriteria', RelKriteriaController::class);

        Route::resource('/riwayat', RiwayatController::class);
        Route::get('/riwayat/{riwayat}/delete', [RiwayatController::class, 'destroy'])->name('riwayat.delete');
    });