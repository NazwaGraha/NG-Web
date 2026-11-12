@extends('admin.layouts.app')

@section('title', 'Edit Layanan: ' . $service->name)
@section('page-title', 'Edit Layanan Unggulan')

@section('content')
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-8">
    <p class="text-muted" style="font-size: 14px; margin-top: -10px;">
      Edit rincian isi konten, harga, fitur, dan status tayang untuk layanan <strong>{{ $service->name }}</strong>.
    </p>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{ route('admin.services.index') }}" class="btn btn-default">
      <i class="fa fa-arrow-left fa-fw"></i> Kembali ke Daftar Layanan
    </a>
  </div>
</div>

<div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
  <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;">
    <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
      <i class="fa fa-pencil fa-fw text-primary"></i> Formulir Edit Konten Layanan
    </div>
    <div>
      @if($service->is_active)
        <span class="label label-success" style="font-size: 12px; padding: 6px 12px; border-radius: 20px;">
          <i class="fa fa-check-circle"></i> Status: AKTIF di Landing Page
        </span>
      @else
        <span class="label label-default" style="font-size: 12px; padding: 6px 12px; border-radius: 20px;">
          <i class="fa fa-eye-slash"></i> Status: NONAKTIF (Disembunyikan)
        </span>
      @endif
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

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        {{-- Left Column: Main Content --}}
        <div class="col-md-8">
          <div class="form-group">
            <label for="name" style="font-weight: 700; color: #1e293b;">Nama Layanan <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control input-lg" value="{{ old('name', $service->name) }}" required placeholder="Contoh: Jasa Pembuatan Website Murah">
          </div>

          <div class="form-group">
            <label for="slug" style="font-weight: 700; color: #1e293b;">Slug URL (Anchor ID) <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-addon">{{ url('/') }}/#</span>
              <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $service->slug) }}" required placeholder="jasa-pembuatan-website-murah">
            </div>
            <small class="text-muted">Slug digunakan sebagai identitas tautan di Landing Page.</small>
          </div>

          <div class="form-group">
            <label for="short_description" style="font-weight: 700; color: #1e293b;">Ringkasan Singkat (Tampil di Kartu Landing Page) <span class="text-danger">*</span></label>
            <textarea id="short_description" name="short_description" class="form-control" rows="3" required placeholder="Tuliskan 1–2 kalimat ringkasan yang menarik calon klien...">{{ old('short_description', $service->short_description) }}</textarea>
          </div>

          <div class="form-group">
            <label for="features_text" style="font-weight: 700; color: #1e293b;">Poin-Poin Fitur &amp; Keunggulan (1 Baris = 1 Poin)</label>
            <textarea id="features_text" name="features_text" class="form-control" rows="6" placeholder="Desain Modern & Mobile-First&#10;Skor 95+ di Google PageSpeed&#10;Gratis Domain & SSL Cepat&#10;Tombol WhatsApp & Call to Action">{{ old('features_text', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
            <small class="text-muted">Poin-poin ini akan tampil sebagai daftar checklist (✓) pada kartu layanan di Landing Page.</small>
          </div>

          <div class="form-group">
            <label for="full_description" style="font-weight: 700; color: #1e293b;">Deskripsi Lengkap / Catatan Tambahan (Opsional)</label>
            <textarea id="full_description" name="full_description" class="form-control" rows="4" placeholder="Detail penjelasan teknis tambahan seputar layanan ini...">{{ old('full_description', $service->full_description) }}</textarea>
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
                <input type="radio" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                <span class="text-success"><i class="fa fa-check-circle"></i> AKTIF</span> — Tampilkan di Landing Page
              </label>
            </div>

            <div class="radio">
              <label style="font-weight: 700; color: #64748b; font-size: 13.5px;">
                <input type="radio" name="is_active" value="0" {{ !old('is_active', $service->is_active) ? 'checked' : '' }}>
                <span class="text-muted"><i class="fa fa-eye-slash"></i> NONAKTIF</span> — Sembunyikan Sementara
              </label>
            </div>
            <hr style="margin: 12px 0;">
            <small class="text-muted">Layanan nonaktif tidak akan muncul bagi pengunjung web, namun data tetap tersimpan aman di database.</small>
          </div>

          <!-- Price & Badge Box -->
          <div class="form-group">
            <label for="price_starting_from" style="font-weight: 700; color: #1e293b;">Keterangan Harga / Mulai Dari</label>
            <input type="text" id="price_starting_from" name="price_starting_from" class="form-control" value="{{ old('price_starting_from', $service->price_starting_from) }}" placeholder="Contoh: Mulai Rp 499.000">
            <small class="text-muted">Teks harga yang tertera di kartu layanan.</small>
          </div>

          <div class="form-group">
            <label for="badge" style="font-weight: 700; color: #1e293b;">Badge Layanan (Pita Penanda)</label>
            <input type="text" id="badge" name="badge" class="form-control" value="{{ old('badge', $service->badge) }}" placeholder="Contoh: Terlaris, Target Ranking 1, Populer">
          </div>

          <div class="form-group">
            <label for="sort_order" style="font-weight: 700; color: #1e293b;">Urutan Tampilan (Sort Order)</label>
            <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}" min="1">
            <small class="text-muted">Angka lebih kecil tampil lebih awal (contoh: 1, 2, 3...)</small>
          </div>

          <!-- Icon Preview & SVG -->
          <div class="form-group">
            <label for="icon_svg" style="font-weight: 700; color: #1e293b;">Kode Ikon SVG</label>
            <div style="margin-bottom: 8px; display: flex; align-items: center; gap: 12px;">
              <div style="width: 44px; height: 44px; border-radius: 10px; background: #fff4eb; border: 1px solid #fed7aa; display: flex; align-items: center; justify-content: center; color: var(--admin-orange);">
                <div style="width: 24px; height: 24px;">
                  {!! $service->icon_svg !!}
                </div>
              </div>
              <span class="text-muted small">Pratinjau ikon saat ini</span>
            </div>
            <textarea id="icon_svg" name="icon_svg" class="form-control" rows="3" style="font-family: monospace; font-size: 11px;">{{ old('icon_svg', $service->icon_svg) }}</textarea>
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
            <i class="fa fa-save fa-fw"></i> Simpan Perubahan
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
