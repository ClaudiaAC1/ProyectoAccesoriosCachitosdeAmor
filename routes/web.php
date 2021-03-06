<?php

use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\Auth\ConnectController;
use App\Http\Controllers\welcome;
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
    return view('welcome');
});


Route::get('login', [ConnectController::class, 'getLogin'])->name('auth.login');
Route::post('authenticate', [ConnectController::class, 'authenticate'])->name('auth.authenticate');
Route::get('logout', [ConnectController::class, 'getLogout'])->name('auth.logout');
Route::get('saleproduct', [SaleController::class, 'agregarProductos'])->name('admin.sales.saleproduct');
Route::get('catalogo', [welcome::class, 'getCatalog']) -> name('catalogo');
