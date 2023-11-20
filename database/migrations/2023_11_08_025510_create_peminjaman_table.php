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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->integer('id_peminjaman')->autoIncrement();
            $table->integer('id_pengunjung')->nullable(false);
            $table->integer('id_penyewaanstaff')->nullable(false);
            $table->integer('jumlah_sewa')->nullable(false);
            $table->timestamps(false);

            $table->foreign('id_pengunjung')
                    ->references('id_pengunjung')->on('pengunjung')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_penyewaanstaff')
                    ->references('id_penyewaanstaff')->on('penyewaan_staff')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
