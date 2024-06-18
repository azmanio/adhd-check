<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.admin.index');
})->name('dashboard');

Route::resource('/user', UserController::class);
Route::get('/user/{user}/delete', [UserController::class, 'destroy'])
    ->name('user.delete');