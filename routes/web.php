<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin route
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');

// Auth route
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// categories route resource
Route::resource('categories', App\Http\Controllers\CategoryController::class )->middleware('auth');

// products route resource
Route::resource('products', App\Http\Controllers\ProductController::class )->middleware('auth');

// customers route resource
Route::resource('customers', App\Http\Controllers\CustomerController::class )->middleware('auth');

// filings route resource
Route::resource('filings', App\Http\Controllers\FilingController::class )->middleware('auth');

// employees route resource
Route::resource('employees', App\Http\Controllers\EmployeeController::class )->middleware('auth');

// suppliers route resource
Route::resource('suppliers', App\Http\Controllers\SupplierController::class )->middleware('auth');

// purchase-orders route resource
Route::resource('purchase-orders', App\Http\Controllers\PurchaseOrderController::class )->middleware('auth');

// tickets route resource
Route::resource('tickets', App\Http\Controllers\TicketController::class )->middleware('auth');

// voucher-types route resource
Route::resource('voucher-types', App\Http\Controllers\VoucherTypeController::class )->middleware('auth');

// ticket-details route resource
Route::resource('ticket-details', App\Http\Controllers\TicketDetailController::class )->middleware('auth');

// users route resource
Route::resource('users', App\Http\Controllers\UserController::class )->middleware('auth');

// purchase-order-details route resource
Route::resource('purchase-order-details', App\Http\Controllers\PurchaseOrderDetailController::class )->middleware('auth');
