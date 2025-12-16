<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/login', [LoginController::class, 'create'])->middleware(['guest'])->name('login.');
Route::post('/login', [LoginController::class, 'store'])->middleware(['guest'])->name('login');
Route::post('/logout', LogoutController::class)->middleware(['auth'])->name('logout');

Route::resource('/events', EventController::class)->middleware(['auth']);
Route::resource('/users', UserController::class)->middleware(['auth'])->only(['index', 'show']);

Route::get('/tinker', function () {
    dd('nothing to see here');
});
