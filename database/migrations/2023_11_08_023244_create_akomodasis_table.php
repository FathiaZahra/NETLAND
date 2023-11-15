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
        Schema::create('akomodasi', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_akomodasi',10)->autoIncrement();
            $table->integer('id_pengelola')->nullable(false);
            $table->string('nama_akomodasi',225)->nullable(false);
            $table->string('isi_akomodasi',225)->nullable(false);
            $table->text('file');
            $table->timestamps(false);
            
            // Foreign Key
            $table->foreign('id_pengelola')
                    ->references('id_pengelola')->on('pengelola')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akomodasi');
    }
};
