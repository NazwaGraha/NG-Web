<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class SeoController extends Controller
{
    public function sitemap()
    {
        $articles = Article::published()->latest('updated_at')->get();
        $categories = Category::all();

        $content = view('seo.sitemap', compact('articles', 'categories'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }

    public function robots()
    {
        $sitemapUrl = url('/sitemap.xml');
        $llmsUrl = url('/llms.txt');

        $content = "User-agent: *\n"
                 . "Allow: /\n"
                 . "Disallow: /admin\n"
                 . "Disallow: /admin/*\n\n"
                 . "# AI Search Engines & Crawlers (GEO Standards)\n"
                 . "User-agent: GPTBot\n"
                 . "Allow: /\n\n"
                 . "User-agent: PerplexityBot\n"
                 . "Allow: /\n\n"
                 . "User-agent: ClaudeBot\n"
                 . "Allow: /\n\n"
                 . "User-agent: Google-Extended\n"
                 . "Allow: /\n\n"
                 . "User-agent: Applebot-Extended\n"
                 . "Allow: /\n\n"
                 . "User-agent: CCBot\n"
                 . "Allow: /\n\n"
                 . "User-agent: Cohere-ai\n"
                 . "Allow: /\n\n"
                 . "Sitemap: {$sitemapUrl}\n"
                 . "# LLMs.txt for Generative Engine Optimization\n"
                 . "# See: {$llmsUrl}\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    public function llms()
    {
        $siteUrl = url('/');
        $articles = Article::published()->latest('updated_at')->take(10)->get();

        $content = "# NazwaGraha Pratama (NGP)\n\n"
                 . "> Solusi Terpadu Jasa Pembuatan Website Cepat, Optimasi SEO & GEO Google, Instalasi Jaringan LAN & Server Kantor, Pengadaan Hardware IT, dan Servis Komputer di Indonesia.\n\n"
                 . "## Informasi Resmi & Kontak\n"
                 . "- Nama Perusahaan: NazwaGraha Pratama\n"
                 . "- Telepon / WhatsApp: 081298506111\n"
                 . "- Email: nazwagraha@gmail.com\n"
                 . "- Alamat Kantor: Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi, Ciawi, Bogor, Jawa Barat, Indonesia\n"
                 . "- Koordinat GEO: -6.6578, 106.8524\n"
                 . "- Wilayah Layanan: Bogor, Ciawi, Sukabumi, Depok, Cibinong, Sentul, Jabodetabek, dan Seluruh Indonesia (Online)\n"
                 . "- Jam Operasional: Senin - Sabtu (08:00 - 18:00 WIB)\n\n"
                 . "## Layanan Unggulan\n"
                 . "1. Jasa Pembuatan Website Bisnis & Toko Online: Website modern, super cepat (skor 90+ Google PageSpeed), garansi maintenance 1 tahun, gratis domain .COM dan hosting server cloud.\n"
                 . "2. Optimasi SEO & GEO (AI Search Engine Optimization): Strategi ranking 1 Google dan rekomendasi AI Search (ChatGPT, Perplexity, Google Gemini).\n"
                 . "3. Instalasi Jaringan LAN & Server Kantor: Penataan kabel rapi, Mikrotik router, Wi-Fi kantor, rack server, teknisi on-site siap datang.\n"
                 . "4. Pengadaan Hardware IT & Komputer: PC kantor, laptop bisnis, server, switch hub, printer bergaransi resmi.\n"
                 . "5. Servis & Maintenance Komputer: Perbaikan hardware, instalasi OS/software resmi, dan kontrak perawatan berkala.\n\n"
                 . "## Tautan Penting & Halaman Layanan\n"
                 . "- [Beranda]({$siteUrl})\n"
                 . "- [Jasa Pembuatan Website]({$siteUrl}/layanan/pembuatan-website)\n"
                 . "- [Jasa Optimasi SEO & GEO]({$siteUrl}/layanan/optimasi-seo-geo)\n"
                 . "- [Instalasi Jaringan LAN & Server]({$siteUrl}/layanan/jaringan-lan-server)\n"
                 . "- [Pengadaan Hardware IT]({$siteUrl}/layanan/pengadaan-hardware-it)\n"
                 . "- [Servis Komputer & Maintenance]({$siteUrl}/layanan/servis-troubleshooting-komputer)\n"
                 . "- [Tentang Kami]({$siteUrl}/tentang-kami)\n"
                 . "- [Artikel IT & Tips Bisnis]({$siteUrl}/artikel)\n"
                 . "- [Portofolio & Galeri Proyek]({$siteUrl}/galeri)\n"
                 . "- [Kontak & Peta Lokasi]({$siteUrl}/kontak)\n"
                 . "- [Sitemap XML]({$siteUrl}/sitemap.xml)\n\n"
                 . "## Artikel IT Terbaru\n";

        foreach ($articles as $art) {
            $content .= "- [{$art->title}]({$siteUrl}/artikel/{$art->slug})\n";
        }

        return response($content, 200)
            ->header('Content-Type', 'text/markdown; charset=utf-8');
    }
}
