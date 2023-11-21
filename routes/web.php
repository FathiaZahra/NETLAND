<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\TicketController;
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



   // TIKET
   Route::prefix('dashboard')
//    ->middleware(['akses:ticket'])
   ->group(function () {
    Route::get('/ticket', [TicketController::class, 'index']);
    Route::get('/ticket/detail/{id}',[TicketController::class,'detail']);
    Route::get('/ticket/tambah',[TicketController::class,'create'])->name('tambahTicket');
    Route::post('/ticket/simpan',[TicketController::class,'store'])->name('simpanTicket');
    Route::get('/ticket/edit/{id}',[TicketController::class,'edit']);
    Route::post('/ticket/edit/simpan',[TicketController::class,'update'])->name('simpanEditTicket');
    Route::delete('/ticket/hapus',[TicketController::class,'destroy'])->name('hapusTicket');
});


    Route::prefix('dashboard')
    // ->middleware(['akses:staff_penyewaan'])
    ->group(function(){
    Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('listPeminjaman');
    Route::get('/peminjaman/detail/{id}',[PeminjamanController::class,'detail']);
    Route::get('/unduh',[PeminjamanController::class,'unduhPdf']);    
    Route::get('/peminjaman/tambah',[PeminjamanController::class,'create'])->name('tambahPeminjaman');
    Route::post('/peminjaman/simpan',[PeminjamanController::class,'store'])->name('simpanPeminjaman');
    Route::get('/peminjaman/edit/{id}',[PeminjamanController::class,'edit'])->name('editPeminjaman');
    Route::post('/peminjaman/edit/simpan',[PeminjamanController::class,'update'])->name('simpanEditPeminjaman');
    Route::delete('/peminjaman/hapus',[PeminjamanController::class,'destroy'])->name('hapusPeminjaman');
});


Route::prefix('dashboard')
// ->middleware(['akses:pengelola'])
->group(function(){
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

Route::prefix('login')->group(function(){
    Route::get('/',[AkunController::class,'index'])->name('login');
    // Route::get('login',[AuthController::class,'index'])->name('login');
    // Route::post('/check',[AkunController::class,'check']);
    Route::get('/logout',[AkunController::class,'logout'])->name('logout');

});