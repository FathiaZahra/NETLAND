<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\PeminjamanController;
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


Route::prefix('login')->group(function(){
    Route::get('/',[AkunController::class,'index'])->name('login');
    // Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('/check',[AkunController::class,'check']);
    Route::get('/logout',[AkunController::class,'logout'])->name('logout');

});