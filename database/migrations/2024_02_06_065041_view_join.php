<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP VIEW IF EXISTS view_informasi');
        DB::unprepared(
        "CREATE VIEW view_informasi AS
            SELECT
                id_informasi,
                nama_informasi,
                isi_informasi,
                file
        FROM informasi
        ");

        DB::unprepared('DROP VIEW IF EXISTS view_barang');
        DB::unprepared(
        "CREATE VIEW view_barang AS
            SELECT
                id_barang,
                nama_barang,
                harga_barang,
                stok_barang,
                pembayaran_sewabarang,
                file
        FROM barang
        ");

        DB::unprepared('DROP VIEW IF EXISTS view_staffticketing');
        DB::unprepared(
        "CREATE VIEW view_staffticketing AS
            SELECT
                id_ticket,
                jumlah_ticket,
                harga_ticket,
                pembayaran_ticket,
                file
        FROM ticket
        ");

        DB::unprepared('DROP VIEW IF EXISTS view_akomodasi');
        DB::unprepared(
        "CREATE VIEW view_akomodasi AS
            SELECT
                id_akomodasi,
                nama_akomodasi,
                isi_akomodasi,
                file
        FROM akomodasi
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
