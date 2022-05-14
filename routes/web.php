<?php

use App\Models\Obat;
use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

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

Route::get('/reset', function(){
    Artisan::call('migrate:fresh --seed');
    return redirect()->back();
});

Route::get('login', [UserController::class, 'login'])->name('login');

Route::post('login', [UserController::class, 'actionLogin'])->name('actionLogin');

Route::post('logout', [UserController::class, 'actionLogout'])->name('actionLogout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('profile/update/{id}', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/update/avatar/{id}', [UserController::class, 'updateAvatar'])->name('profile.avatar');
    Route::post('profile/update/avatar/crop/{id}', [UserController::class, 'cropAvatar'])->name('profile.avatar.crop');
    Route::delete('profile/delete/avatar/{id}', [UserController::class, 'deleteAvatar'])->name('profile.avatar.destroy');
    Route::put('profile/update/password/{id}', [UserController::class, 'updatePassword'])->name('profile.password');

    // routes user (admin only)
    Route::get('data/user', [UserController::class, 'index'])->name('user.index');
    Route::get('data/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('data/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('data/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('data/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('data/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('data/user/import', [UserController::class, 'import'])->name('user.import');
    Route::get('data/user/export', [UserController::class, 'export'])->name('user.export');

    // routes obat
    // Route::get('data/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('data/obat', [ObatController::class, 'serverSide'])->name('obat.serverSide');
    Route::get('data/obat/json', [ObatController::class, 'json'])->name('obat.json');
    Route::get('data/obat/create', [ObatController::class, 'create'])->name('obat.create');
    // admin only
    Route::get('data/obat/export', [ObatController::class, 'export'])->name('obat.export');
    Route::post('data/obat/import', [ObatController::class, 'import'])->name('obat.import');
    Route::post('data/obat/create', [ObatController::class, 'store'])->name('obat.store');
    Route::get('data/obat/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('data/obat/edit/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::post('data/obat/delete/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');

    // // routes penjualan

    Route::get('transaksi/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('transaksi/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('transaksi/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');

    // // routes pembelian
    Route::get('trasaksi/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('transaksi/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('transaksi/pembelian/create', [PembelianController::class, 'store'])->name('pembelian.store');

});

