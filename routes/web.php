<?php

use App\Http\Controllers\Auth\ConnectController;
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
Route::post('addCart', [SaleController::class, 'add'])->name('addCart');
