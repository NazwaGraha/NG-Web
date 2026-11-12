@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru')
@section('page-title', 'Tambah Layanan Baru')

@section('content')
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-8">
    <p class="text-muted" style="font-size: 14px; margin-top: -10px;">
      Tambahkan jenis layanan baru untuk ditampilkan di section <strong>Layanan Kami</strong> pada Landing Page utama.
    </p>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{ route('admin.services.index') }}" class="btn btn-default">
      <i class="fa fa-arrow-left fa-fw"></i> Kembali ke Daftar Layanan
    </a>
  </div>
</div>

<div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
  <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 18px 24px;">
    <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
      <i class="fa fa-plus-circle fa-fw text-primary"></i> Formulir Tambah Layanan Baru
    </div>
  </div>

  <div class="panel-body" style="padding: 26px 28px;">
    @if ($errors->any())
      <div class="alert alert-danger" style="border-radius: 10px;">
        <strong>Perhatian!</strong> Mohon periksa kembali input berikut:
        <ul style="margin-top: 6px; padding-left: 20px;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.services.store') }}" method="POST">
      @csrf

      <div class="row">
        {{-- Left Column: Main Content --}}
        <div class="col-md-8">
          <div class="form-group">
            <label for="name" style="font-weight: 700; color: #1e293b;">Nama Layanan <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control input-lg" value="{{ old('name') }}" required placeholder="Contoh: Layanan Cloud Backup & Disaster Recovery">
          </div>

          <div class="form-group">
            <label for="slug" style="font-weight: 700; color: #1e293b;">Slug URL (Anchor ID)</label>
            <div class="input-group">
              <span class="input-group-addon">{{ url('/') }}/#</span>
              <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="cloud-backup-disaster-recovery">
            </div>
            <small class="text-muted">Biarkan kosong untuk membuat slug otomatis dari nama layanan.</small>
          </div>

          <div class="form-group">
            <label for="short_description" style="font-weight: 700; color: #1e293b;">Ringkasan Singkat (Tampil di Kartu Landing Page) <span class="text-danger">*</span></label>
            <textarea id="short_description" name="short_description" class="form-control" rows="3" required placeholder="Tuliskan 1–2 kalimat ringkasan yang memikat calon klien...">{{ old('short_description') }}</textarea>
          </div>

          <div class="form-group">
            <label for="features_text" style="font-weight: 700; color: #1e293b;">Poin-Poin Fitur &amp; Keunggulan (1 Baris = 1 Poin)</label>
            <textarea id="features_text" name="features_text" class="form-control" rows="6" placeholder="Pencadangan Otomatis Harian&#10;Enkripsi Data Standar Militer AES-256&#10;Pemulihan Cepat Saat Serangan Ransomware&#10;Dukungan Tim Teknis 24/7">{{ old('features_text') }}</textarea>
            <small class="text-muted">Poin-poin ini akan tampil sebagai daftar checklist (✓) pada kartu layanan di Landing Page.</small>
          </div>

          <div class="form-group">
            <label for="full_description" style="font-weight: 700; color: #1e293b;">Deskripsi Lengkap / Catatan Tambahan (Opsional)</label>
            <textarea id="full_description" name="full_description" class="form-control" rows="4" placeholder="Detail penjelasan teknis tambahan seputar layanan ini...">{{ old('full_description') }}</textarea>
          </div>
        </div>

        {{-- Right Column: Settings & Status --}}
        <div class="col-md-4">
          <!-- Status Box -->
          <div class="panel panel-default" style="border-radius: 10px; border: 1.5px solid #cbd5e1; background: #f8fafc; padding: 18px; margin-bottom: 20px;">
            <label style="font-size: 14px; font-weight: 800; color: #0f172a; margin-bottom: 12px; display: block;">
              <i class="fa fa-toggle-on text-primary"></i> Status Tampil di Web
            </label>

            <div class="radio" style="margin-bottom: 12px;">
              <label style="font-weight: 700; color: #166534; font-size: 13.5px;">
                <input type="radio" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                <span class="text-success"><i class="fa fa-check-circle"></i> AKTIF</span> — Tampilkan di Landing Page
              </label>
            </div>

            <div class="radio">
              <label style="font-weight: 700; color: #64748b; font-size: 13.5px;">
                <input type="radio" name="is_active" value="0" {{ old('is_active') === '0' ? 'checked' : '' }}>
                <span class="text-muted"><i class="fa fa-eye-slash"></i> NONAKTIF</span> — Sembunyikan Sementara
              </label>
            </div>
            <hr style="margin: 12px 0;">
            <small class="text-muted">Anda dapat mengubah status kapan saja dengan tombol saklar 1-klik di tabel daftar layanan.</small>
          </div>

          <!-- Price & Badge Box -->
          <div class="form-group">
            <label for="price_starting_from" style="font-weight: 700; color: #1e293b;">Keterangan Harga / Mulai Dari</label>
            <input type="text" id="price_starting_from" name="price_starting_from" class="form-control" value="{{ old('price_starting_from', 'Konsultasi Gratis') }}" placeholder="Contoh: Mulai Rp 499.000">
          </div>

          <div class="form-group">
            <label for="badge" style="font-weight: 700; color: #1e293b;">Badge Layanan (Pita Penanda)</label>
            <input type="text" id="badge" name="badge" class="form-control" value="{{ old('badge') }}" placeholder="Contoh: Terlaris, Solutif, Promo">
          </div>

          <div class="form-group">
            <label for="sort_order" style="font-weight: 700; color: #1e293b;">Urutan Tampilan (Sort Order)</label>
            <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $nextSortOrder) }}" min="1">
            <small class="text-muted">Angka lebih kecil tampil lebih awal di halaman depan.</small>
          </div>

          <!-- Icon Preview & SVG -->
          <div class="form-group">
            <label for="icon_svg" style="font-weight: 700; color: #1e293b;">Kode Ikon SVG</label>
            <textarea id="icon_svg" name="icon_svg" class="form-control" rows="3" style="font-family: monospace; font-size: 11px;">{{ old('icon_svg', '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="5" y="7" width="38" height="27" rx="3"/><path d="M16 41h16M24 34v7"/></svg>') }}</textarea>
            <small class="text-muted">Gunakan elemen SVG path 48x48 untuk visual yang tajam.</small>
          </div>
        </div>
      </div>

      <hr style="margin: 24px 0;">

      <div class="row">
        <div class="col-md-12 text-right">
          <a href="{{ route('admin.services.index') }}" class="btn btn-default" style="margin-right: 8px; min-width: 120px;">
            Batal
          </a>
          <button type="submit" class="btn btn-orange" style="min-width: 160px; box-shadow: 0 4px 12px rgba(244,119,18,0.25);">
            <i class="fa fa-save fa-fw"></i> Simpan Layanan Baru
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
