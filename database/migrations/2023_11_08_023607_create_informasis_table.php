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
        Schema::create('informasi', function (Blueprint $table) {
            $table->integer('id_informasi',10)->autoIncrement();
            $table->integer('id_pengelola')->nullable(false);
            $table->string('nama_informasi',225)->nullable(false);
            $table->text('isi_informasi')->nullable(false);
            $table->text('file');
            $table->timestamps(false);

            //foreign key
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
        Schema::dropIfExists('informasi');
    }
};
