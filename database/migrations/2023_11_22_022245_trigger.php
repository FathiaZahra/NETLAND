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
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS  insertBarang');
        DB::unprepared(
            'CREATE TRIGGER  insertBarang AFTER INSERT ON barang
            FOR EACH ROW
            BEGIN
                DECLARE aktor VARCHAR(200);
                SELECT username INTO aktor FROM akun WHERE id_akun = 3;

                INSERT INTO log (log)
                VALUES (CONCAT(
                    COALESCE(aktor, ""),
                    " menambahkan barang dengan nama ",
                    COALESCE(new.nama_barang, ""),
                    " pada tanggal ",
                    COALESCE(CURDATE(), "")
                ));
            END'
        );


        DB::unprepared('DROP TRIGGER IF EXISTS  insertTicket');
        DB::unprepared(
            'CREATE TRIGGER  insertTicket AFTER INSERT ON ticket
            FOR EACH ROW
            BEGIN
                DECLARE aktor VARCHAR(200);
                SELECT username INTO aktor FROM akun WHERE id_akun = 3;

                INSERT INTO log (log)
                VALUES (CONCAT(
                    COALESCE(aktor, ""),
                    " memesan tiket pada tanggal ",
                    COALESCE(new.tanggal_pemesanan, ""),
                    " dengan jumlah ",
                    COALESCE(new.jumlah_ticket, "")
                ));
            END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS  insertInformasi');
        DB::unprepared(
            'CREATE TRIGGER  insertInformasi AFTER INSERT ON informasi
            FOR EACH ROW
            BEGIN
                DECLARE aktor VARCHAR(200);
                SELECT username INTO aktor FROM akun WHERE id_akun = 3;

                INSERT INTO log (log)
                VALUES (CONCAT(
                    COALESCE(aktor, ""),
                    " menambah nama informasi ",
                    COALESCE(new.nama_informasi, "")
                ));
            END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS  insertAkomodasi');
        DB::unprepared(
            'CREATE TRIGGER  insertAkomodasi AFTER INSERT ON akomodasi
            FOR EACH ROW
            BEGIN
                DECLARE aktor VARCHAR(200);
                SELECT username INTO aktor FROM akun WHERE id_akun = 3;

                INSERT INTO log (log)
                VALUES (CONCAT(
                    COALESCE(aktor, ""),
                    " menambah judul akomodasi ",
                    COALESCE(new.nama_akomodasi, "")
                ));
            END'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DROP Trigger on Rollback
        DB::unprepared('DROP TRIGGER IF EXISTS insertBarang');
        DB::unprepared('DROP TRIGGER IF EXISTS insertTicket');
        DB::unprepared('DROP TRIGGER IF EXISTS insertInformasi');
        DB::unprepared('DROP TRIGGER IF EXISTS insertAkomodasi');
    }
};
