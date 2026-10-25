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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('target_badge')->nullable(); // e.g. "UMKM & BISNIS BARU"
            $table->string('tagline')->nullable(); // e.g. "Untuk Profil Usaha, Kantor Jasa, & Lembaga"
            $table->string('original_price')->nullable(); // e.g. "Rp 3.500.000" or note
            $table->string('price_prefix')->nullable(); // e.g. "Mulai"
            $table->string('price'); // e.g. "Rp 1.950.000" or "Custom / Nego"
            $table->string('discount_tag')->nullable(); // e.g. "Hemat 45% Bulan Ini"
            $table->json('features')->nullable(); // array of bullet features
            $table->string('cta_text')->nullable()->default('Pesan Paket Sekarang →');
            $table->text('cta_whatsapp_text')->nullable();
            $table->boolean('is_popular')->default(false); // Best seller highlight
            $table->string('popular_badge_text')->nullable()->default('★ BEST SELLER & REKOMENDASI');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
