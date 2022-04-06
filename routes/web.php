<?php

use App\Http\Controllers\BookstoreController;
use App\Http\Controllers\MahasiswaController;
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

Route::prefix('bookstore')->group(function () {
    Route::get('new', [BookstoreController::class, 'new']);
    Route::get('search/{query}/{page}', [BookstoreController::class, 'search']);
    Route::get('books/{isbn13}', [BookstoreController::class, 'books']);
});