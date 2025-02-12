<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('super-admin')->name('super-admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('layanans', LayananController::class);
    Route::resource('tindakans', TindakanController::class)->except(['create']);
    Route::get('/tindakans/create/{rekam_medi}', [TindakanController::class, 'create'])->name('tindakans.create');
    Route::resource('pasiens', PasienController::class);
    Route::resource('dokters', DokterController::class);
    Route::resource('rekam-medis', RekamMedisController::class)->except(['create']);
    Route::get('/rekam-medis/create/{pasien}', [RekamMedisController::class, 'create'])->name('rekam-medis.create');
});

Route::get('/', HomeController::class)->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
