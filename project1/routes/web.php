<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']); // Route for HomeController


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'admin'], function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    // Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
    Route::get('/guru/add', [GuruController::class, 'add']);
    Route::post('/guru/insert', [GuruController::class, 'insert']);
    Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
    Route::get('/guru/delete/{id_guru}', [GuruController::class, 'delete']);

    Route::get('/siswa', [SiswaController::class, 'index']);
});

Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::get('/penjualan/print', [PenjualanController::class, 'print']);
    Route::get('/penjualan/printpdf', [PenjualanController::class, 'printpdf']);
});

Route::group(['middleware' => 'penjualan'], function () {
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('penjualan');
});
