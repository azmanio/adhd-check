<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RandomIndexController;
use App\Http\Controllers\RelGejalaController;
use App\Http\Controllers\RelKriteriaController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\UserController;
use App\Models\RelKriteria;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.app');
})->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::resource('/user', UserController::class);
    Route::get('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');

    Route::resource('/kriteria', KriteriaController::class);
    Route::get('/kriteria/{kriterium}/delete', [KriteriaController::class, 'destroy'])->name('kriteria.delete');

    Route::resource('/gejala', GejalaController::class);
    Route::get('/gejala/{gejala}/delete', [GejalaController::class, 'destroy'])->name('gejala.delete');

    Route::resource('/solusi', SolusiController::class);
    Route::get('/solusi/{solusi}/delete', [SolusiController::class, 'destroy'])->name('solusi.delete');

    Route::resource('/random-index', RandomIndexController::class);
    Route::get('/random-index/{random_index}/delete', [RandomIndexController::class, 'destroy'])->name('random-index.delete');

    Route::get('/analisis-gejala', [RelGejalaController::class, 'index'])->name('rel-gejala.index');
    Route::post('/analisis-gejala/store', [RelGejalaController::class, 'store'])->name('rel-gejala.store');

    Route::resource('analisis-kriteria', RelKriteriaController::class);
});


Route::name('auth.')
    ->group(function () {
        Route::get("/login", [AuthController::class, 'login'])
            ->name('login')->middleware('guest');
        Route::post("/login", [AuthController::class, 'loginStore'])
            ->name('loginStore');

        Route::get("/register", [AuthController::class, 'register'])
            ->name('register')->middleware('guest');
        Route::post("/register", [AuthController::class, 'registerStore'])
            ->name('registerStore');

        Route::get("/logout", [AuthController::class, 'logout'])
            ->name('logout');
    });