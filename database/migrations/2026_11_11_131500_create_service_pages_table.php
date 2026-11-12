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
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('service_title');
            $table->string('eyebrow')->nullable();
            $table->string('hero_h1');
            $table->text('hero_lead');
            $table->string('hero_image')->nullable();
            $table->json('hero_badges')->nullable();
            $table->json('pricing_packages')->nullable();
            $table->json('comparison_data')->nullable();
            $table->json('faq_items')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('focus_keyword')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pages');
    }
};
