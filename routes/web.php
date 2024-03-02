<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\MejaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web r`outes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
            



Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {

	Route::resource('/type', TypeController::class);
	Route::resource('menu', MenuController::class);
	Route::resource('pemesanan', PemesananController::class);
	Route::resource('kategori', KategoriController::class);
	Route::resource('transaksi', TransaksiController::class);
	Route::resource('pelanggan', PelangganController::class);
	Route::resource('stok', StokController::class);
	Route::resource('meja', MejaController::class);
	Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

	// export and import kategori
	Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
	Route::post('uploadkategori', [KategoriController::class, 'upload']);

	// export and import type
	Route::get('export/type', [TypeController::class, 'exportData'])->name('export-type');
	Route::post('uploadtype', [TypeController::class, 'upload']);

	// export and import menu
	Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');

	// export and import stok
	Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');

	// export and import pelanggan
	Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');

	// export and import meja
	Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');

	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});