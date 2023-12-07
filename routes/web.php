<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::post('/datatable-paket', [App\Http\Controllers\WelcomeController::class, 'datatablePaket'])->name('datatable-paket');
Route::get('/services-detail', [App\Http\Controllers\WelcomeController::class, 'servicesDetail'])->name('services-detail');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('konsumen', [App\Http\Controllers\KonsumenController::class, 'index'])->name('konsumen.index');

    Route::get('paket', [App\Http\Controllers\PaketController::class, 'index'])->name('paket.index');

    Route::get('transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');

    Route::get('laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
});
