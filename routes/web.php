<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\Admin\ProyekController;

// Peserta
use App\Http\Controllers\Peserta\RegisterController;

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

// Route::get('/', function () {
//     return view('peserta.index');
// });

// Auth
Route::get('/login', function () {
    return view('login');
});

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/member', [MemberController::class, 'index'])->name('member');

Route::get('/pelatihan', [pelatihanController::class, 'index'])->name('pelatihan');
Route::post('/pelatihan', [pelatihanController::class, 'store'])->name('pelatihan-store');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');

// Peserta
Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store');

