<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('super-admin')->name('super-admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('layanans', LayananController::class);
    Route::resource('tindakans', TindakanController::class);
    Route::resource('pasiens', PasienController::class);
});

Route::get('/', HomeController::class)->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
