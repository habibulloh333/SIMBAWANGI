<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Tampilkan form login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Proses login
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Proses logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');