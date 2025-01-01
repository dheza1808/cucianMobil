<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Rute untuk halaman utama
// Route::get('/', function () {
//     return view('auth.login
//     ');
// });

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Tambahkan route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute untuk pencatatan mobil
Route::resource('cars', CarController::class);
// Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
// Route::get('/cars/create', [CarController::class, 'create'])->name('cars.store');
//  Route::get('/cars/edit', [CarController::class, 'edit'])->name('cars.edit');
//  Route::get('/cars/destroy', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

// // Rute untuk menampilkan daftar gaji karyawan
// Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');


// // Rute untuk menampilkan form tambah gaji karyawan
// Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create');

// // Rute untuk menyimpan gaji karyawan baru
// Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');

Route::resource('gaji', GajiController::class);


Route::resource('dataKaryawan', DataKaryawanController::class);

// Route untuk login
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);

// // Route untuk registrasi
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);
