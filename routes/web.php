<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/create-user', [App\Http\Controllers\UserController::class, 'create'])->name('create-user');
    Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');
    // untuk pengajuan cuti
    Route::get('admin/cuti', [App\Http\Controllers\CutiController::class, 'index'])->name('admin.cuti');
    // Route::get('admin/tambah-cuti', [App\Http\Controllers\CutiController::class, 'tambahCuti'])->name('admin.tambah-cuti');
    // Route::post('admin/store-cuti', [App\Http\Controllers\CutiController::class, 'store'])->name('admin.store-cuti');
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
});

Route::middleware(['auth', 'checkrole:user'])->group(function () {
    // untuk pengajuan cuti
    Route::get('/cuti', [App\Http\Controllers\CutiController::class, 'index'])->name('cuti');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/tambah-cuti', [App\Http\Controllers\CutiController::class, 'tambahCuti'])->name('tambah-cuti');
Route::post('/store-cuti', [App\Http\Controllers\CutiController::class, 'store'])->name('store-cuti');
