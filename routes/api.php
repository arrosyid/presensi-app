<?php

use App\Http\Controllers\API\PresensiController;
use App\Http\Controllers\API\ApiCutiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
    // untuk presensi
    Route::get('/get-presensi',  [PresensiController::class, 'getPresensis']);
    Route::post('save-presensi', [PresensiController::class, 'savePresensi']);


    // untuk pengajuan cuti
    Route::get('/cuti', [ApiCutiController::class, 'index']);
    Route::post('/pengajuan-cuti', [ApiCutiController::class, 'pengajuanCuti']);
});
