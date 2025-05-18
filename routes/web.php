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
    Route::get('/reservas/crear/{pista}', [ReservaController::class, 'create'])->name('reserva.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');
    Route::get('/reservas/mis-reservas', [ReservaController::class, 'misReservas'])->name('reserva.show');
    Route::get('/reservas/{id}/editar', [ReservaController::class, 'edit'])->name('reserva.edit');
    Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reserva.update');
    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/socio/crear', [SocioController::class, 'create'])->name('socio.create');
    Route::get('/socio', [SocioController::class, 'show'])->name('socio.show');
    Route::post('/socio', [SocioController::class, 'store'])->name('socio.store');
    Route::get('/socio/editar', [SocioController::class, 'edit'])->name('socio.edit');
    Route::put('/socio', [SocioController::class, 'update'])->name('socio.update');
});
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::post('newsignup',[LoginController::class,'newsignup'])->name('newsignup');