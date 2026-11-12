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
            if (!Schema::hasColumn('articles', 'category')) {
                $table->string('category')->nullable()->default('Umum');
            }
            if (!Schema::hasColumn('articles', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('articles', 'author')) {
                $table->string('author')->default('Tim NazwaGraha');
            }
            if (!Schema::hasColumn('articles', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('articles', 'focus_keyword')) {
                $table->string('focus_keyword')->nullable();
            }
            if (!Schema::hasColumn('articles', 'geo_target')) {
                $table->string('geo_target')->default('Bogor, Ciawi, Jawa Barat');
            }
            if (!Schema::hasColumn('articles', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('articles', 'reading_time')) {
                $table->string('reading_time')->default('5 Menit');
            }
            if (!Schema::hasColumn('articles', 'image_alt')) {
                $table->string('image_alt')->nullable();
            }
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
