@extends('admin.layouts.app')

@section('title', 'Konten Sub-Menu: ' . $currentPage->service_title)
@section('page-title', 'Pengaturan Konten Sub-Menu Layanan')

@section('content')
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-12">
    <p class="text-muted" style="font-size: 14px; margin-top: -10px;">
      Kelola rincian isi teks headline, 3 paket harga &amp; fitur, tabel komparasi, FAQ, serta metadata SEO untuk setiap halaman sub-menu publik.
    </p>
  </div>
</div>

<!-- Bilah Tab Pemilih 5 Layanan (Top Service Selector Tabs - Sesuai Mockup) -->
<div class="row" style="margin-bottom: 22px;">
  <div class="col-lg-12">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 10px 14px; display: flex; flex-wrap: wrap; gap: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
      @php
        $icons = [
          'jasa-pembuatan-website-murah' => '🌐',
          'jasa-seo-murah' => '🚀',
          'instalasi-jaringan-lan' => '🔌',
          'pengadaan-komputer' => '💻',
          'konsultan-it-maintenance' => '🛠️',
        ];
      @endphp
      @foreach($servicePages as $page)
        @php
          $isSelected = $page->id === $currentPage->id;
          $icon = $icons[$page->slug] ?? '★';
        @endphp
        <a href="{{ route('admin.service-pages.index', ['slug' => $page->slug]) }}" 
           class="btn {{ $isSelected ? 'btn-orange' : 'btn-default' }}" 
           style="border-radius: 10px; font-weight: 700; font-size: 13px; padding: 9px 16px; transition: all 0.2s ease;">
          <span style="font-size: 15px; margin-right: 4px;">{{ $icon }}</span>
          {{ $page->service_title }}
          @if($page->is_active)
            <span class="badge" style="background: {{ $isSelected ? '#ffffff' : '#16a34a' }}; color: {{ $isSelected ? 'var(--admin-orange)' : '#ffffff' }}; font-size: 10px; margin-left: 6px;">Aktif</span>
          @else
            <span class="badge" style="background: #64748b; color: #fff; font-size: 10px; margin-left: 6px;">Draft</span>
          @endif
        </a>
      @endforeach
    </div>
  </div>
</div>

<!-- Header Aksi & Status Bar (Sesuai Mockup) -->
<div class="row" style="margin-bottom: 24px;">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-radius: 12px; background: #ffffff; border: 1px solid #e2e8f0; padding: 16px 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
      <div style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap;">
        <span style="font-weight: 800; font-size: 16px; color: #0f172a;">
          Sedang Mengedit: <span style="color: var(--admin-orange);">{{ $currentPage->service_title }}</span>
        </span>
        
        @if($currentPage->is_active)
          <span class="label label-success" style="font-size: 12px; padding: 6px 14px; border-radius: 20px; background: #16a34a;">
            <i class="fa fa-check-circle"></i> Status Halaman: AKTIF (Tayang di Publik)
          </span>
          <form action="{{ route('admin.service-pages.toggle', $currentPage->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-xs btn-default text-danger" style="border-radius: 12px; padding: 3px 12px; font-weight: 700; font-size: 11.5px;" onclick="return confirm('Nonaktifkan halaman sub-menu ini dari publik?');">
              <i class="fa fa-eye-slash"></i> Nonaktifkan
            </button>
          </form>
        @else
          <span class="label label-default" style="font-size: 12px; padding: 6px 14px; border-radius: 20px; background: #64748b;">
            <i class="fa fa-eye-slash"></i> Status Halaman: NONAKTIF (Disembunyikan)
          </span>
          <form action="{{ route('admin.service-pages.toggle', $currentPage->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-xs btn-success" style="border-radius: 12px; padding: 3px 12px; font-weight: 700; font-size: 11.5px; background: #16a34a; border-color: #16a34a;">
              <i class="fa fa-check"></i> Aktifkan
            </button>
          </form>
        @endif
      </div>

      <div style="display: flex; gap: 10px; align-items: center;">
        <a href="{{ url('/' . $currentPage->slug) }}" target="_blank" class="btn btn-default" style="border-radius: 8px; font-weight: 600;">
          <i class="fa fa-external-link fa-fw"></i> Lihat Halaman Publik ↗
        </a>
        <button type="button" onclick="document.getElementById('servicePageForm').submit();" class="btn btn-orange" style="border-radius: 8px; font-weight: 800; box-shadow: 0 4px 14px rgba(244,119,18,0.25);">
          <i class="fa fa-save fa-fw"></i> 💾 Simpan Semua Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

