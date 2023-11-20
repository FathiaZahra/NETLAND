<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Akomodasi;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')
    // ->middleware(['checkAdmin'])
    ->group(function(){
    Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('listPeminjaman');
    // Route::get('/perusahaan/edit',[PerusahaanController::class,'edit'])->name('editPerusahaan');
    // Route::post('/perusahaan/simpan',[PerusahaanController::class,'store'])->name('simpanPerusahaan');
    // Route::get('/cabang',[CabangController::class,'index'])->name('cabangIndex');
    // Route::get('/cabang/tambah',[CabangController::class,'create'])->name('tambahCabang');
    // Route::post('/cabang/simpan',[CabangController::class,'store'])->name('simpanCabang');
    // Route::get('/cabang/edit/{id}',[CabangController::class,'edit']);
    // Route::post('/cabang/edit/simpan',[CabangController::class,'store'])->name('simpanEditCabang');
    // Route::delete('/cabang/hapus',[CabangController::class,'destroy'])->name('hapusCabang');
});


Route::prefix('dashboard')->group(function(){
    Route::get('/informasi',[InformasiController::class,'index']);
    Route::get('/informasi/detail/{id}',[InformasiController::class,'detail']);
    Route::get('/informasi/tambah',[InformasiController::class,'create']);
    Route::post('/informasi/simpan',[InformasiController::class,'store']);
    Route::get('/informasi/edit/{id}',[InformasiController::class,'edit']);
    Route::post('/informasi/edit/simpan',[InformasiController::class,'update']);
    Route::delete('/informasi/hapus',[InformasiController::class,'destroy']);
});


Route::prefix('dashboard')->group(function(){
    Route::get('/akomodasi',[AkomodasiController::class,'index']);
    Route::get('/akomodasi/detail/{id}',[AkomodasiController::class,'detail']);
    Route::get('/akomodasi/tambah',[AkomodasiController::class,'create']);
    Route::post('/akomodasi/simpan',[AkomodasiController::class,'store']);
    Route::get('/akomodasi/edit/{id}',[AkomodasiController::class,'edit']);
    Route::post('/akomodasi/edit/simpan',[AkomodasiController::class,'update']);
    Route::delete('/akomodasi/hapus',[AkomodasiController::class,'destroy']);
});

// Route::prefix('login')->group(function(){
//     Route::get('/',[AkunController::class,'index'])->name('login');
//     // Route::get('login',[AuthController::class,'index'])->name('login');
//     Route::post('/check',[AkunController::class,'check']);
//     Route::get('/logout',[AkunController::class,'logout'])->name('logout');

// });