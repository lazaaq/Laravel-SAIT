<?php

use App\Http\Controllers\MahasiswaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mahasiswa', [MahasiswaController::class, 'index']); // semua mahasiswa
Route::get('mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show']); // 1 mahasiswa
Route::post('mahasiswa', [MahasiswaController::class, 'store']); // tambah mahasiswa
Route::put('mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update']); // update mahasiswa
Route::delete('mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy']); // hapus mahasiswa
