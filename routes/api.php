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

Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index'); // semua mahasiswa
Route::get('mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->name('mahasiswa.show'); // 1 mahasiswa
Route::post('mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); // tambah mahasiswa
Route::put('mahasiswa/{mahasiswa}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // update mahasiswa
Route::delete('mahasiswa/{mahasiswa}/delete', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy'); // hapus mahasiswa
