<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed initial admin user and default categories.
     */
    public function run(): void
    {
        // 1. Create Default Master Admin User
        $masterEmail = config('auth.master_admin.email', 'nazwagraha@gmail.com');
        $masterHash = config('auth.master_admin.password_hash', '$2y$10$DdPmbCK70TK2IdxVaaENs.AbXOStbIsrIwDEYNICb2fuQti.Q7yUi');

        User::updateOrCreate(
            ['email' => $masterEmail],
            [
                'name' => config('auth.master_admin.name', 'NazwaGraha Administrator'),
                'password' => $masterHash,
                'email_verified_at' => now(),
            ]
        );

        // 2. Create Initial Categories
        $categories = [
            [
                'name' => 'WEBSITE',
                'slug' => 'website',
                'description' => 'Artikel, tips dan panduan seputar jasa pembuatan website, company profile, dan toko online.',
            ],
            [
                'name' => 'SEO & DIGITAL',
                'slug' => 'seo-digital',
                'description' => 'Strategi SEO on-page, SEO lokal Google Maps, dan optimasi ranking 1 mesin pencari.',
            ],
            [
                'name' => 'INFRASTRUKTUR IT',
                'slug' => 'infrastruktur-it',
                'description' => 'Instalasi jaringan LAN kabel Cat6, konfigurasi Router Mikrotik, access point Wi-Fi, dan server rack.',
            ],
            [
                'name' => 'KONSULTAN IT',
                'slug' => 'konsultan-it',
                'description' => 'Konsultasi arsitektur IT, kontrak maintenance berkala, backup NAS cloud, dan penanganan insiden.',
            ],
            [
                'name' => 'HARDWARE PC',
                'slug' => 'hardware-pc',
                'description' => 'Pengadaan komputer PC kantor, laptop bisnis, pemilihan spesifikasi perangkat kerja, dan periferal.',
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
