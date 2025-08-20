<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);

Route::get('login', [\App\Http\Controllers\LoginController::class, 'index']);
Route::post('login_action', [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login_action');

Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
Route::resource('rooms', \App\Http\Controllers\RoomController::class);

Route::get('call_name', [\App\Http\Controllers\BelajarController::class, 'getCallName']);

// tambah
Route::get('tambah', [\App\Http\Controllers\BelajarController::class, 'createTambah'])->name('tambah');
Route::post('tambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('store_tambah');

// kurang
Route::get('kurang', [\App\Http\Controllers\BelajarController::class, 'createKurang'])->name('kurang');
Route::post('kurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('store_kurang');

// kali
Route::get('kali', [\App\Http\Controllers\BelajarController::class, 'createKali'])->name('kali');
Route::post('kali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('store_kali');

// bagi
Route::get('bagi', [\App\Http\Controllers\BelajarController::class, 'createBagi'])->name('bagi');
Route::post('bagi', [\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('store_bagi');
