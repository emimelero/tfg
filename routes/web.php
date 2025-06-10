<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SocioController;

Route::resource('pistas', PistaController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/reservas/crear/{pista}', [ReservaController::class, 'create'])->name('reserva.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');
    Route::get('/reservas/mis-reservas', [ReservaController::class, 'misReservas'])->name('reserva.show');
    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});
Route::middleware(['auth'])->get('/reservas', [ReservaController::class, 'index'])->name('reserva.index');
Route::middleware(['auth'])->get('/socios', [SocioController::class, 'index'])->name('socio.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/socio/crear', [SocioController::class, 'create'])->name('socio.create');
    Route::get('/socio', [SocioController::class, 'show'])->name('socio.show');
    Route::post('/socio', [SocioController::class, 'store'])->name('socio.store');
    Route::get('/socios/{id}/edit', [SocioController::class, 'edit'])->name('socios.edit');
    Route::put('/socio/{id}', [SocioController::class, 'update'])->name('socio.update');
    Route::delete('/socios/{id}', [SocioController::class, 'destroy'])->name('socio.destroy');
});
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::post('newsignup',[LoginController::class,'newsignup'])->name('newsignup');

Route::view('/politica-cookies', 'legal.politica-cookies')->name('cookies');
Route::view('/aviso-legal', 'legal.aviso-legal')->name('aviso');
Route::view('/sobre-nosotros', 'legal.sobre')->name('sobre');
