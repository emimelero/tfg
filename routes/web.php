<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SocioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sportifysolutions', PistaController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/reservas/crear', [ReservaController::class, 'create'])->name('reserva.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/socio/crear', [SocioController::class, 'create'])->name('socio.create');
    Route::post('/socio', [SocioController::class, 'store'])->name('socio.store');
});
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::post('newsignup',[LoginController::class,'newsignup'])->name('newsignup');