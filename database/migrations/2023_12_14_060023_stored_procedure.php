<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP Procedure IF EXISTS CreateBarang');
        DB::unprepared("
        CREATE PROCEDURE CreateBarang(
            IN new_nama_barang VARCHAR(60),
            IN new_harga_barang DECIMAL,
            IN new_stok_barang INT,
            IN new_pembayaran_sewabarang INT,
            IN new_file TEXT
        )
        BEGIN
            INSERT INTO barang (nama_barang, harga_barang, stok_barang, pembayaran_sewabarang, file)
            VALUES (new_nama_barang, new_harga_barang, new_stok_barang, new_pembayaran_sewabarang, new_file); 
        END
        
        
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
