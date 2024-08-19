<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//route awal ketika mengakses webz
Route::get('/', [UserController::class, 'home'])->name('home');

//route auth
Route::get('/login', [AuthController::class, 'index'])->name('auth');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'create'])->name('register');
Route::post('/registrasi', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//route user
Route::get('/user/dashboard/{id}', [UserController::class, 'show'])->name('account.show');
Route::get('/user/kategori/', [UserController::class, 'search'])->name('search');
Route::get('/user/transaksi/{id}', [UserController::class, 'trans'])->name('trans');
Route::post('/user/transaksi/{id}', [BankController::class, 'transaksi'])->name('transaksi');
Route::get('/user/keranjang', [UserController::class, 'keranjang'])->name('keranjang');
Route::post('/user/check-out', [KantinController::class, 'pesan'])->name('pesan');
Route::post('/user/check-out/{id}', [KantinController::class, 'hapusPesanan'])->name('hapus.pesanan');
Route::post('/user/beli', [KantinController::class, 'beli'])->name('beli');
Route::get('/user/laporan-bank/{id}', [UserController::class, 'laporanTransaksi'])->name('laporanU.bank');
Route::get('/user/cetak-transaksi/{id}', [UserController::class, 'cetakTransaksi'])->name('cetak.transaksi');
Route::get('/user/cetak-pembelian/{id}', [UserController::class, 'cetakPembelian'])->name('cetak.pembelian');
Route::get('/user/laporan-kantin/{id}', [UserController::class, 'laporanPembelian'])->name('laporanU.kantin');

//route kantin
Route::get('/kantin', [KantinController::class, 'index'])->name('kantin');
Route::get('/laporan-kantin', [KantinController::class, 'laporan'])->name('laporan.kantin');
Route::get('/cetak-laporan-kantin', [KantinController::class, 'cetakLaporanKantin'])->name('cetak.laporan.kantin');
Route::resource('/menu', MenuController::class);

//route bank
Route::get('/bank', [BankController::class, 'index'])->name('bank');
Route::post('/bank/transaksi/{id}', [BankController::class, 'approveTopUp'])->name('acc.transaksi');
Route::post('/bank/{id}', [BankController::class, 'hapusTransaksi'])->name('hapus.transaksi');
Route::get('/laporan-transaksi', [BankController::class, 'laporanBank'])->name('laporan.bank');
Route::get('/cetak-laporan-bank', [BankController::class, 'cetakLaporanBank'])->name('cetak.laporan.bank');
