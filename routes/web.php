<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/', [GedungController::class, 'index'] )->name('home');
Route::get('/formulir/{id}', [PeminjamController::class, 'index']);
Route::get('/peralatan', [PeralatanController::class, 'index']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', function(){
    return 'What are you doing, bitch!';
})->middleware('guest');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth');
Route::post('/peralatan', [PeralatanController::class, 'store'])->name('form_peralatan');
Route::post('/peminjam', [PeminjamController::class, 'store'])->name('form_peminjam');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::get('/edit/{id}', [PeminjamController::class, 'edit']);
Route::post('/edit/{id}', [PeminjamController::class, 'update']);
Route::get('/hapus/{id}', [PeminjamController::class, 'destroy']);

Route::get('/data', [DataController::class, 'index'])->name('data')->middleware('auth');

Route::get('/cetak/{id}', [PeminjamController::class, 'cetak'])->middleware('auth');
Route::post('/kepala/{id}', [PeminjamController::class, 'izinkan']);
Route::post('/sekertaris/{id}', [PeminjamController::class, 'izinkan']);
Route::post('/kepalaTolak/{id}', [PeminjamController::class, 'tolak']);

Route::get('/peralatan', [PeralatanController::class, 'index'])->name('peralatan');

Route::get('/transaksi', [TransaksiController::class, 'index']);
