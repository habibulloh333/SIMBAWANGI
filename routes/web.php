<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    ItemController,
    StockLogController,
    KategoriBarangController
};


Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});


Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Users (Admin)
    Route::get('/users', [UserController::class, 'index'])
        ->middleware('role:admin')
        ->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->middleware('role:admin')
        ->name('users.create');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->middleware('role:admin')
        ->name('users.edit');

    Route::put('/users/{user}/update', [UserController::class, 'update'])
        ->middleware('role:admin')
        ->name('users.update');

    Route::post('/users', [UserController::class, 'store'])
        ->middleware('role:admin')
        ->name('users.store');


    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('users.destroy');

    // Items (Admin & Petugas Gudang)
    Route::get('/items', [ItemController::class, 'index'])
        ->middleware('role:admin,petugas_gudang')
        ->name('items.index');

    Route::get('/items/create', [ItemController::class, 'create'])
        ->middleware('role:admin,petugas_gudang')
        ->name('items.create');

    Route::post('/items/{item}/stock-in', [StockLogController::class, 'stockIn'])
        ->middleware('role:admin,petugas_gudang')
        ->name('items.stock.in');

    Route::post('/items/{item}/stock-out', [StockLogController::class, 'stockOut'])
        ->middleware('role:admin,petugas_gudang')
        ->name('items.stock.out');

    // EDIT
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])
        ->name('items.edit');

    // UPDATE (wajib untuk form edit)
    Route::put('/items/{item}', [ItemController::class, 'update'])
        ->name('items.update');

    Route::get('/items/history', [ItemController::class, 'historyAll'])
        ->name('items.history.all');

    Route::get('/items/{item}', [ItemController::class, 'show'])
        ->name('items.show');


    Route::get('/kategori-barang', [KategoriBarangController::class, 'index'])
        ->middleware('role:admin,petugas_gudang')
        ->name('kategori-barang.index');

    Route::post('/kategori-barang', [KategoriBarangController::class, 'store'])
        ->middleware('role:admin,petugas_gudang')
        ->name('kategori-barang.store');

    Route::get('/kategori-barang/create', [kategoriBarangController::class, 'create'])
        ->middleware('role:admin,petugas_gudang')
        ->name('kategori-barang.create');

    Route::get('/kategori-barang/{kategoriBarang}/edit', [KategoriBarangController::class, 'edit'])
        ->name('kategori-barang.edit');

     Route::delete('/kategori-barang/{kategoriBarang}/destroy', [KategoriBarangController::class, 'destroy'])
        ->middleware('role:admin,petugas_gudang')
        ->name('kategori-barang.destroy');

    Route::put('/kategori-barang/{kategoriBarang}', [KategoriBarangController::class, 'update'])
        ->name('kategori-barang.update');


    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    // Reports (All Roles)
    Route::get('/reports', [ItemController::class, 'report'])
        ->name('reports.index');
});

require __DIR__ . '/auth.php';
