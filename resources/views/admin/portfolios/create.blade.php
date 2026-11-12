@extends('admin.layouts.app')

@section('title', 'Tambah Portofolio & Proyek Nyata')
@section('page-title', 'Tambah Portofolio & Proyek Nyata Baru')

@section('content')
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-8">
    <p class="text-muted" style="font-size: 14px; margin-top: -10px;">
      Tambahkan hasil proyek nyata solusi digital, website, atau instalasi IT yang telah sukses dikerjakan NazwaGraha.
    </p>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-default">
      <i class="fa fa-arrow-left fa-fw"></i> Kembali ke Daftar
    </a>
  </div>
</div>

<form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" id="portfolioForm">
  @csrf

  <div class="row">
    <!-- Left Column: Form Fields -->
    <div class="col-lg-8 col-md-7">
      <div class="panel panel-default" style="border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 16px 20px; font-weight: 800; font-size: 16px; color: #0f172a;">
          <i class="fa fa-pencil-square-o text-primary fa-fw"></i> Rincian Proyek Portofolio
        </div>
        <div class="panel-body" style="padding: 24px;">

          <!-- Title -->
          <div class="form-group @error('title') has-error @enderror">
            <label for="title" style="font-weight: 700; color: #1e293b;">
              Nama Proyek / Perusahaan Klien <span class="text-danger">*</span>
            </label>
            <input type="text" id="title" name="title" class="form-control input-lg" 
              placeholder="Contoh: PT Samudera Logistik Prima" 
              value="{{ old('title') }}" required autofocus oninput="updateLivePreview()">
            @error('title')
              <span class="help-block">{{ $message }}</span>
            @enderror
            <span class="text-muted" style="font-size: 12px;">Nama perusahaan, instansi, atau brand klien yang dikerjakan.</span>
          </div>

          <!-- Slug -->
          <div class="form-group @error('slug') has-error @enderror">
            <label for="slug" style="font-weight: 700; color: #1e293b;">
              Slug URL (Otomatis)
            </label>
            <div class="input-group">
              <span class="input-group-addon" style="background: #f8fafc; font-size: 12px;">portofolio/</span>
              <input type="text" id="slug" name="slug" class="form-control" 
                placeholder="pt-samudera-logistik-prima" 
                value="{{ old('slug') }}">
            </div>
            @error('slug')
              <span class="help-block">{{ $message }}</span>
            @enderror
            <span class="text-muted" style="font-size: 12px;">Biarkan kosong untuk membuat slug otomatis dari judul proyek.</span>
          </div>

          <!-- Category -->
          <div class="form-group @error('category') has-error @enderror">
            <label for="category" style="font-weight: 700; color: #1e293b;">
              Kategori Proyek / Tagline Layanan <span class="text-danger">*</span>
            </label>
            <input type="text" id="category" name="category" class="form-control" 
              placeholder="Contoh: WEBSITE COMPANY PROFILE KORPORAT" 
              value="{{ old('category') }}" required oninput="updateLivePreview()">
            @error('category')
              <span class="help-block">{{ $message }}</span>
            @enderror

            <!-- Preset Buttons -->
            <div style="margin-top: 8px;">
              <small class="text-muted" style="display: block; margin-bottom: 6px; font-weight: 600;">Klik untuk pilih kategori cepat:</small>
              <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                @foreach($presetCategories as $preset)
                  <button type="button" class="btn btn-xs btn-default" onclick="setCategory('{{ $preset }}')" style="border-radius: 12px; font-size: 11px;">
                    + {{ $preset }}
                  </button>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Description -->
          <div class="form-group @error('description') has-error @enderror">
            <label for="description" style="font-weight: 700; color: #1e293b;">
              Ringkasan Implementasi / Hasil Nyata <span class="text-danger">*</span>
            </label>
            <textarea id="description" name="description" class="form-control" rows="4" 
              placeholder="Jelaskan ringkas apa yang dikerjakan dan dampak positifnya, contoh: Website profil perusahaan logistik modern dengan fitur pelacakan armada cepat, katalog rute, dan kecepatan akses di bawah 1 detik." 
              required oninput="updateLivePreview()">{{ old('description') }}</textarea>
            @error('description')
              <span class="help-block">{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <!-- Client Name / Tag -->
            <div class="col-sm-6">
              <div class="form-group @error('client') has-error @enderror">
                <label for="client" style="font-weight: 700; color: #1e293b;">
                  Label Klien / Lokasi
                </label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker text-danger"></i></span>
                  <input type="text" id="client" name="client" class="form-control" 
                    placeholder="Klien NazwaGraha" 
                    value="{{ old('client', 'Klien NazwaGraha') }}" oninput="updateLivePreview()">
                </div>
                @error('client')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                <span class="text-muted" style="font-size: 12px;">Contoh: Klien NazwaGraha, Bogor Kota, Ciawi.</span>
              </div>
            </div>

            <!-- Badge (Optional) -->
            <div class="col-sm-6">
              <div class="form-group @error('badge') has-error @enderror">
                <label for="badge" style="font-weight: 700; color: #1e293b;">
                  Badge Pojok Foto (Opsional)
                </label>
                <input type="text" id="badge" name="badge" class="form-control" 
                  placeholder="Contoh: 100% Terverifikasi & Aktif" 
                  value="{{ old('badge') }}" oninput="updateLivePreview()">
                @error('badge')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                <span class="text-muted" style="font-size: 12px;">Muncul sebagai pita di pojok kanan atas gambar.</span>
              </div>
            </div>
          </div>

          <!-- Project URL / Link WhatsApp -->
          <div class="form-group @error('project_url') has-error @enderror">
            <label for="project_url" style="font-weight: 700; color: #1e293b;">
              Tautan Proyek / Demo / Layanan Terkait (Opsional)
            </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-link"></i></span>
              <input type="text" id="project_url" name="project_url" class="form-control" 
                placeholder="https://nazwagraha.com/jasa-pembuatan-website-murah" 
                value="{{ old('project_url') }}">
            </div>
            @error('project_url')
              <span class="help-block">{{ $message }}</span>
            @enderror
            <span class="text-muted" style="font-size: 12px;">Jika dikosongkan, tombol konsultasi akan langsung membuka chat WhatsApp otomatis.</span>
          </div>

          <!-- Image Upload & Preset -->
          <div class="form-group" style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 18px;">
            <label style="font-weight: 700; color: #1e293b; display: block; margin-bottom: 8px;">
              <i class="fa fa-image text-warning"></i> Foto Mockup / Screenshot Hasil Karya
            </label>
            
            <div class="row">
              <div class="col-sm-6">
                <label for="image_file" style="font-size: 13px; font-weight: 600; color: #475569;">
                  1. Upload Foto Baru dari Perangkat:
                </label>
                <input type="file" id="image_file" name="image_file" class="form-control" accept="image/*" onchange="previewUploadedImage(this)">
                <small class="text-muted">Format didukung: WEBP, PNG, JPG (Maks. 5MB). Rasio terbaik: 16:9.</small>
              </div>

              <div class="col-sm-6">
                <label for="image_url" style="font-size: 13px; font-weight: 600; color: #475569;">
                  2. Atau Pilih Gambar Sampel Tersedia:
                </label>
                <select id="image_url" name="image_url" class="form-control" onchange="selectSampleImage(this.value)">
                  <option value="">-- Pilih Mockup Bawaan --</option>
                  @foreach($sampleImages as $path => $label)
                    <option value="{{ $path }}">{{ $label }}</option>
                  @endforeach
                </select>
                <small class="text-muted">Gunakan gambar preset jika belum memiliki screenshot khusus.</small>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Right Column: Settings & Live Preview -->
    <div class="col-lg-4 col-md-5">
      <!-- Publish Box -->
      <div class="panel panel-default" style="border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 14px 20px; font-weight: 700; color: #0f172a;">
          <i class="fa fa-sliders text-success fa-fw"></i> Pengaturan Publikasi
        </div>
        <div class="panel-body" style="padding: 20px;">
          <!-- Sort Order -->
          <div class="form-group">
            <label for="sort_order" style="font-weight: 700; color: #1e293b;">
              Urutan Penayangan
            </label>
            <input type="number" id="sort_order" name="sort_order" class="form-control" 
              value="{{ old('sort_order', $nextSortOrder) }}" min="1">
            <span class="text-muted" style="font-size: 12px;">Angka lebih kecil tampil lebih awal (kiri atas).</span>
          </div>

          <!-- Active Toggle -->
          <div class="checkbox" style="margin-top: 15px; margin-bottom: 20px;">
            <label style="font-weight: 700; color: #0f172a;">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
              Tayangkan di Halaman Depan Web (Aktif)
            </label>
            <p class="text-muted" style="font-size: 12px; margin-left: 20px; margin-top: 3px;">
              Jika tidak dicentang, portofolio akan disimpan sebagai draft tersembunyi.
            </p>
          </div>

          <hr style="margin: 15px 0;">

          <!-- Submit Buttons -->
          <button type="submit" class="btn btn-orange btn-block btn-lg" style="font-weight: 800; border-radius: 8px;">
            <i class="fa fa-save fa-fw"></i> Simpan Portofolio
          </button>
          <a href="{{ route('admin.portfolios.index') }}" class="btn btn-default btn-block" style="margin-top: 8px; border-radius: 8px;">
            Batal
          </a>
        </div>
      </div>

      <!-- Live Interactive Card Preview -->
      <div class="panel panel-default" style="border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 12px 18px; font-weight: 700; font-size: 13px; color: #0f172a;">
          <i class="fa fa-eye text-primary fa-fw"></i> Live Preview Card (Tampilan Publik)
        </div>
        <div class="panel-body" style="background: #f8fafc; padding: 18px;">
          <!-- Front-End Card Replica -->
          <div style="background: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 6px 20px rgba(0,0,0,0.06);">
            <div style="height: 180px; overflow: hidden; position: relative; background: #e2e8f0;">
              <img id="previewImg" src="{{ asset('assets/images/portfolio-1.webp') }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
              <span id="previewBadge" style="position: absolute; top: 12px; right: 12px; background: rgba(16, 24, 40, 0.85); color: #ff9a4b; font-size: 11px; font-weight: 800; padding: 3px 9px; border-radius: 20px; display: none;">
                Badge
              </span>
            </div>
            <div style="padding: 18px 20px;">
              <span id="previewCategory" style="font-size: 10px; font-weight: 800; letter-spacing: 0.6px; color: #f47712; text-transform: uppercase; display: block; margin-bottom: 6px;">
                WEBSITE COMPANY PROFILE KORPORAT
              </span>
              <h4 id="previewTitle" style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 8px; line-height: 1.35;">
                Nama Proyek Klien
              </h4>
              <p id="previewDesc" style="font-size: 12px; color: #64748b; line-height: 1.6; margin: 0 0 16px;">
                Deskripsi ringkas hasil kerja dan efisiensi yang dicapai oleh klien...
              </p>
              <div style="border-top: 1px solid #f1f5f9; padding-top: 12px; display: flex; align-items: center; justify-content: space-between; font-size: 11.5px;">
                <span id="previewClient" style="color: #475569; font-weight: 600;">📍 Klien NazwaGraha</span>
                <span style="color: #f47712; font-weight: 700;">Konsultasi Serupa →</span>
              </div>
            </div>
          </div>
          <small class="text-muted" style="display: block; text-align: center; margin-top: 12px; font-size: 11px;">
            Preview otomatis terupdate saat Anda mengetik.
          </small>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection

@section('scripts')
<script>
  function setCategory(value) {
    document.getElementById('category').value = value;
    updateLivePreview();
  }

  function selectSampleImage(val) {
    if (val) {
      document.getElementById('previewImg').src = "{{ asset('') }}" + val;
    }
  }

  function previewUploadedImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImg').src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  function updateLivePreview() {
    var title = document.getElementById('title').value || 'Nama Proyek Klien';
    var category = document.getElementById('category').value || 'KATEGORI PROYEK';
    var desc = document.getElementById('description').value || 'Deskripsi ringkas hasil kerja dan efisiensi yang dicapai...';
    var client = document.getElementById('client').value || 'Klien NazwaGraha';
    var badge = document.getElementById('badge').value;

    document.getElementById('previewTitle').textContent = title;
    document.getElementById('previewCategory').textContent = category;
    document.getElementById('previewDesc').textContent = desc;
    document.getElementById('previewClient').textContent = '📍 ' + client;

    var badgeEl = document.getElementById('previewBadge');
    if (badge && badge.trim() !== '') {
      badgeEl.textContent = badge;
      badgeEl.style.display = 'block';
    } else {
      badgeEl.style.display = 'none';
    }

    // Auto generate slug if slug is untouched
    var slugInput = document.getElementById('slug');
    if (!slugInput.dataset.manual) {
      slugInput.value = title.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
    }
  }

  document.getElementById('slug').addEventListener('input', function() {
    this.dataset.manual = 'true';
  });
</script>
@endsection
