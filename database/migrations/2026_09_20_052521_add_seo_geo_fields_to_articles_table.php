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
            $table->string('featured_image_alt')->nullable()->after('featured_image');
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->string('geo_target_region')->nullable()->default('Bogor, Ciawi, Jabodetabek')->after('meta_keywords');
            $table->text('geo_summary')->nullable()->after('geo_target_region');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'featured_image_alt',
                'meta_keywords',
                'geo_target_region',
                'geo_summary',
            ]);
        });
    }
};
