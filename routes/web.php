<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\OwnerMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\UserkasirController;
use App\Http\Controllers\UserownerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TenantInfoController;
use App\Http\Controllers\Auth\RegisterController;




Route::get('/', [HomeController::class, 'index'])->name('landingpage');
Route::get('/aboutus', [HomeController::class, 'AboutUs'])->name('aboutus');
Route::get('/contactus', [HomeController::class, 'ContactUs'])->name('contactus');
Route::get('/tenant', [HomeController::class, 'tenant'])->name('tenant');
Route::get('/inactive', [HomeController::class, 'userinactive'])->name('userincative');


Route::get('/home', [HomeController::class, 'home'])->name('home');

// Rute Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rute Dashboard
Route::middleware(['auth'])->group(function () {
    // Rute berdasarkan peran
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check.role:admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/datamenu', [AdminController::class, 'datamenu'])->name('admin.datamenu');
        Route::get('/transaksi', [AdminController::class, 'showTransaksi'])->name('admin.transaksi');
        Route::get('/tenant', [AdminController::class, 'tenant'])->name('admin.tenant');
        Route::get('/presensimasuk', [AdminController::class, 'presensimasuk'])->name('admin.presensimasuk');
        Route::get('/presensikeluar', [AdminController::class, 'presensikeluar'])->name('admin.presensikeluar');

        Route::resource('tenants', TenantController::class);

        Route::get('/dashboard/create', [MenuController::class, 'create'])->name('create');
        Route::post('/dashboard', [MenuController::class, 'store'])->name('store');
        Route::delete('/dashboard/{id}', [MenuController::class, 'destroy'])->name('destroy');
        Route::get('/dashboard/{id}/edit', [MenuController::class, 'edit'])->name('edit');
        Route::put('/dashboard/{id}', [MenuController::class, 'update'])->name('update');

        // Rute untuk pengguna dengan peran owner
        Route::get('/owner', [UserownerController::class, 'index'])->name('admin.owner.index');
        Route::get('/owner/create', [UserownerController::class, 'create'])->name('admin.owner.create');
        Route::post('/owner', [UserownerController::class, 'store'])->name('admin.owner.store');
        Route::get('/owner/{user}/edit', [UserownerController::class, 'edit'])->name('admin.owner.edit');
        Route::put('/owner/{user}', [UserownerController::class, 'update'])->name('admin.owner.update');
        Route::delete('/owner/{id}', [UserownerController::class, 'destroy'])->name('admin.owner.destroy');

        // Rute untuk pengguna dengan peran kasir
        Route::get('/kasir', [UserkasirController::class, 'index'])->name('admin.kasir.index');
        Route::get('/kasir/create', [UserkasirController::class, 'create'])->name('admin.kasir.create');
        Route::post('/kasir', [UserkasirController::class, 'store'])->name('admin.kasir.store');
        Route::get('/kasir/{user}/edit', [UserkasirController::class, 'edit'])->name('admin.kasir.edit');
        Route::put('/kasir/{user}', [UserkasirController::class, 'update'])->name('admin.kasir.update');
        Route::delete('/kasir/{user}', [UserkasirController::class, 'destroy'])->name('admin.kasir.destroy');

        // Rute untuk pengguna dengan peran member
        Route::get('/member', [MemberController::class, 'index'])->name('admin.member.index');

        // Rute untuk aksi aktivasi dan nonaktifkan pengguna
        Route::put('/{user}/activate', [AdminController::class, 'activate'])->name('users.activate');
        Route::put('/{user}/deactivate', [AdminController::class, 'deactivate'])->name('users.deactivate');
    });

    Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'check.role:owner']], function () {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
        Route::get('/datamenu', [OwnerController::class, 'datamenu'])->name('owner.datamenu');
        Route::get('/transaksi', [OwnerController::class, 'showTransaksi'])->name('owner.transaksi');
        Route::get('/tenant', [OwnerController::class, 'tenant'])->name('owner.tenant');
        Route::get('/presensimasuk', [OwnerController::class, 'masuk'])->name('owner.presensimasuk');
        Route::get('/presensikeluar', [OwnerController::class, 'keluar'])->name('owner.presensikeluar');
        Route::get('/riwayatbahan', [OwnerController::class, 'riwayatbahan'])->name('owner.riwayatbahan');

        //CRUD supplier
        Route::resource('suppliers', SupplierController::class);
        //CRUD bahanbaku
        Route::resource('bahanbaku', BahanBakuController::class);
        //CRUD tenantinfo
        Route::resource('tenantinfos', TenantInfoController::class);



        Route::get('/menu/create', [OwnerController::class, 'create'])->name('owner.create');
        Route::post('/menu', [OwnerController::class, 'store'])->name('owner.store');
        Route::delete('/menu/{id}', [OwnerController::class, 'destroy'])->name('owner.destroy');
        Route::get('/menu/{id}/edit', [OwnerController::class, 'edit'])->name('owner.edit');
        Route::put('/menu/{id}', [OwnerController::class, 'update'])->name('owner.update');

        // Rute untuk pengguna dengan peran kasir
        Route::get('/kasir', [OwnerController::class, 'kasir'])->name('owner.kasir.index');
        Route::get('/kasir/create', [UserkasirController::class, 'createkasir'])->name('owner.kasir.create');
        Route::post('/kasir', [UserkasirController::class, 'storekasir'])->name('owner.kasir.store');
        Route::get('/kasir/{user}/edit', [UserkasirController::class, 'editkasir'])->name('owner.kasir.edit');
        Route::put('/kasir/{user}', [UserkasirController::class, 'updatekasir'])->name('owner.kasir.update');
        Route::delete('/kasir/{user}', [UserkasirController::class, 'destroykasir'])->name('owner.kasir.destroy');

        // Rute untuk aksi aktivasi dan nonaktifkan pengguna
        // Route::put('/{user}/activate', [OwnerController::class, 'activate'])->name('users.activate');
        // Route::put('/{user}/deactivate', [OwnerController::class, 'deactivate'])->name('users.deactivate');
    });


    Route::group(['prefix' => 'kasir', 'middleware' => ['auth', 'check.role:kasir']], function () {
        Route::get('/menu', [KasirController::class, 'index'])->name('kasir.menu');
        Route::get('/menu/{tenant}', [MenuController::class, 'index'])->name('kasir.menu.index');
        Route::post('menu/add-to-cart/{tenant}', [CartController::class, 'addToCart'])->name('cart.addToCart');
        Route::post('menu/remove-from-cart/{tenant}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
        Route::get('menu/update-cart-view/{tenant}', [CartController::class, 'updateCartView'])->name('update-cart-view');
        Route::get('menu/get-note/{menuId}', [CartController::class, 'getMenuNote'])->name('get-menu-note');
        Route::post('menu/save-menu-note', [CartController::class, 'saveMenuNote'])->name('save-menu-note');

        Route::get('menu/checkout/{tenant}', [CheckoutController::class, 'index'])->name('tampilancheckout');
        Route::post('menu/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::get('menu/checkout/payment/{id}', [CheckoutController::class, 'tampilanpayment'])->name('tampilanpayment');
        Route::get('menu/checkout/payment/status/{orderId}', [CheckoutController::class, 'handleCashPayment'])->name('get-payment-status');
        Route::post('menu/checkout/payment/cash', [CheckoutController::class, 'handleCashPayment'])->name('handle-cash-payment');
        Route::post('menu/checkout/payment/success', [CheckoutController::class, 'handlePaymentSuccess'])->name('handle-payment-success');
        Route::get('menu/checkout/invoice', [CheckoutController::class, 'Invoice'])->name('invoice');


        Route::get('PresensiMasuk', [KasirController::class, 'presensimasuk'])->name('presensimasuk');
        Route::get('PresensiKeluar', [KasirController::class, 'presensikeluar'])->name('presensikeluar');
        Route::get('transaksi', [KasirController::class, 'transaksi'])->name('kasir.transaksi');
        Route::post('checkin', [KasirController::class, 'checkIn'])->name('presensiIn');
        Route::post('checkout', [KasirController::class, 'checkOut'])->name('presensiOut');
        Route::get('stockkasir', [KasirController::class, 'stockkasir'])->name('stockkasir');
        Route::get('kasirbahan', [KasirController::class, 'kasirbahan'])->name('kasirbahan');
    });

    Route::group(['prefix' => 'member', 'middleware' => ['auth', 'check.role:member']], function () {
        Route::get('/home', [MemberController::class, 'home'])->name('member.home');
        Route::get('/tenant/{id}', [MemberController::class, 'showTenantDetails'])->name('tenant.detail');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
