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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('user/create-user', [App\Http\Controllers\UserController::class, 'create'])->name('create-user');
    Route::post('user/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('user-store');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// untuk pengajuan cuti
Route::get('/cuti', [App\Http\Controllers\CutiController::class, 'index'])->name('cuti');
Route::get('/tambah-cuti', [App\Http\Controllers\CutiController::class, 'tambahCuti'])->name('tambah-cuti');
