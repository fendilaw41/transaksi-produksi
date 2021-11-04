<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\ResourceController;

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
 // route karyawan select2
  Route::get('/karyawan', [ResourceController::class, 'getKaryawan'])->name('res.karyawan');
   // route item select2
  Route::get('/item', [ResourceController::class, 'getItem'])->name('res.item');
   // route Lokasi select2
  Route::get('/lokasi', [ResourceController::class, 'getLokasi'])->name('res.lokasi');
});