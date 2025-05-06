<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sportifysolutions', PistaController::class);
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::post('newsignup',[LoginController::class,'newsignup'])->name('newsignup');