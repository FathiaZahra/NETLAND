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
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalBarang');

        DB::unprepared('
        CREATE FUNCTION CountTotalBarang() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM barang;
            RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalTicket');

        DB::unprepared('
        CREATE FUNCTION CountTotalTicket() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM ticket;
            RETURN total;
        END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
