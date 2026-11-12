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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('title');
            $table->string('focus_keyword')->nullable()->after('meta_title');
            $table->string('geo_target')->default('Bogor, Ciawi, Jawa Barat')->after('focus_keyword');
            $table->text('meta_description')->nullable()->after('excerpt');
            $table->string('reading_time')->default('5 Menit')->after('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'focus_keyword',
                'geo_target',
                'meta_description',
                'reading_time',
            ]);
        });
    }
};
