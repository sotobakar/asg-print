<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
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
});

Route::get('/produk', [ProductController::class, 'index'])->name('products');
Route::get('/produk/detail/{product:id_produk}', [ProductController::class, 'detail'])->name('customer.products.detail');

Route::get('/login', [AuthController::class, 'loginPage'])->name('customer.login');
Route::post('/login', [AuthController::class, 'login']);

// TODO: Register route
Route::get('/register', [AuthController::class, 'registerPage'])->name('customer.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [AuthController::class, 'underConstruction'])->name('customer.cart');
    Route::post('/keranjang', [CartController::class, 'add'])->name('customer.cart.add');
    Route::get('/desain', [AuthController::class, 'underConstruction'])->name('customer.design');
});

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    Route::get('/login', [AuthController::class, 'underConstruction']);
    Route::get('/register', [AuthController::class, 'underConstruction']);
});
