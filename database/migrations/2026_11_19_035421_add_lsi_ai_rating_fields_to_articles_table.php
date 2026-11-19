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
            if (! Schema::hasColumn('articles', 'secondary_keywords')) {
                $table->text('secondary_keywords')->nullable()->after('focus_keyword');
            }
            if (! Schema::hasColumn('articles', 'lsi_keywords')) {
                $table->text('lsi_keywords')->nullable()->after('secondary_keywords');
            }
            if (! Schema::hasColumn('articles', 'ai_summary')) {
                $table->text('ai_summary')->nullable()->after('meta_description');
            }
            if (! Schema::hasColumn('articles', 'rating_value')) {
                $table->decimal('rating_value', 2, 1)->nullable()->default(5.0)->after('reading_time');
            }
            if (! Schema::hasColumn('articles', 'review_count')) {
                $table->unsignedInteger('review_count')->nullable()->default(48)->after('rating_value');
            }
            if (! Schema::hasColumn('articles', 'faqs')) {
                $table->json('faqs')->nullable()->after('content');
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
                'secondary_keywords',
                'lsi_keywords',
                'ai_summary',
                'rating_value',
                'review_count',
                'faqs',
            ]);
        });
    }
};
