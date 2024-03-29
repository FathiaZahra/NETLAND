<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS CreateBarang");
        DB::unprepared("
        CREATE PROCEDURE CreateBarang(
            IN new_nama_barang VARCHAR(60),
            IN new_harga_barang DECIMAL,
            IN new_stok_barang INT,
            IN new_pembayaran_sewabarang INT,
            IN new_file TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO barang (nama_barang, harga_barang, stok_barang, pembayaran_sewabarang, file)
            VALUES (new_nama_barang, new_harga_barang, new_stok_barang, new_pembayaran_sewabarang, new_file); 

            IF pesan_error != '00000' THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END
    ");

    DB::unprepared("DROP PROCEDURE IF EXISTS CreateTicket");
    DB::unprepared("
        CREATE PROCEDURE CreateTicket(
            IN new_tanggal_pemesanan DATE,
            IN new_jumlah_ticket INT,
            IN new_harga_ticket DECIMAL,
            IN new_pembayaran_ticket INT,
            IN new_file TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO ticket (tanggal_pemesanan, jumlah_ticket, harga_ticket, pembayaran_ticket, file)
            VALUES (new_tanggal_pemesanan, new_jumlah_ticket, new_harga_ticket, new_pembayaran_ticket, new_file); 

            IF pesan_error != '00000' THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END
    ");

    DB::unprepared("DROP PROCEDURE IF EXISTS CreateInformasi");
    DB::unprepared("
        CREATE PROCEDURE CreateInformasi(
            IN new_nama_informasi VARCHAR(60),
            IN new_isi_informasi TEXT,
            IN new_file TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO informasi (nama_informasi, isi_informasi, file)
            VALUES (new_nama_informasi, new_isi_informasi, new_file); 

            IF pesan_error != '00000' THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END
    ");

    DB::unprepared("DROP PROCEDURE IF EXISTS CreateAkomodasi");
    DB::unprepared("
        CREATE PROCEDURE CreateAkomodasi(
            IN new_nama_akomodasi VARCHAR(60),
            IN new_isi_akomodasi VARCHAR(60),
            IN new_file TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO akomodasi (nama_akomodasi, isi_akomodasi, file)
            VALUES (new_nama_akomodasi, new_isi_akomodasi, new_file); 

            IF pesan_error != '00000' THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END
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
