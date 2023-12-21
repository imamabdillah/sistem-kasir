<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Cart;

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
Route::get('/aboutus', [HomeController::class, 'AboutUs'])->name('aboutus');
Route::get('/home', [HomeController::class, 'home'])->name('home');

// Rute Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


// Rute Dashboard
Route::middleware(['auth'])->group(function () {
    // Rute berdasarkan peran
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check.role:admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/datamenu', [AdminController::class, 'datamenu'])->name('admin.datamenu');
        Route::get('/transaksi', [AdminController::class, 'showTransaksi'])->name('admin.transaksi');
        Route::get('/tenant', [AdminController::class, 'tenant'])->name('admin.tenant');

        Route::get('/owner', [AdminController::class, 'userowner'])->name('admin.owner');
        Route::get('/kasir', [AdminController::class, 'userkasir'])->name('admin.kasir');
        Route::put('/{user}/activate', [AdminController::class, 'activate'])->name('users.activate');
        Route::put('/{user}/deactivate', [AdminController::class, 'deactivate'])->name('users.deactivate');



        Route::get('/dashboard/create', [MenuController::class, 'create'])->name('create');
        Route::post('/dashboard', [MenuController::class, 'store'])->name('store');
        Route::delete('/dashboard/{id}', [MenuController::class, 'destroy'])->name('destroy');
        Route::get('/dashboard/{id}/edit', [MenuController::class, 'edit'])->name('edit');
        Route::put('/dashboard/{id}', [MenuController::class, 'update'])->name('update');

        // Tambahkan rute admin lainnya di sini
    });

    Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'check.role:owner']], function () {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
        // Tambahkan rute owner lainnya di sini
    });

    Route::group(['prefix' => 'kasir', 'middleware' => ['auth', 'check.role:kasir']], function () {
        Route::get('/menu', [KasirController::class, 'index'])->name('kasir.menu.index');
        Route::get('/menu', [MenuController::class, 'index'])->name('kasir.menu.index');
        Route::post('menu/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
        Route::post('menu/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
        Route::get('menu/get-note/{menuId}', [CartController::class, 'getMenuNote'])->name('get-menu-note');
        Route::post('menu/save-menu-note', [CartController::class, 'saveMenuNote'])->name('save-menu-note');
        Route::get('menu/update-cart-view', [CartController::class, 'updateCartView'])->name('update-cart-view');

        Route::get('menu/checkout', [CheckoutController::class, 'index'])->name('tampilancheckout');
        Route::post('menu/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::get('menu/checkout/payment/{id}', [CheckoutController::class, 'tampilanpayment'])->name('tampilanpayment');
        Route::get('menu/checkout/payment/status/{orderId}', [CheckoutController::class, 'handleCashPayment'])->name('get-payment-status');
        Route::post('menu/checkout/payment/cash', [CheckoutController::class, 'handleCashPayment'])->name('handle-cash-payment');
        Route::post('menu/checkout/payment/success', [CheckoutController::class, 'handlePaymentSuccess'])->name('handle-payment-success');




        // Route::post('menu/checkout//initiate-payment', [CheckoutController::class, 'initiatePayment'])->name('initiate-payment');

        // Tambahkan rute kasir lainnya di sini
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
