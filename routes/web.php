<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
})->name('home');

// ログイン
Route::get('/login', [LoginController::class, 'ShowLoginForm'])->name('login');

// アカウント作成
Route::get('/register', [RegisterController::class, 'ShowRegistrationForm'])->name('register.form');
Route::post('/register/confirm', [RegisterController::class, 'confirm'])->name('register.confirm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/verify/{token}', [RegisterController::class, 'verify'])->name('verify.email');

