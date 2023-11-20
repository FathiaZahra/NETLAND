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

Route::prefix('dashboard')->group(function(){
    Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('listPeminjaman');
    Route::get('/peminjaman/detail/{id}',[PeminjamanController::class,'detail']);    
    Route::get('/peminjaman/tambah',[PeminjamanController::class,'create'])->name('tambahPeminjaman');
    Route::post('/peminjaman/simpan',[PeminjamanController::class,'store'])->name('simpanPeminjaman');
    Route::get('/peminjaman/edit/{id}',[PeminjamanController::class,'edit'])->name('editPeminjaman');
    Route::post('/peminjaman/edit/simpan',[PeminjamanController::class,'update'])->name('simpanEditPeminjaman');
    Route::delete('/peminjaman/hapus',[PeminjamanController::class,'destroy'])->name('hapusPeminjaman');
});


Route::prefix('login')->group(function(){
    Route::get('/',[AkunController::class,'index'])->name('login');
    // Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('/check',[AkunController::class,'check']);
    Route::get('/logout',[AkunController::class,'logout'])->name('logout');

});