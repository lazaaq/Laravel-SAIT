<?php

use App\Http\Controllers\BookstoreController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Web\MahasiswaController as WebMahasiswaController;
use App\Http\Controllers\WishlistController;
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

Route::get('mahasiswa', [MahasiswaController::class, 'show_data_to_browser'])->name('mahasiswa.show_data_to_browser');
Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::get('mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

Route::post('mahasiswa/store', [WebMahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('mahasiswa/{id}/update', [WebMahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('mahasiswa/{id}/delete', [WebMahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

Route::prefix('bookstore')->group(function () {
    Route::get('', [BookstoreController::class, 'search'])->name('bookstore.index');
});

Route::resource('/wishlist', WishlistController::class);