<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void

    {
        DB::statement(
            "
            CREATE OR REPLACE FUNCTION write_statistics_after_place_order()
                RETURNS trigger AS
                $$
                BEGIN
                    INSERT INTO statistics (date, product_id)
                    VALUES (now(), NEW.product_id);
                    RETURN NEW;
                END;
                $$
                LANGUAGE 'plpgsql';
            ");

        DB::statement("
            CREATE TRIGGER place_order_trigger
                AFTER INSERT
                ON order_products
                FOR ROW
                EXECUTE PROCEDURE write_statistics_after_place_order();");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TRIGGER `place_order_trigger`');
    }
};
