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
        if (Schema::hasTable('articles') && Schema::hasColumn('articles', 'category_id')) {
            try {
                DB::statement("ALTER TABLE `articles` MODIFY `category_id` BIGINT UNSIGNED NULL DEFAULT NULL");
            } catch (\Throwable $e) {
                // Fallback for drivers that don't support raw ALTER
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
