<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Cuti;
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
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/hapus-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // untuk pengajuan cuti
    Route::get('admin/cuti', [CutiController::class, 'index'])->name('admin.cuti');
    Route::get('admin/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/edit-cuti/{id}', [CutiController::class, 'edit'])->name('cuti.edit');
    Route::get('/hapus-cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.hapus');
});

Route::middleware(['auth', 'checkrole:user'])->group(function () {
    // untuk pengajuan cuti
    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
// Route::get('/tambah-cuti', [CutiController::class, 'tambahCuti'])->name('cuti.tambahCuti');
// Route::post('/store-cuti', [CutiController::class, 'store'])->name('cuti.store');
// Route::get('/update-cuti', [CutiController::class, 'updateCuti'])->name('cuti.update');
Route::resource('cuti', CutiController::class);
