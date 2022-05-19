<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportVController;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\Admin\UserController;
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

Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('reporteVentas', ReportVController::class)->names('admin.reporteVentas');
Route::resource('sales', SaleController::class)->names('admin.sales');
Route::get('addCart/{id}', [SaleController::class, 'add'])->name('addCart');
