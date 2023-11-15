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
        Schema::create('ticketing_staff', function (Blueprint $table) {
            $table->integer('id_ticketingstaff')->autoIncrement();
            $table->integer('id_akun')->nullable(false);
            $table->string('nama_ticketingstaff',50)->nullable(false);
            $table->timestamps(false);
            
            // Foreign Key
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
        Schema::dropIfExists('ticketing_staff');
    }
};
