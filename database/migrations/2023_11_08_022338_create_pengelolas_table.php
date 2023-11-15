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
        Schema::create('pengelola', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_pengelola')->autoIncrement();
            $table->integer('id_akun')->nullable(false);
            $table->string('nama_pengelola',30)->nullable(false);
            $table->string('no_telp',15)->nullable(false);
            $table->timestamps(false);

            //Foreign Key
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
        Schema::dropIfExists('pengelola');
    }
};
