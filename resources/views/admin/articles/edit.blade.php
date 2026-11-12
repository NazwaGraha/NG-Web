@extends('admin.layouts.app')

@section('title', 'Edit Artikel: ' . $article->title)
@section('page-title', 'Edit Artikel')

@section('styles')
<!-- Summernote WYSIWYG Editor CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
  .note-editor.note-frame {
    border: 1px solid #cbd5e1 !important;
    border-radius: 8px !important;
    box-shadow: none !important;
  }
  .note-toolbar {
    background-color: #f8fafc !important;
    border-bottom: 1px solid #e2e8f0 !important;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    padding: 8px 10px !important;
  }
  .note-btn {
    background: #ffffff !important;
    border: 1px solid #cbd5e1 !important;
    color: #334155 !important;
    font-size: 12px !important;
    padding: 5px 9px !important;
  }
  .note-btn:hover {
    background: #f1f5f9 !important;
    border-color: #94a3b8 !important;
  }
  .note-editable {
    background: #ffffff !important;
    font-size: 15px;
    line-height: 1.8;
    color: #1e293b;
    min-height: 380px;
    padding: 18px 20px !important;
  }
  .schedule-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 14px;
    margin-top: 10px;
  }
  .thumbnail-preview-wrap {
    margin-top: 10px;
    border-radius: 8px;
    overflow: hidden;
    border: 2px dashed #cbd5e1;
    background: #f8fafc;
    padding: 6px;
    text-align: center;
    min-height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .thumbnail-preview-wrap img {
    max-height: 180px;
    width: auto;
    max-width: 100%;
    border-radius: 6px;
    object-fit: cover;
  }
  /* Image Popover Alignment Buttons */
  .note-popover .popover-content {
    padding: 6px 10px !important;
  }
  .note-popover .popover-content .btn {
    font-size: 12px !important;
    padding: 5px 9px !important;
    color: #334155 !important;
  }
  .note-popover .popover-content .btn.active,
  .note-popover .popover-content .btn:hover {
    background-color: #f47712 !important;
    color: #ffffff !important;
    border-color: #df6508 !important;
  }
  /* Active selected image visual cue */
  .note-editable img.summernote-active-img {
    outline: 3px solid #f47712 !important;
    outline-offset: 2px !important;
  }
  /* Support center alignment inside centered paragraphs */
  .note-editable p[style*="text-align: center"] img,
  .note-editable [style*="text-align:center"] img {
    margin-left: auto !important;
    margin-right: auto !important;
  }
</style>
@endsection

@section('content')
<form id="articleEditForm" action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="row">
    <!-- Main Content Column -->
    <div class="col-md-8">
      <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="font-weight: 700;">
          <i class="fa fa-pencil-square-o fa-fw"></i> Konten Utama Artikel
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label>Judul Artikel <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" class="form-control input-lg" required value="{{ old('title', $article->title) }}">
          </div>

          <div class="form-group">
            <label>Slug URL (Permalink)</label>
            <div class="input-group">
              <span class="input-group-addon">{{ url('/') }}/</span>
              <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $article->slug) }}">
            </div>
            <small class="text-muted">Slug URL menentukan tautan permanen artikel di hasil pencarian Google.</small>
          </div>

          <div class="form-group">
            <label>Ringkasan Singkat (Excerpt) <span class="text-danger">*</span></label>
            <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $article->excerpt) }}</textarea>
            <small class="text-muted">Maksimal 500 karakter untuk cuplikan pengantar kartu artikel.</small>
          </div>

          <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
              <label style="margin: 0;">Isi Konten Artikel Lengkap (Rich Text Editor) <span class="text-danger">*</span></label>
              <span class="label label-info" style="font-weight: normal; font-size: 11px;">Mendukung Heading, Gambar, Tabel, Link, Video & Kode HTML</span>
            </div>
            <textarea id="articleContent" name="content" class="form-control" rows="18" required>{{ old('content', $article->content) }}</textarea>
          </div>
        </div>
      </div>

      <!-- SEO & GEO Optimization Card -->
      <div class="panel panel-info" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="font-weight: 700;">
          <i class="fa fa-google fa-fw"></i> Optimasi SEO & GEO Targeting (Google Search)
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Focus Keyword Utama</label>
                <input type="text" name="focus_keyword" class="form-control" value="{{ old('focus_keyword', $article->focus_keyword) }}">
                <small class="text-muted">Target kata kunci dengan niat beli tinggi.</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Target Wilayah (GEO)</label>
                <input type="text" name="geo_target" class="form-control" value="{{ old('geo_target', $article->geo_target) }}">
                <small class="text-muted">Daerah yang ditargetkan untuk ranking lokal.</small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Meta Title Google (Maks 65 Karakter)</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $article->meta_title) }}">
          </div>

          <div class="form-group">
            <label>Meta Description Google (150–160 Karakter)</label>
            <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $article->meta_description) }}</textarea>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar Settings Column -->
    <div class="col-md-4">
      <!-- Publishing & Scheduling Box -->
      <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="font-weight: 700;">
          <i class="fa fa-calendar-check-o fa-fw"></i> Status & Penjadwalan Tayang
        </div>
        <div class="panel-body">
          @php
            $currentType = 'immediate';
            if (!$article->is_published) {
                $currentType = 'draft';
            } elseif ($article->isScheduled()) {
                $currentType = 'schedule';
            }
            $currentType = old('publish_type', $currentType);
          @endphp

          <div class="form-group">
            <label style="display: block; margin-bottom: 8px;">Opsi Publikasi:</label>
            
            <div class="radio" style="margin-top: 0;">
              <label style="font-weight: 600; color: #15803d;">
                <input type="radio" name="publish_type" id="pubImmediate" value="immediate" {{ $currentType === 'immediate' ? 'checked' : '' }} onchange="toggleScheduleOptions()">
                <i class="fa fa-globe fa-fw"></i> Terbitkan Sekarang (Live)
              </label>
            </div>

            <div class="radio">
              <label style="font-weight: 600; color: #0284c7;">
                <input type="radio" name="publish_type" id="pubSchedule" value="schedule" {{ $currentType === 'schedule' ? 'checked' : '' }} onchange="toggleScheduleOptions()">
                <i class="fa fa-clock-o fa-fw"></i> Jadwalkan Tayang (Scheduled)
              </label>
            </div>

            <div class="radio">
              <label style="font-weight: 600; color: #64748b;">
                <input type="radio" name="publish_type" id="pubDraft" value="draft" {{ $currentType === 'draft' ? 'checked' : '' }} onchange="toggleScheduleOptions()">
                <i class="fa fa-file-o fa-fw"></i> Simpan sebagai Draft (Belum Tayang)
              </label>
            </div>
          </div>

          <!-- Schedule Datetime Picker (conditionally shown) -->
          <div id="scheduleDatetimeBox" class="schedule-box" style="display: {{ $currentType === 'schedule' ? 'block' : 'none' }};">
            <label style="font-size: 12px; color: #0369a1;"><i class="fa fa-calendar"></i> Waktu Publikasi Otomatis:</label>
            @php
              $formattedDate = $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : now()->addDay()->format('Y-m-d\TH:i');
            @endphp
            <input type="datetime-local" id="published_at" name="published_at" class="form-control input-sm" value="{{ old('published_at', $formattedDate) }}">
            <small class="text-muted" style="display: block; margin-top: 5px;">
              <i class="fa fa-info-circle"></i> Artikel akan mulai tayang ke publik begitu tanggal & jam ini terlewati.
            </small>
          </div>

          <hr style="margin: 15px 0;">

          <button type="submit" class="btn btn-primary btn-block btn-lg" style="font-weight: 700;">
            <i class="fa fa-check-circle fa-fw"></i> Simpan Perubahan
          </button>
          <a href="{{ route('admin.articles.index') }}" class="btn btn-default btn-block" style="margin-top: 8px;">
            Batal & Kembali
          </a>
        </div>
      </div>

      <!-- Category & Author Info Box -->
      <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="font-weight: 700;">
          <i class="fa fa-tags fa-fw"></i> Kategori & Atribut
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label>Kategori Artikel <span class="text-danger">*</span></label>
            <select name="category" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->name }}" {{ old('category', $article->category) == $cat->name ? 'selected' : '' }}>
                  {{ $cat->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Penulis (Author)</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $article->author) }}">
          </div>

          <div class="form-group">
            <label>Estimasi Waktu Baca</label>
            <input type="text" name="reading_time" class="form-control" value="{{ old('reading_time', $article->reading_time) }}">
          </div>
        </div>
      </div>

      <!-- Thumbnail Image Box (Supports all image extensions) -->
      <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
        <div class="panel-heading" style="font-weight: 700;">
          <i class="fa fa-picture-o fa-fw"></i> Foto Thumbnail Artikel
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label>Ganti Foto Thumbnail</label>
            <input type="file" id="imageFileInput" name="image_file" class="form-control" accept="image/png, image/jpeg, image/jpg, image/webp, image/gif, image/svg+xml, image/avif, image/bmp, image/*" onchange="previewThumbnail(this)">
            <p class="help-block" style="font-size: 11px; margin-top: 4px;">
              <strong>Format didukung:</strong> JPG, JPEG, PNG, WebP, GIF, SVG, AVIF, BMP (Maks 5MB).
            </p>
          </div>

          <!-- Current Image / Live Preview -->
          <div id="thumbnailPreviewBox" class="thumbnail-preview-wrap">
            @if($article->image)
              <img id="imagePreview" src="{{ asset($article->image) }}" alt="Thumbnail Saat Ini">
              <span id="previewPlaceholder" class="text-muted" style="display: none; font-size: 12px;">
                Belum ada gambar
              </span>
            @else
              <span id="previewPlaceholder" class="text-muted" style="font-size: 12px;">
                <i class="fa fa-image fa-2x" style="display:block; margin-bottom: 4px; color: #cbd5e1;"></i>
                Belum ada gambar terpilih
              </span>
              <img id="imagePreview" src="#" alt="Preview" style="display: none;">
            @endif
          </div>

          <div class="form-group" style="margin-top: 15px;">
            <label style="font-size: 12px; color: #64748b;">Atau Path / URL Gambar Lokal:</label>
            <input type="text" name="image_url" class="form-control input-sm" value="{{ old('image_url') }}" placeholder="Contoh: assets/images/hero-website.webp">
          </div>

          <div class="form-group" style="margin-top: 15px;">
            <label style="font-weight: 700; color: #0f172a;">
              <i class="fa fa-tag text-warning"></i> Alt Text Thumbnail (SEO Google)
            </label>
            <input type="text" id="image_alt" name="image_alt" class="form-control" value="{{ old('image_alt', $article->image_alt) }}" placeholder="Deskripsi kata kunci gambar untuk Google Images...">
            <small class="text-muted" style="display: block; margin-top: 4px;">
              <i class="fa fa-info-circle"></i> Teks alternatif yang dibaca bot Google Images. Jika dikosongkan, otomatis menggunakan judul artikel.
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection

