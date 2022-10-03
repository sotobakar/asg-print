<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('customer.index');
})->name('customer.home');

Route::get('/produk', [ProductController::class, 'index'])->name('products');
Route::get('/produk/detail/{product:id_produk}', [ProductController::class, 'detail'])->name('customer.products.detail');

Route::get('/login', [AuthController::class, 'loginPage'])->name('customer.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('customer.logout');

Route::get('/register', [AuthController::class, 'registerPage'])->name('customer.register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    // Cart
    Route::prefix('keranjang')->group(function () {  
        Route::get('/', [CartController::class, 'userCart'])->name('customer.cart');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('customer.cart.checkout');
        Route::post('/', [CartController::class, 'add'])->name('customer.cart.add');
        Route::put('/{cart:id}', [CartController::class, 'update'])->name('customer.cart.update');
        Route::delete('/{cart:id}', [CartController::class, 'remove'])->name('customer.cart.remove');
    });
    
    // My Orders (Pesananku)
    Route::prefix('pesanan')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('customer.orders');
        Route::get('/detail/{order:id_pembelian}', [OrderController::class, 'detail'])->name('customer.orders.detail');
        Route::post('/{order:id_pembelian}/upload', [OrderController::class, 'uploadPayment'])->name('customer.orders.upload');
        Route::get('/{order:id_pembelian}/invoice', [OrderController::class, 'invoice'])->name('customer.orders.invoice')->withoutMiddleware('auth');
        Route::get('/{order:id_pembelian}/invoice/cetak', [OrderController::class, 'cetakInvoice'])->name('customer.orders.invoice.cetak');
    });

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [AuthController::class, 'underConstruction'])->name('customer.profile');
    });

    Route::get('/desain', [AuthController::class, 'underConstruction'])->name('customer.design');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'loginPage'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        // Produk
        Route::prefix('produk')->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('admin.products');
            Route::get('/tambah', [AdminProductController::class, 'createPage'])->name('admin.products.create');
            Route::put('/{product:id_produk}', [AdminProductController::class, 'update'])->name('admin.products.update');

            Route::post('/', [AdminProductController::class, 'create']);
            Route::get('/detail/{product:id_produk}', [AdminProductController::class, 'detail'])->name('admin.products.detail');
        });
        
        // Customer
        Route::prefix('pelanggan')->group(function () {
            Route::get('/', [AdminCustomerController::class, 'index'])->name('admin.customers');
            Route::get('/detail/{customer:id}', [AdminCustomerController::class, 'detail'])->name('admin.customers.detail');
        });

        // Customer
        Route::prefix('pesanan')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders');
            Route::get('/detail/{order:id_pembelian}', [AdminOrderController::class, 'detail'])->name('admin.orders.detail');
            Route::put('/{order:id_pembelian}/updateStatus', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        });
    });
});
