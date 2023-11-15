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
        Schema::create('akun', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_akun',10)->autoIncrement();
            $table->string('username',50)->nullable(false);
            $table->text('password')->nullable(false);
            $table->enum('role', ['super_admin','pengelola','staff_ticketing','staff_penyewaan']);
            $table->text('file');
            $table->timestamps(false);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
