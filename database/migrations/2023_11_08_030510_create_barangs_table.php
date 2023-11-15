<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->integer('id_barang')->autoIncrement();
            $table->integer('id_peminjaman')->nullable(false);
            $table->integer('id_pengunjung')->nullable(false);
            $table->string('nama_barang', 60)->nullable(false);
            $table->integer('harga_barang')->nullable(false);
            $table->integer('stok_barang')->nullable(false);
            $table->integer('pembayaran_sewabarang')->nullable(false);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_pengunjung')
                    ->references('id_pengunjung')->on('pengunjung')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_peminjaman')
                    ->references('id_peminjaman')->on('peminjamen')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