<form action="{{ route('admin.service-pages.update', $currentPage->id) }}" method="POST" id="servicePageForm">
  @csrf
  @method('PUT')

  {{-- Hidden Active Checkbox state --}}
  <input type="hidden" name="is_active" value="{{ $currentPage->is_active ? '1' : '0' }}">

  <!-- PANEL 1: BANNER HERO & HEADLINE UTAMA -->
  <div class="panel panel-default" style="border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 24px;">
    <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 18px 24px;">
      <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
        <i class="fa fa-desktop fa-fw text-primary"></i> 1. Banner Hero &amp; Headline Utama
      </div>
    </div>
    <div class="panel-body" style="padding: 24px;">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label style="font-weight: 700; color: #1e293b;">Nama Layanan Sub-Menu <span class="text-danger">*</span></label>
            <input type="text" name="service_title" class="form-control" value="{{ old('service_title', $currentPage->service_title) }}" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label style="font-weight: 700; color: #1e293b;">Teks Eyebrow (Teks Kecil di Atas Judul)</label>
            <input type="text" name="eyebrow" class="form-control" value="{{ old('eyebrow', $currentPage->eyebrow) }}" placeholder="Contoh: JASA PEMBUATAN WEBSITE MURAH BOGOR">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label style="font-weight: 700; color: #1e293b;">Judul Utama H1 (Hero Title) <span class="text-danger">*</span></label>
        <input type="text" name="hero_h1" class="form-control input-lg" value="{{ old('hero_h1', $currentPage->hero_h1) }}" required>
      </div>

      <div class="form-group">
        <label style="font-weight: 700; color: #1e293b;">Subjudul / Paragraf Penjelas (Lead Text) <span class="text-danger">*</span></label>
        <textarea name="hero_lead" class="form-control" rows="3" required>{{ old('hero_lead', $currentPage->hero_lead) }}</textarea>
      </div>

      <div class="form-group">
        <label style="font-weight: 700; color: #1e293b;">Badge Kepercayaan Hero (1 Baris = 1 Badge)</label>
        <textarea name="hero_badges_text" class="form-control" rows="3" placeholder="PageSpeed 95+&#10;Gratis Domain & SSL&#10;Garansi Revisi">{{ old('hero_badges_text', is_array($currentPage->hero_badges) ? implode("\n", $currentPage->hero_badges) : '') }}</textarea>
        <small class="text-muted">Badge ini akan tampil sebagai pill kecil di bagian atas banner hero.</small>
      </div>
    </div>
  </div>

  <!-- PANEL 2: PENGATURAN 4 PILIHAN PAKET HARGA & FITUR (PRICING PACKAGES) -->
  <div class="panel panel-default" style="border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 24px;">
    <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
      <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
        <i class="fa fa-tags fa-fw text-warning"></i> 2. Pengaturan 4 Paket Harga &amp; Fitur (Pricing Packages)
      </div>
      <div>
        <span class="badge" style="background: #0284c7; font-size: 12px; padding: 6px 12px; border-radius: 20px;">
          <i class="fa fa-th-large"></i> 4 Pilihan Paket (Sesuai Desain Publik)
        </span>
      </div>
    </div>
    <div class="panel-body" style="padding: 24px; background: #f8fafc;">
      <div class="row">
        @php
          $packages = is_array($currentPage->pricing_packages) ? $currentPage->pricing_packages : [];
          while (count($packages) < 4) {
            $packages[] = [
              'id' => 'pkg-' . (count($packages) + 1),
              'name' => '',
              'badge' => '',
              'target_audience' => '',
              'price' => '',
              'strike_price' => '',
              'duration' => '',
              'cta_text' => 'Pesan Sekarang ➔',
              'is_popular' => false,
              'features' => [],
            ];
          }
          $colClass = 'col-lg-3 col-md-6 col-sm-12';
        @endphp

        @foreach($packages as $idx => $pkg)
          @php
            $isPop = !empty($pkg['is_popular']) || (!empty($pkg['badge']) && (str_contains(strtolower($pkg['badge']), 'populer') || str_contains(strtolower($pkg['badge']), 'laris') || str_contains(strtolower($pkg['badge']), 'best seller')));
          @endphp
          <div class="{{ $colClass }}" style="margin-bottom: 20px;">
            <div class="panel panel-default" style="border-radius: 12px; border: 2px solid {{ $isPop ? 'var(--admin-orange)' : '#cbd5e1' }}; background: #ffffff; padding: 18px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); height: 100%; display: flex; flex-direction: column;">
              <input type="hidden" name="packages[{{ $idx }}][id]" value="{{ $pkg['id'] ?? ('pkg-' . ($idx + 1)) }}">

              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                <span class="badge" style="background: #0f172a; font-size: 11px;">Paket #{{ $idx + 1 }}</span>
                @if($isPop)
                  <span class="label label-warning" style="background: var(--admin-orange); font-size: 11px;">🔥 Best Seller</span>
                @endif
              </div>

              <div class="form-group" style="margin-bottom: 10px;">
                <label style="font-size: 11px; font-weight: 700; color: #475569;">Nama Paket <span class="text-danger">*</span></label>
                <input type="text" name="packages[{{ $idx }}][name]" class="form-control input-sm" value="{{ $pkg['name'] ?? '' }}" placeholder="Contoh: Paket Landing Page Promo" {{ $idx === 0 ? 'required' : '' }}>
              </div>

              <div class="form-group" style="margin-bottom: 10px;">
                <label style="font-size: 11px; font-weight: 700; color: #475569;">Badge Label Atas</label>
                <input type="text" name="packages[{{ $idx }}][badge]" class="form-control input-sm" value="{{ $pkg['badge'] ?? '' }}" placeholder="Contoh: ⚡ Hemat & Cepat">
              </div>

              <div class="form-group" style="margin-bottom: 10px;">
                <label style="font-size: 11px; font-weight: 700; color: #475569;">Target Pengguna / Subjudul</label>
                <textarea name="packages[{{ $idx }}][target_audience]" class="form-control input-sm" rows="2" placeholder="Ideal untuk produk tunggal...">{{ $pkg['target_audience'] ?? '' }}</textarea>
              </div>

              <div class="row" style="margin-left: -5px; margin-right: -5px; margin-bottom: 10px;">
                <div class="col-xs-6" style="padding-left: 5px; padding-right: 5px;">
                  <label style="font-size: 11px; font-weight: 700; color: #475569;">Harga Utama</label>
                  <input type="text" name="packages[{{ $idx }}][price]" class="form-control input-sm" value="{{ $pkg['price'] ?? '' }}" placeholder="Rp 499.000" style="font-weight: 800; color: #0f172a;">
                </div>
                <div class="col-xs-6" style="padding-left: 5px; padding-right: 5px;">
                  <label style="font-size: 11px; font-weight: 700; color: #475569;">Harga Coret</label>
                  <input type="text" name="packages[{{ $idx }}][strike_price]" class="form-control input-sm" value="{{ $pkg['strike_price'] ?? '' }}" placeholder="Rp 950.000">
                </div>
              </div>

              <div class="form-group" style="margin-bottom: 10px;">
                <label style="font-size: 11px; font-weight: 700; color: #475569;">Keterangan Biaya (Di Bawah Harga)</label>
                <input type="text" name="packages[{{ $idx }}][billing_cycle]" class="form-control input-sm" value="{{ $pkg['billing_cycle'] ?? 'Biaya pembuatan awal (Sudah termasuk domain & hosting 1 thn)' }}" placeholder="Biaya pembuatan awal (Sudah termasuk domain & hosting 1 thn)">
                <small class="text-muted" style="font-size: 10px;">Teks keterangan siklus/garansi biaya di bawah nominal harga.</small>
              </div>

              <div class="row" style="margin-left: -5px; margin-right: -5px; margin-bottom: 10px;">
                <div class="col-xs-6" style="padding-left: 5px; padding-right: 5px;">
                  <label style="font-size: 11px; font-weight: 700; color: #475569;">Estimasi Waktu</label>
                  <input type="text" name="packages[{{ $idx }}][duration]" class="form-control input-sm" value="{{ $pkg['duration'] ?? '' }}" placeholder="2 - 3 Hari Kerja">
                </div>
                <div class="col-xs-6" style="padding-left: 5px; padding-right: 5px;">
                  <label style="font-size: 11px; font-weight: 700; color: #475569;">Teks Tombol CTA</label>
                  <input type="text" name="packages[{{ $idx }}][cta_text]" class="form-control input-sm" value="{{ $pkg['cta_text'] ?? 'Pesan Sekarang ➔' }}" placeholder="Pesan Sekarang ➔">
                </div>
              </div>

              <div class="form-group" style="margin-bottom: 10px;">
                <label style="font-size: 11px; font-weight: 700; color: #475569; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                  <input type="checkbox" name="packages[{{ $idx }}][is_popular]" value="1" {{ $isPop ? 'checked' : '' }}>
                  <span>Tandai sebagai Rekomendasi / Best Seller</span>
                </label>
              </div>

              <div class="form-group" style="margin-bottom: 0; flex-grow: 1;">
                <label style="font-size: 11px; font-weight: 700; color: #475569;">Checklist Fitur (1 Baris = 1 Fitur)</label>
                <textarea name="packages[{{ $idx }}][features_text]" class="form-control input-sm" rows="7" placeholder="1 Halaman Penjualan&#10;Desain Mobile-First&#10;Gratis Domain 1 Thn">{{ is_array($pkg['features'] ?? null) ? implode("\n", $pkg['features']) : '' }}</textarea>
                <small class="text-muted" style="font-size: 10.5px;">Setiap baris otomatis diberi centang (✓) di halaman publik.</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- PANEL 3: TABEL KOMPARASI KEUNGGULAN (NAZWAGRAHA VS LAINNYA) -->
  <div class="panel panel-default" style="border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 24px;">
    <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 18px 24px;">
      <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
        <i class="fa fa-balance-scale fa-fw text-success"></i> 3. Tabel Komparasi Keunggulan (NazwaGraha vs Layanan Lain)
      </div>
    </div>
    <div class="panel-body" style="padding: 24px;">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
          <thead style="background: #f8fafc;">
            <tr>
              <th style="width: 30%;">Aspek Layanan</th>
              <th style="width: 35%; color: #16a34a;">Keunggulan NazwaGraha (✓)</th>
              <th style="width: 35%; color: #dc2626;">Layanan Lain / Standar Pasar (✕)</th>
            </tr>
          </thead>
          <tbody>
            @php
              $comparisons = is_array($currentPage->comparison_data) ? $currentPage->comparison_data : [];
              while (count($comparisons) < 3) {
                $comparisons[] = ['feature' => '', 'nazwagraha' => '', 'others' => ''];
              }
            @endphp
            @foreach($comparisons as $cIdx => $cmp)
              <tr>
                <td>
                  <input type="text" name="comparison[{{ $cIdx }}][feature]" class="form-control input-sm" value="{{ $cmp['feature'] ?? '' }}" placeholder="Contoh: Kecepatan Loading">
                </td>
                <td>
                  <input type="text" name="comparison[{{ $cIdx }}][nazwagraha]" class="form-control input-sm" value="{{ $cmp['nazwagraha'] ?? '' }}" placeholder="Kelebihan NazwaGraha" style="border-color: #86efac;">
                </td>
                <td>
                  <input type="text" name="comparison[{{ $cIdx }}][others]" class="form-control input-sm" value="{{ $cmp['others'] ?? '' }}" placeholder="Kekurangan layanan lain">
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- PANEL 4: FAQ KHUSUS & METADATA SEO -->
  <div class="panel panel-default" style="border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 24px;">
    <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 18px 24px;">
      <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
        <i class="fa fa-search fa-fw text-info"></i> 4. FAQ Khusus &amp; Pengaturan SEO Metadata
      </div>
    </div>
    <div class="panel-body" style="padding: 24px;">
      <div class="row">
        {{-- SEO Meta Settings --}}
        <div class="col-md-6">
          <h4 style="font-weight: 800; font-size: 14px; color: #0f172a; margin-bottom: 14px; border-bottom: 2px solid #f1f5f9; padding-bottom: 6px;">
            🎯 Pengaturan SEO (Google Search)
          </h4>

          <div class="form-group">
            <label style="font-weight: 700; color: #1e293b;">Meta Title (Judul Tab &amp; Hasil Pencarian)</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $currentPage->meta_title) }}">
            <small class="text-muted">Judul ideal antara 50–60 karakter.</small>
          </div>

          <div class="form-group">
            <label style="font-weight: 700; color: #1e293b;">Focus Keyword Utama</label>
            <input type="text" name="focus_keyword" class="form-control" value="{{ old('focus_keyword', $currentPage->focus_keyword) }}" placeholder="Contoh: jasa pembuatan website murah">
          </div>

          <div class="form-group">
            <label style="font-weight: 700; color: #1e293b;">Meta Description (Deskripsi Cuplikan Google)</label>
            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $currentPage->meta_description) }}</textarea>
            <small class="text-muted">Deskripsi menarik antara 130–160 karakter untuk memancing klik calon pembeli.</small>
          </div>
        </div>

        {{-- FAQ Items --}}
        <div class="col-md-6">
          <h4 style="font-weight: 800; font-size: 14px; color: #0f172a; margin-bottom: 14px; border-bottom: 2px solid #f1f5f9; padding-bottom: 6px;">
            ❓ FAQ (Tanya Jawab Khusus Layanan Ini)
          </h4>

          @php
            $faqs = is_array($currentPage->faq_items) ? $currentPage->faq_items : [];
            while (count($faqs) < 2) {
              $faqs[] = ['question' => '', 'answer' => ''];
            }
          @endphp

          @foreach($faqs as $fIdx => $faq)
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px; margin-bottom: 12px;">
              <div class="form-group" style="margin-bottom: 8px;">
                <label style="font-size: 12px; font-weight: 700; color: #334155;">Pertanyaan #{{ $fIdx + 1 }}</label>
                <input type="text" name="faq_q[{{ $fIdx }}]" class="form-control input-sm" value="{{ $faq['question'] ?? '' }}" placeholder="Tuliskan pertanyaan...">
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label style="font-size: 12px; font-weight: 700; color: #334155;">Jawaban Singkat</label>
                <textarea name="faq_a[{{ $fIdx }}]" class="form-control input-sm" rows="2" placeholder="Tuliskan jawaban yang ramah dan solutif...">{{ $faq['answer'] ?? '' }}</textarea>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Submit Bar -->
  <div class="row" style="margin-bottom: 40px;">
    <div class="col-lg-12 text-right">
      <button type="submit" class="btn btn-orange btn-lg" style="box-shadow: 0 4px 16px rgba(244,119,18,0.3); font-weight: 800; padding: 12px 36px; border-radius: 50px;">
        <i class="fa fa-save fa-fw"></i> Simpan Seluruh Konten Halaman Ini
      </button>
    </div>
  </div>
</form>
@endsection
