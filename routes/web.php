<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTagihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login/admin', [LoginController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('admin.login.submit');
    Route::get('/login/warga', [LoginController::class, 'showWargaLogin'])->name('warga.login');
    Route::post('/login/warga', [LoginController::class, 'wargaLogin'])->name('warga.login.submit');
    Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('dataTagihan', DataTagihanController::class);
    Route::post('dataTagihan/{id}/pay', [DataTagihanController::class, 'pay'])->name('dataTagihan.pay');
});

