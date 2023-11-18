<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\Auth\LoginController;



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



Route::get('/', [HomeController::class, 'index'])->name('landingpage');
Route::get('/home', [HomeController::class, 'home'])->name('home');

// Rute Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


// Rute Dashboard
Route::middleware(['auth'])->group(function () {
    // Rute berdasarkan peran
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check.role:admin']], function () {
        Route::get('/menu', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard/create', [MenuController::class, 'create'])->name('create');
        Route::post('/dashboard', [MenuController::class, 'store'])->name('store');
        Route::delete('/dashboard/{id}', [MenuController::class, 'destroy'])->name('destroy');
        // Tambahkan rute admin lainnya di sini
    });

    Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'check.role:owner']], function () {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
        // Tambahkan rute owner lainnya di sini
    });

    Route::group(['prefix' => 'kasir', 'middleware' => ['auth', 'check.role:kasir']], function () {
        Route::get('/menu', [KasirController::class, 'index'])->name('kasir.menu.index');
        Route::get('/menu', [MenuController::class, 'index'])->name('kasir.menu.index');
        // Tambahkan rute kasir lainnya di sini
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
