<?php

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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('transaksi')->group(function (){
	Route::get('/', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
	Route::get('/create', [App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi.create');
	Route::post('/store', [App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
	Route::get('/edit/{id}', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('transaksi.edit');
	Route::get('/show/{id}', [App\Http\Controllers\TransaksiController::class, 'show'])->name('transaksi.show');
	Route::put('/update/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
	Route::post('/delete/{id}', [App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.delete');
});