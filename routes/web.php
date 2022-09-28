<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MixtapeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/registerSubmit', [RegisterController::class, 'store'])->name('registerSubmit');

Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/loginSubmit', [LoginController::class, 'store'])->name('loginSubmit');

Route::get('/logout', [LogoutController::class, 'perform'])->name('logout')->middleware('auth');

Route::get('/discover', [DashboardController::class, 'showRandom'])->name('dashboard');
Route::post('/discover', [DashboardController::class, 'search'])->name('search');
Route::post('/discoverSubmit', [DashboardController::class, 'storeTrack'])->name('storeTrack');

Route::get('/mixtape', [MixtapeController::class, 'index'])->name('mixtape');
Route::get('/show', [MixtapeController::class, 'show'])->name('show');
Route::get('/delete', [MixtapeController::class, 'softDelete'])->name('delete');
Route::get('/addNotes', [MixtapeController::class, 'edit'])->name('edit');
Route::post('/addNotes', [MixtapeController::class, 'storeNotes'])->name('storeNotes');