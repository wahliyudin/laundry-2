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
Route::get('/check-laundry', [App\Http\Controllers\WelcomeController::class, 'checkLaundry'])->name('check-laundry');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('konsumen', [App\Http\Controllers\KonsumenController::class, 'index'])->name('konsumen.index');
    Route::post('konsumen/datatable', [App\Http\Controllers\KonsumenController::class, 'datatable'])->name('konsumen.datatable');
    Route::delete('konsumen/{konsumen}/destroy', [App\Http\Controllers\KonsumenController::class, 'destroy'])->name('konsumen.destroy');
    Route::post('konsumen/{konsumen}/edit', [App\Http\Controllers\KonsumenController::class, 'edit'])->name('konsumen.edit');
    Route::get('konsumen/next-kode', [App\Http\Controllers\KonsumenController::class, 'nextKode'])->name('konsumen.next-kode');
    Route::post('konsumen/store', [App\Http\Controllers\KonsumenController::class, 'store'])->name('konsumen.store');

    Route::get('paket', [App\Http\Controllers\PaketController::class, 'index'])->name('paket.index');
    Route::post('paket/datatable', [App\Http\Controllers\PaketController::class, 'datatable'])->name('paket.datatable');
    Route::delete('paket/{paket}/destroy', [App\Http\Controllers\PaketController::class, 'destroy'])->name('paket.destroy');
    Route::post('paket/{paket}/edit', [App\Http\Controllers\PaketController::class, 'edit'])->name('paket.edit');
    Route::get('paket/next-kode', [App\Http\Controllers\PaketController::class, 'nextKode'])->name('paket.next-kode');
    Route::post('paket/store', [App\Http\Controllers\PaketController::class, 'store'])->name('paket.store');

    Route::get('transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('transaksi/datatable', [App\Http\Controllers\TransaksiController::class, 'datatable'])->name('transaksi.datatable');
    Route::delete('transaksi/{transaksi}/destroy', [App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::post('transaksi/{transaksi}/edit', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::get('transaksi/{transaksi}/show', [App\Http\Controllers\TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('transaksi/next-kode', [App\Http\Controllers\TransaksiController::class, 'nextKode'])->name('transaksi.next-kode');
    Route::post('transaksi/store', [App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
    Route::post('transaksi/update-status', [App\Http\Controllers\TransaksiController::class, 'updateStatus'])->name('transaksi.update-status');
    Route::post('transaksi/bayar', [App\Http\Controllers\TransaksiController::class, 'bayar'])->name('transaksi.bayar');
    Route::get('transaksi/{transaksi}/print-pdf', [App\Http\Controllers\TransaksiController::class, 'printPdf'])->name('transaksi.print-pdf');

    Route::get('laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::post('laporan/datatable', [App\Http\Controllers\LaporanController::class, 'datatable'])->name('laporan.datatable');
    Route::get('laporan/print-pdf', [App\Http\Controllers\LaporanController::class, 'printPdf'])->name('laporan.print-pdf');
});
