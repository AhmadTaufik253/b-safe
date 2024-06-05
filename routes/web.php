<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\Admin\ProyekController;

// Peserta
use App\Http\Controllers\Peserta\RegisterController;
use App\Http\Controllers\Peserta\SertifikatController;
use App\Http\Controllers\Peserta\DataDiriController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login', function () {
    return view('auth.login');
});

// Register
Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::post('/register-user', [RegisterController::class, 'store'])->name('register-store');

// Admin
Route::group(['middleware' => ['auth','cekRole:admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/accept/{id}', [DashboardController::class, 'update'])->name('accept');

    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/{id}', [MemberController::class, 'edit'])->name('member-edit');
    Route::put('/member/{id}', [MemberController::class, 'update'])->name('member-update');
    Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member-delete');
    Route::get('/member/{id}/riwayat', [MemberController::class, 'riwayat'])->name('member-riwayat');
    Route::get('/member/{id}/dokumen', [MemberController::class, 'dokumen'])->name('member-dokumen');

    Route::get('/pelatihan', [pelatihanController::class, 'index'])->name('pelatihan');
    Route::post('/pelatihan', [pelatihanController::class, 'store'])->name('pelatihan-store');
    Route::put('/pelatihan/{id}', [pelatihanController::class, 'update'])->name('pelatihan-update');
    Route::get('/pelatihan/{id}', [pelatihanController::class, 'destroy'])->name('pelatihan-destroy');
    Route::get('/peserta-pelatihan/{id}', [pelatihanController::class, 'peserta'])->name('pelatihan-peserta');
    Route::get('/calon-peserta-pelatihan/{id}', [pelatihanController::class, 'calon'])->name('pelatihan-calon-peserta');

    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::get('/sertifikat/{id}/', [ProyekController::class, 'send'])->name('kirim-sertifikat');
    Route::post('/pembayaran/{id}/', [ProyekController::class, 'pembayaran'])->name('upload-pembayaran');
});  


// Peserta
Route::group(['middleware' => ['auth','cekRole:peserta']], function() {
    Route::get('/data-diri', [DataDiriController::class, 'index'])->name('data-diri');
    Route::put('/update-data-diri/{id}', [DataDiriController::class, 'update'])->name('update-data-diri');
    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat');
});  




