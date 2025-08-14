<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('login', [LoginController::class, 'ShowLoginForm'])->name('login');

Route::get('register', [RegisterController::class, 'ShowRegistrationForm'])->name('register');
