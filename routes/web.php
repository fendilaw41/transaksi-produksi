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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//############# Transaksi ###################//
Route::prefix('transaksi')->group(function (){
	Route::get('/', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
	Route::get('/create', [App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi.create');
	Route::post('/store', [App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
	Route::get('/edit/{id}', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('transaksi.edit');
	Route::get('/show/{id}', [App\Http\Controllers\TransaksiController::class, 'show'])->name('transaksi.show');
	Route::put('/update/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
	Route::post('/delete/{id}', [App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.delete');
});
//############# End Transaksi ###################//

//############# Item ###################//
Route::prefix('item')->group(function () {
    Route::view('/', 'pages.item.index')->name('item.index');

    Route::get('/index', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/show/{id}', [App\Http\Controllers\ItemController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\ItemController::class, 'store']);
    Route::put('/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    Route::delete('/delete/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
});
//############# End Item ###################//

//############# Karyawan ###################//
Route::prefix('karyawan')->group(function () {
    Route::view('/', 'pages.karyawan.index')->name('karyawan.index');

    Route::get('/index', [App\Http\Controllers\KaryawanController::class, 'index']);
    Route::get('/show/{id}', [App\Http\Controllers\KaryawanController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\KaryawanController::class, 'store']);
    Route::put('/update/{id}', [App\Http\Controllers\KaryawanController::class, 'update']);
    Route::delete('/delete/{id}', [App\Http\Controllers\KaryawanController::class, 'destroy']);
});
//############# End Karyawan ###################//

//############# Lokasi ###################//
Route::prefix('lokasi')->group(function () {
    Route::view('/', 'pages.lokasi.index')->name('lokasi.index');

    Route::get('/index', [App\Http\Controllers\LokasiController::class, 'index']);
    Route::get('/show/{id}', [App\Http\Controllers\LokasiController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\LokasiController::class, 'store']);
    Route::put('/update/{id}', [App\Http\Controllers\LokasiController::class, 'update']);
    Route::delete('/delete/{id}', [App\Http\Controllers\LokasiController::class, 'destroy']);
});
//############# End Lokasi ###################//

//############# Planning ###################//
Route::prefix('planning')->group(function () {
    Route::view('/', 'pages.planning.index')->name('planning.index');

    Route::get('/index', [App\Http\Controllers\PlanningController::class, 'index']);
    Route::get('/show/{id}', [App\Http\Controllers\PlanningController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\PlanningController::class, 'store']);
    Route::put('/update/{id}', [App\Http\Controllers\PlanningController::class, 'update']);
    Route::delete('/delete/{id}', [App\Http\Controllers\PlanningController::class, 'destroy']);
});
//############# End Planning ###################//


//############# Achivement ###################//
Route::prefix('achivement')->group(function () {
    Route::view('/', 'pages.achivement.index')->name('achivement.index');

    Route::get('/index', [App\Http\Controllers\AchivementController::class, 'index']);
    Route::get('/show/{id}', [App\Http\Controllers\AchivementController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\AchivementController::class, 'store']);
    Route::put('/update/{id}', [App\Http\Controllers\AchivementController::class, 'update']);
    Route::delete('/delete/{id}', [App\Http\Controllers\AchivementController::class, 'destroy']);
});
//############# End Achivement ###################//