<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

//login
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//dashboard admin
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');

//Siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'insert'])->name('siswa.create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');

//pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::post('/pembayaran/update/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
Route::delete('/pembayaran/delete/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

//profil
Route::get('/profil', [AuthController::class, 'profil'])->name('profil');

//Pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

//Inventaris
Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
Route::get('/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

//tampilan user
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/user/pembayaran', [HomeController::class, 'pembayaran'])->name('user.pembayaran');
Route::get('/user/pengeluaran', [HomeController::class, 'pengeluaran'])->name('user.pengeluaran');
Route::get('/user/inventaris', [HomeController::class, 'inventaris'])->name('user.inventaris');


