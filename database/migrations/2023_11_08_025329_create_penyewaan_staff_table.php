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
        Schema::create('penyewaan_staff', function (Blueprint $table) {
            $table->integer('id_penyewaanstaff',10)->autoIncrement();
            $table->integer('id_akun')->nullable(false);
            $table->string('nama_penyewaanstaff',60)->nullable(false);
            $table->timestamps(false);
            
            $table->foreign('id_akun')
                    ->references('id_akun')->on('akun')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan_staff');
    }
};
