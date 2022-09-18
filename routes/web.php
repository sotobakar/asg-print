<?php

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
        Route::get('/', [AuthController::class, 'underConstruction'])->name('customer.orders');
        Route::get('/detail/{order:id_pembelian}', [AuthController::class, 'underConstruction'])->name('customer.orders.detail');
    });

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [AuthController::class, 'underConstruction'])->name('customer.profile');
    });

    Route::get('/desain', [AuthController::class, 'underConstruction'])->name('customer.design');
});

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    Route::get('/login', [AuthController::class, 'underConstruction']);
    Route::get('/register', [AuthController::class, 'underConstruction']);
});
