<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\UserController;
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
