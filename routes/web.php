<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'loginPage'])->name('customer.login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('customer.register');

Route::get('/keranjang', [AuthController::class, 'underConstruction'])->name('customer.cart');
Route::get('/desain', [AuthController::class, 'underConstruction'])->name('customer.design');