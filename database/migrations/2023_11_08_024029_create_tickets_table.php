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
        Schema::create('ticket', function (Blueprint $table) {
            $table->integer('id_ticket')->autoIncrement();
            $table->integer('id_ticketingstaff')->nullable(false);
            $table->integer('id_pengunjung')->nullable(false);
            $table->date('tanggal_pemesanan')->nullable(false)->default('2023-01-01');
            $table->integer('jumlah_ticket')->nullable(false);
            $table->integer('pembayaran_ticket')->nullable(false);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_ticketingstaff')
                    ->references('id_ticketingstaff')->on('ticketing_staff')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pengunjung')
                    ->references('id_pengunjung')->on('pengunjung')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
