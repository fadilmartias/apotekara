<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Models\Penjualan;
use App\Models\Obat;

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
Route::get('/', function(){
    return redirect(route('login'));
});

Route::get('/404', function(){
    return view('404');
})->name('404');

Route::get('login', [UserController::class, 'login'])->name('login');

Route::post('login', [UserController::class, 'actionLogin'])->name('actionLogin');

Route::post('logout', [UserController::class, 'actionLogout'])->name('actionLogout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // routes user (admin only)
    Route::get('data/user', [UserController::class, 'index'])->name('user.index');
    Route::get('data/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('data/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('data/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('data/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('data/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // routes obat
    Route::get('data/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('data/obat/create', [ObatController::class, 'create'])->name('obat.create');
    // admin only
    Route::post('data/obat/create', [ObatController::class, 'store'])->name('obat.store');
    Route::get('data/obat/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::post('data/obat/edit/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('data/obat/delete/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');

    // // routes penjualan

    Route::get('transaksi/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('transaksi/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('transaksi/penjualan/create', [PenjualanController::class, 'store'])->name('penjualan.store');

    // // routes pembelian
    Route::get('trasaksi/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    // Route::get('transaksi/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    // Route::post('transaksi/pembelian/create', [PembelianController::class, 'store'])->name('pembelian.store');

});