@section('scripts')
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-id-ID.min.js"></script>

<script>
  // Robust tracking for the currently selected/clicked image in Summernote editor
  window.lastClickedImg = null;

  $(document).on('mousedown click touchstart', '.note-editable img', function(e) {
    window.lastClickedImg = this;
    $('.note-editable img').removeClass('summernote-active-img');
    $(this).addClass('summernote-active-img');
  });

  $(document).on('mousedown click touchstart', '.note-control-selection', function(e) {
    var target = $(this).data('target');
    if (target && $(target).is('img')) {
      window.lastClickedImg = target;
      $('.note-editable img').removeClass('summernote-active-img');
      $(target).addClass('summernote-active-img');
    }
  });

  $(document).ready(function() {
    // 1. Initialize Full Summernote Text Editor with Image Center Support
    $('#articleContent').summernote({
      placeholder: 'Tuliskan isi artikel lengkap di sini dengan heading, paragraf, list, gambar, tabel, dll...',
      tabsize: 2,
      height: 420,
      lang: 'id-ID',
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph', 'height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video', 'hr']],
        ['imageTools', ['quickCenterImg', 'quickAltImg']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ],
      popover: {
        image: [
          ['customAlign', ['imageAlignLeft', 'imageAlignCenter', 'imageAlignRight', 'imageAlignNone']],
          ['customSeo', ['imageAltText']],
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['remove', ['removeMedia']]
        ]
      },
      buttons: {
        // Quick Center Button in Top Toolbar
        quickCenterImg: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-picture-o" style="color:#f47712;"></i> <i class="fa fa-align-center" style="color:#f47712;"></i> <strong style="color:#f47712;">Gambar Tengah</strong>',
            tooltip: 'Posisikan Gambar ke Posisi Tengah Halaman',
            click: function() {
              alignSelectedImage('center', context);
            }
          }).render();
        },
        // Quick Alt Text Button in Top Toolbar
        quickAltImg: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-tag" style="color:#0284c7;"></i> <strong style="color:#0284c7;">Alt Text Gambar</strong>',
            tooltip: 'Edit Alt Text (Teks Alternatif SEO) untuk Gambar yang Dipilih',
            click: function() {
              editSelectedImageAlt(context);
            }
          }).render();
        },
        // Popover Button: Alt Text SEO
        imageAltText: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-tag fa-fw" style="color:#0284c7;"></i> <strong>Alt Text (SEO)</strong>',
            tooltip: 'Atur Alt Text Gambar untuk Optimasi Google Images',
            click: function() {
              editSelectedImageAlt(context);
            }
          }).render();
        },
        // Popover Buttons: Left, Center, Right, None
        imageAlignLeft: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-align-left fa-fw"></i> Rata Kiri',
            tooltip: 'Posisi Gambar di Kiri (Float Left)',
            click: function() {
              alignSelectedImage('left', context);
            }
          }).render();
        },
        imageAlignCenter: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-align-center fa-fw" style="color:#f47712; font-weight:bold;"></i> <strong>Rata Tengah</strong>',
            tooltip: 'Posisikan Gambar Tepat di Tengah (Center Block)',
            click: function() {
              alignSelectedImage('center', context);
            }
          }).render();
        },
        imageAlignRight: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-align-right fa-fw"></i> Rata Kanan',
            tooltip: 'Posisi Gambar di Kanan (Float Right)',
            click: function() {
              alignSelectedImage('right', context);
            }
          }).render();
        },
        imageAlignNone: function(context) {
          var ui = $.summernote.ui;
          return ui.button({
            contents: '<i class="fa fa-bars fa-fw"></i> Reset Normal',
            tooltip: 'Hapus Format Perataan (Default Inline)',
            click: function() {
              alignSelectedImage('none', context);
            }
          }).render();
        }
      },
      callbacks: {
        onChange: function(contents, $editable) {
          $('#articleContent').val(contents);
        }
      }
    });

    // Multi-Layer Reliable Image Detector
    function getSelectedImage(context) {
      // 1. Cek .note-control-selection (elemen seleksi aktif Summernote saat gambar diklik)
      var selTarget = $('.note-control-selection').data('target');
      if (selTarget && $(selTarget).is('img')) {
        return $(selTarget);
      }

      // 2. Cek restoreTarget bawaan Summernote
      if (context && context.invoke) {
        try {
          var target = context.invoke('restoreTarget');
          if (target && $(target).is('img')) {
            return $(target);
          }
        } catch(e) {}
      }

      // 3. Cek data('target') pada container editable
      try {
        var edTarget = context.layoutInfo.editable.data('target');
        if (edTarget && $(edTarget).is('img')) {
          return $(edTarget);
        }
      } catch(e) {}

      // 4. Cek window.lastClickedImg
      if (window.lastClickedImg && $(window.lastClickedImg).is('img') && $(window.lastClickedImg).closest('.note-editable').length) {
        return $(window.lastClickedImg);
      }

      // 5. Cek gambar yang memiliki class .summernote-active-img
      var activeImg = $('.note-editable img.summernote-active-img');
      if (activeImg.length) {
        return activeImg.first();
      }

      // 6. Cek elemen gambar yang sedang di-hover di editable
      var hovered = $('.note-editable img:hover');
      if (hovered.length) {
        return hovered.first();
      }

      // 7. Jika ada 1 gambar di seluruh artikel, langsung gunakan
      var allImgs = $('.note-editable img');
      if (allImgs.length === 1) {
        return allImgs.first();
      }

      // 8. Jika ada beberapa gambar, gunakan gambar yang terakhir
      if (allImgs.length > 1) {
        return allImgs.last();
      }

      return null;
    }

    // Helper Function to Align Selected Image
    function alignSelectedImage(position, context) {
      var $img = getSelectedImage(context);

      if (!$img || !$img.length) {
        return;
      }

      if (position === 'center') {
        $img.css({
          'display': 'block',
          'float': 'none',
          'margin-left': 'auto',
          'margin-right': 'auto',
          'margin-top': '20px',
          'margin-bottom': '20px',
          'max-width': '100%'
        });
        $img.attr('data-align', 'center');

        // Pastikan parent paragraph atau div juga berposisi tengah
        var $parent = $img.parent();
        if ($parent.is('p, div, figure')) {
          $parent.css('text-align', 'center');
        } else {
          $img.wrap('<p style="text-align: center; margin: 20px 0;"></p>');
        }
      } else if (position === 'left') {
        $img.css({
          'display': 'inline-block',
          'float': 'left',
          'margin-left': '0',
          'margin-right': '24px',
          'margin-bottom': '16px',
          'margin-top': '6px',
          'max-width': '100%'
        });
        $img.attr('data-align', 'left');
        var $parent = $img.parent();
        if ($parent.is('p, div') && $parent.css('text-align') === 'center') {
          $parent.css('text-align', 'left');
        }
      } else if (position === 'right') {
        $img.css({
          'display': 'inline-block',
          'float': 'right',
          'margin-left': '24px',
          'margin-right': '0',
          'margin-bottom': '16px',
          'margin-top': '6px',
          'max-width': '100%'
        });
        $img.attr('data-align', 'right');
        var $parent = $img.parent();
        if ($parent.is('p, div') && $parent.css('text-align') === 'center') {
          $parent.css('text-align', 'left');
        }
      } else { // none
        $img.css({
          'display': 'inline-block',
          'float': 'none',
          'margin-left': '0',
          'margin-right': '0',
          'margin-top': '0',
          'margin-bottom': '0'
        });
        $img.removeAttr('data-align');
        var $parent = $img.parent();
        if ($parent.is('p, div') && $parent.css('text-align') === 'center') {
          $parent.css('text-align', 'left');
        }
      }

      // Update state
      window.lastClickedImg = $img[0];
      $('.note-editable img').removeClass('summernote-active-img');
      $img.addClass('summernote-active-img');

      if (context && context.invoke) {
        try {
          context.invoke('editor.afterCommand');
        } catch(e) {}
      }

      // Sync to textarea
      var updatedHtml = $('#articleContent').summernote('code');
      $('#articleContent').val(updatedHtml);
    }

    // Function to Edit Alt Text of Selected Image
    function editSelectedImageAlt(context) {
      var $img = getSelectedImage(context);
      if (!$img || !$img.length) {
        alert('Silakan klik gambar di dalam editor terlebih dahulu sebelum mengatur Alt Text-nya.');
        return;
      }
      var currentAlt = $img.attr('alt') || '';
      var newAlt = prompt('Masukkan Alt Text Gambar (untuk optimasi SEO Google Images):', currentAlt);
      if (newAlt !== null) {
        newAlt = newAlt.trim();
        $img.attr('alt', newAlt);
        $img.attr('title', newAlt);
        var updatedHtml = $('#articleContent').summernote('code');
        $('#articleContent').val(updatedHtml);
      }
    }

    // 2. Ensure textarea is synced on form submission
    $('#articleEditForm').on('submit', function() {
      var contentHtml = $('#articleContent').summernote('code');
      $('#articleContent').val(contentHtml);
    });
  });

  // 3. Toggle Schedule Datetime Field
  function toggleScheduleOptions() {
    var isSchedule = $('#pubSchedule').is(':checked');
    if (isSchedule) {
      $('#scheduleDatetimeBox').slideDown(200);
      $('#published_at').attr('required', true);
    } else {
      $('#scheduleDatetimeBox').slideUp(200);
      $('#published_at').removeAttr('required');
    }
  }

  // 4. Live Image Preview
  function previewThumbnail(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result).show();
        $('#previewPlaceholder').hide();
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
