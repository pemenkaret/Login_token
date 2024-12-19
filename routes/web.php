<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

//MENGEMBALIKAN VIEW
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route untuk login via API (POST)
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
