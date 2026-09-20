@extends('layouts.admin')

@section('title', 'Tulis Artikel Baru & Optimasi SEO')

@push('styles')
<style>
/* Reset & enforce typography styling inside the visual editor */
#editorVisual {
    min-height: 440px;
    max-height: 700px;
    overflow-y: auto;
    outline: none;
    line-height: 1.8;
    color: #1e293b;
    font-size: 0.9375rem;
}

#editorVisual h1 {
    font-size: 2rem !important;
    font-weight: 800 !important;
    line-height: 1.25 !important;
    margin-top: 1.5rem !important;
    margin-bottom: 0.75rem !important;
    color: #0f172a !important;
}

#editorVisual h2 {
    font-size: 1.5rem !important;
    font-weight: 700 !important;
    line-height: 1.3 !important;
    margin-top: 1.25rem !important;
    margin-bottom: 0.5rem !important;
    color: #0f172a !important;
}

#editorVisual h3 {
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    line-height: 1.35 !important;
    margin-top: 1rem !important;
    margin-bottom: 0.5rem !important;
    color: #1e293b !important;
}

#editorVisual h4 {
    font-size: 1.1rem !important;
    font-weight: 600 !important;
    margin-top: 0.75rem !important;
    margin-bottom: 0.35rem !important;
    color: #334155 !important;
}

#editorVisual h5 {
    font-size: 0.95rem !important;
    font-weight: 600 !important;
    margin-top: 0.5rem !important;
    margin-bottom: 0.25rem !important;
    color: #475569 !important;
}

#editorVisual p {
    margin-top: 0.5rem !important;
    margin-bottom: 0.75rem !important;
    line-height: 1.75 !important;
    color: #334155 !important;
}

/* Bullet List (Unordered List) */
#editorVisual ul {
    list-style-type: disc !important;
    padding-left: 2rem !important;
    margin-top: 0.75rem !important;
    margin-bottom: 0.75rem !important;
}

#editorVisual ul ul {
    list-style-type: circle !important;
    padding-left: 1.5rem !important;
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
}

#editorVisual ul ul ul {
    list-style-type: square !important;
}

/* Numbered List (Ordered List) */
#editorVisual ol {
    list-style-type: decimal !important;
    padding-left: 2rem !important;
    margin-top: 0.75rem !important;
    margin-bottom: 0.75rem !important;
}

#editorVisual ol ol {
    list-style-type: lower-alpha !important;
    padding-left: 1.5rem !important;
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
}

#editorVisual ol ol ol {
    list-style-type: lower-roman !important;
}

#editorVisual li {
    display: list-item !important;
    margin-top: 0.3rem !important;
    margin-bottom: 0.3rem !important;
    line-height: 1.6 !important;
    color: #334155 !important;
}

/* Blockquote (Kutipan) */
#editorVisual blockquote:not([style*="border: none"]) {
    border-left: 4px solid #ea580c !important;
    background-color: #fff7ed !important;
    padding: 0.75rem 1.25rem !important;
    margin: 1rem 0 !important;
    color: #9a3412 !important;
    font-style: italic !important;
    border-radius: 0 0.75rem 0.75rem 0 !important;
}

/* Indented Paragraphs / Blocks via Indent tool */
#editorVisual blockquote[style*="border: none"] {
    border-left: none !important;
    background-color: transparent !important;
    padding: 0 !important;
    margin: 0.5rem 0 0.5rem 2.5rem !important;
    font-style: normal !important;
    color: inherit !important;
}

/* Monospace Code */
#editorVisual pre {
    background-color: #0f172a !important;
    color: #38bdf8 !important;
    padding: 1rem !important;
    border-radius: 0.75rem !important;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;
    font-size: 0.85rem !important;
    overflow-x: auto !important;
    margin: 1rem 0 !important;
}

/* Tables */
#editorVisual table {
    width: 100% !important;
    border-collapse: collapse !important;
    margin: 1.25rem 0 !important;
    font-size: 0.85rem !important;
}

#editorVisual th, #editorVisual td {
    border: 1px solid #cbd5e1 !important;
    padding: 0.6rem 0.85rem !important;
    text-align: left !important;
}

#editorVisual th {
    background-color: #f1f5f9 !important;
    font-weight: 700 !important;
    color: #0f172a !important;
}

#editorVisual a {
    color: #ea580c !important;
    text-decoration: underline !important;
    font-weight: 600 !important;
}

#editorVisual hr {
    border: 0 !important;
    border-top: 2px dashed #cbd5e1 !important;
    margin: 1.5rem 0 !important;
}

/* Active state for toolbar buttons */
.editor-btn.is-active {
    background-color: #ffedd5 !important;
    color: #c2410c !important;
    border-color: #fdba74 !important;
}

/* Image Figures inside Visual Editor */
#editorVisual figure.article-img-box {
    margin: 1.5rem auto;
    position: relative;
    transition: all 0.2s ease;
}
#editorVisual figure.article-img-box img {
    cursor: pointer;
    transition: outline 0.15s ease, transform 0.15s ease;
    display: inline-block;
}
#editorVisual figure.article-img-box img:hover {
    outline: 2px dashed #f97316;
}
#editorVisual figure.article-img-box.is-selected img {
    outline: 3px solid #ea580c !important;
    outline-offset: 3px;
    box-shadow: 0 10px 25px -5px rgba(234, 88, 12, 0.3) !important;
}
#editorVisual figure.align-left {
    float: left !important;
    margin: 0.5rem 1.5rem 1rem 0 !important;
    clear: left;
}
#editorVisual figure.align-right {
    float: right !important;
    margin: 0.5rem 0 1rem 1.5rem !important;
    clear: right;
}
#editorVisual figure.align-center {
    display: block !important;
    margin: 1.5rem auto !important;
    text-align: center !important;
    clear: both !important;
}
#editorVisual figure figcaption {
    font-size: 0.75rem;
    color: #64748b;
    margin-top: 0.5rem;
    font-style: italic;
    text-align: center;
}

/* Subscript & Superscript (Rumus Kimia & Kuadrat / Catatan Kaki) */
#editorVisual sub {
    font-size: 0.75em !important;
    vertical-align: sub !important;
    line-height: 0 !important;
}
#editorVisual sup {
    font-size: 0.75em !important;
    vertical-align: super !important;
    line-height: 0 !important;
}

/* Checklist / To-Do Task Items */
#editorVisual ul.task-list {
    list-style: none !important;
    padding-left: 0.25rem !important;
    margin: 0.75rem 0 !important;
}
#editorVisual ul.task-list li {
    display: flex !important;
    align-items: center !important;
    gap: 0.5rem !important;
    margin-bottom: 0.35rem !important;
}
#editorVisual ul.task-list li input[type="checkbox"] {
    cursor: pointer !important;
    width: 1rem !important;
    height: 1rem !important;
    border-radius: 0.25rem !important;
    accent-color: #ea580c !important;
}

/* Fullscreen Editor Mode */
#editorCardContainer.is-fullscreen {
    position: fixed !important;
    inset: 0 !important;
    z-index: 9999 !important;
    background-color: #ffffff !important;
    padding: 1.5rem !important;
    overflow-y: auto !important;
    border-radius: 0 !important;
    border: none !important;
    max-width: 100% !important;
    margin: 0 !important;
}
#editorCardContainer.is-fullscreen #editorVisual {
    min-height: 70vh !important;
    max-width: 1100px !important;
    margin: 0 auto !important;
}
</style>
@endpush

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="p-1.5 rounded-lg bg-orange-100 text-orange-600 text-sm">✍️</span>
                <h2 class="text-base font-black text-slate-900">Buat Artikel & Optimasi SEO / GEO</h2>
            </div>
            <p class="text-xs text-slate-500 mt-1">Publikasikan artikel bernilai tinggi untuk menjaring ribuan calon klien dari Google dan AI Search Engine.</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition">
            ← Kembali ke Daftar
        </a>
    </div>

    <!-- Main Create Form -->
    <form id="articleForm" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
        @csrf

        <!-- Bagian 1: Pengaturan Utama (Kategori & Status) -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-5">
            <h3 class="font-bold text-slate-800 text-xs uppercase tracking-wider flex items-center gap-2 pb-3 border-b border-slate-100">
                <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                Informasi & Taksonomi Artikel
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Pilih Kategori Artikel <span class="text-red-500">*</span></label>
                    <select name="category_id" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-orange-500 font-semibold">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Status Publikasi</label>
                    <div class="flex items-center gap-3 pt-2">
                        <label class="inline-flex items-center gap-2.5 cursor-pointer font-semibold text-slate-700 p-2 rounded-xl bg-slate-50 border border-slate-200 w-full hover:bg-orange-50/50 transition">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="rounded border-slate-300 text-orange-600 focus:ring-0 w-4 h-4">
                            <span class="text-xs">Langsung Terbitkan Artikel di Website</span>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="font-bold uppercase tracking-wider text-slate-700">Judul Artikel <span class="text-red-500">*</span></label>
                    <span id="titleCounter" class="text-[11px] text-slate-400 font-mono">0 karakter</span>
                </div>
                <input type="text" id="articleTitle" name="title" value="{{ old('title') }}" required placeholder="Contoh: 5 Alasan Kenapa Bisnis Anda Wajib Punya Website Cepat & Modern di 2026" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white font-bold transition shadow-sm">
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="font-bold uppercase tracking-wider text-slate-700">Slug URL (Opsional, terisi otomatis jika kosong)</label>
                    <span class="text-[10px] text-slate-400 font-normal">URL ramah SEO</span>
                </div>
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 focus-within:border-orange-500 focus-within:bg-white transition">
                    <span class="text-slate-400 text-xs font-mono select-none pr-1">/artikel/</span>
                    <input type="text" id="articleSlug" name="slug" value="{{ old('slug') }}" placeholder="alasan-bisnis-wajib-punya-website" class="w-full bg-transparent py-1 text-xs font-mono text-slate-800 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Ringkasan / Excerpt Singkat</label>
                <textarea name="excerpt" rows="2" placeholder="Ringkasan 1-2 kalimat menarik yang menggugah calon klien untuk membaca..." class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs text-slate-800 focus:outline-none focus:border-orange-500">{{ old('excerpt') }}</textarea>
                <p class="text-[10px] text-slate-400 mt-1">Ditampilkan pada kartu daftar artikel dan cuplikan artikel terkait.</p>
            </div>
        </div>

        <!-- Bagian 2: Gambar Utama & Alt Text untuk Google Image SEO -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-bold text-slate-800 text-xs uppercase tracking-wider flex items-center gap-2 pb-3 border-b border-slate-100">
                <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                Gambar Utama & Optimasi Gambar (Image SEO)
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Upload File -->
                <div>
                    <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Upload Thumbnail / Gambar Unggulan</label>
                    <input type="file" name="featured_image" accept=".webp,.png,.jpg,.jpeg,.gif,.svg,.bmp,.avif,image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200 transition">
                    <p class="text-[11px] text-emerald-600 font-semibold mt-1.5 flex items-center gap-1">
                        <span>✨</span> Mendukung semua format: WEBP, PNG, JPG, JPEG, GIF, SVG, BMP, AVIF (Maks. 5 MB)
                    </p>
                </div>

                <!-- Alt Text SEO -->
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="font-bold uppercase tracking-wider text-slate-700">Alt Text Gambar Utama (Wajib untuk SEO) <span class="text-red-500">*</span></label>
                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 font-bold">Image SEO</span>
                    </div>
                    <input type="text" id="featuredImageAlt" name="featured_image_alt" value="{{ old('featured_image_alt') }}" placeholder="Contoh: Layanan pembuatan website profesional dan berkecepatan tinggi di Bogor NazwaGraha" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
                    <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">
                        💡 <strong>Tips SEO:</strong> Deskripsikan isi gambar secara spesifik dan sertakan kata kunci utama agar gambar ranking di Google Images.
                    </p>
                </div>
            </div>
        </div>

        <!-- Bagian 3: Full-Featured WYSIWYG Content Editor (Sekelas Microsoft Word) -->
        <div id="editorCardContainer" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-3 transition-all duration-200">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-slate-100">
                <h3 class="font-bold text-slate-800 text-xs uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    Isi Konten Artikel (Rich Text Editor Pro) <span class="text-red-500">*</span>
                </h3>
                <div class="flex items-center gap-2 flex-wrap">
                    <button type="button" id="toggleFullscreenBtn" class="px-2.5 py-1 rounded-lg border border-slate-200 bg-slate-50 hover:bg-orange-50 hover:text-orange-600 text-slate-700 font-bold text-[11px] flex items-center gap-1.5 transition" title="Mode Layar Penuh Fokus Menulis (F11 / Esc)">
                        <span>⛶</span> <span id="fullscreenBtnText">Layar Penuh</span>
                    </button>
                    <button type="button" id="toggleCodeViewBtn" class="px-2.5 py-1 rounded-lg border border-slate-200 bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold text-[11px] flex items-center gap-1 transition">
                        <span>&lt;/&gt;</span> Mode Kode HTML
                    </button>
                    <span id="editorStats" class="text-[11px] text-slate-400 font-mono">0 kata | 0 karakter | ~0 mnt baca</span>
                </div>
            </div>

            <!-- Toolbar Ribbon Microsoft Word (2 Baris Rapi & Lengkap) -->
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-2 space-y-2 text-slate-700 select-none shadow-xs sticky top-4 z-20">
                
                <!-- Baris 1: Font, Ukuran, Spasi, Format Huruf, & Warna -->
                <div class="flex flex-wrap items-center gap-1.5 pb-2 border-b border-slate-200/80">
                    
                    <!-- Font Family -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <select id="fontFamilySelect" title="Pilih Jenis Huruf (Font Family)" class="bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs font-semibold text-slate-800 focus:outline-none focus:border-orange-500 shadow-2xs">
                            <option value="">Font: Standar Sistem</option>
                            <option value="Arial, sans-serif">Arial</option>
                            <option value="Georgia, serif">Georgia (Serif)</option>
                            <option value="'Times New Roman', serif">Times New Roman</option>
                            <option value="'Courier New', monospace">Courier New (Monospace)</option>
                            <option value="Verdana, sans-serif">Verdana</option>
                            <option value="'Trebuchet MS', sans-serif">Trebuchet MS</option>
                            <option value="Garamond, serif">Garamond</option>
                        </select>
                    </div>

                    <!-- Font Size -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <select id="fontSizeSelect" title="Pilih Ukuran Huruf (Font Size)" class="bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs font-semibold text-slate-800 focus:outline-none focus:border-orange-500 shadow-2xs">
                            <option value="">Ukuran Font</option>
                            <option value="12px">12px (Sangat Kecil)</option>
                            <option value="14px">14px (Kecil)</option>
                            <option value="16px" selected>16px (Normal Standar)</option>
                            <option value="18px">18px (Besar Sedang)</option>
                            <option value="20px">20px (Besar)</option>
                            <option value="24px">24px (Sub-Judul)</option>
                            <option value="30px">30px (Judul)</option>
                            <option value="36px">36px (Jumbo)</option>
                        </select>
                    </div>

                    <!-- Format Heading & Paragraf -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <select id="formatBlockSelect" title="Hirarki Paragraf & Judul (H1-H5)" class="bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs font-semibold text-slate-800 focus:outline-none focus:border-orange-500 shadow-2xs">
                            <option value="p">¶ Paragraf (Normal)</option>
                            <option value="h1">H1 - Judul Utama</option>
                            <option value="h2">H2 - Sub-Judul Besar</option>
                            <option value="h3">H3 - Sub-Judul Sedang</option>
                            <option value="h4">H4 - Sub-Judul Kecil</option>
                            <option value="h5">H5 - Sub-Judul Minor</option>
                            <option value="blockquote">❝ Kutipan (Blockquote)</option>
                            <option value="pre">💻 Kode / Monospace</option>
                        </select>
                        <button type="button" data-cmd="heading2" title="Format H2 Cepat" class="editor-btn px-2 py-1 rounded-lg hover:bg-white text-xs font-bold border border-transparent hover:border-slate-200">H2</button>
                        <button type="button" data-cmd="heading3" title="Format H3 Cepat" class="editor-btn px-2 py-1 rounded-lg hover:bg-white text-xs font-bold border border-transparent hover:border-slate-200">H3</button>
                    </div>

                    <!-- Text Style (Bold, Italic, Underline, Strike) -->
                    <div class="flex items-center gap-0.5 pr-1.5 border-r border-slate-200">
                        <button type="button" id="btnBold" data-cmd="bold" title="Tebal (Ctrl+B)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 font-black text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">B</button>
                        <button type="button" id="btnItalic" data-cmd="italic" title="Miring (Ctrl+I)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 italic text-xs w-7 h-7 flex items-center justify-center font-serif border border-transparent hover:border-slate-200">I</button>
                        <button type="button" id="btnUnderline" data-cmd="underline" title="Garis Bawah (Ctrl+U)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 underline text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">U</button>
                        <button type="button" id="btnStrike" data-cmd="strikeThrough" title="Coretan Teks" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 line-through text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">S</button>
                    </div>

                    <!-- Subscript & Superscript (Rumus & Pangkat) -->
                    <div class="flex items-center gap-0.5 pr-1.5 border-r border-slate-200">
                        <button type="button" id="btnSubscript" data-cmd="subscript" title="Subscript / Angka Bawah (X₂)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center font-bold border border-transparent hover:border-slate-200">
                            X<sub class="text-[9px]">2</sub>
                        </button>
                        <button type="button" id="btnSuperscript" data-cmd="superscript" title="Superscript / Pangkat Atas (X²)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center font-bold border border-transparent hover:border-slate-200">
                            X<sup class="text-[9px]">2</sup>
                        </button>
                    </div>

                    <!-- Text Color & Highlight Picker -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <label class="cursor-pointer p-1 rounded-lg hover:bg-white flex items-center gap-1 text-xs border border-transparent hover:border-slate-200" title="Ubah Warna Teks">
                            <span class="font-black text-slate-800">A</span>
                            <input type="color" id="textColorPicker" value="#0f172a" class="w-4 h-4 border-0 p-0 cursor-pointer rounded">
                        </label>
                        <label class="cursor-pointer p-1 rounded-lg hover:bg-white flex items-center gap-1 text-xs border border-transparent hover:border-slate-200" title="Stabilo / Highlight Teks">
                            <span class="font-bold text-amber-600 bg-amber-100 px-1 rounded text-[10px]">HL</span>
                            <input type="color" id="bgColorPicker" value="#fef08a" class="w-4 h-4 border-0 p-0 cursor-pointer rounded">
                        </label>
                    </div>

                    <!-- Clear Format -->
                    <div class="flex items-center">
                        <button type="button" data-cmd="removeFormat" title="Hapus Semua Format Teks (Clear Formatting)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-red-600 text-xs flex items-center gap-1 border border-transparent hover:border-slate-200 font-semibold">
                            <span>🧹</span> <span>Hapus Format</span>
                        </button>
                    </div>

                </div>

                <!-- Baris 2: Tata Letak Paragraf, Media, Tabel, & Alat Produktivitas -->
                <div class="flex flex-wrap items-center gap-1.5">
                    
                    <!-- Alignment (Left, Center, Right, Justify) -->
                    <div class="flex items-center gap-0.5 pr-1.5 border-r border-slate-200">
                        <button type="button" id="btnAlignLeft" data-cmd="justifyLeft" title="Rata Kiri" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h14"/></svg>
                        </button>
                        <button type="button" id="btnAlignCenter" data-cmd="justifyCenter" title="Rata Tengah" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M7 12h10M5 18h14"/></svg>
                        </button>
                        <button type="button" id="btnAlignRight" data-cmd="justifyRight" title="Rata Kanan" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M10 12h10M6 18h14"/></svg>
                        </button>
                        <button type="button" id="btnAlignJustify" data-cmd="justifyFull" title="Rata Kanan Kiri (Justify)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center border border-transparent hover:border-slate-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>

                    <!-- Line Spacing / Tinggi Baris -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <select id="lineHeightSelect" title="Spasi Baris Paragraf (Line Spacing)" class="bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs font-semibold text-slate-800 focus:outline-none focus:border-orange-500 shadow-2xs">
                            <option value="">Spasi: Normal</option>
                            <option value="1.0">1.0 (Rapat)</option>
                            <option value="1.25">1.25 (Kompak)</option>
                            <option value="1.6" selected>1.6 (Standar)</option>
                            <option value="1.8">1.8 (Lega)</option>
                            <option value="2.0">2.0 (Ganda)</option>
                        </select>
                    </div>

                    <!-- Lists: Bullets, Numbering, Checklist -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <button type="button" id="btnBullets" data-cmd="insertUnorderedList" title="Daftar Poin (Bullets)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-bold border border-transparent hover:border-slate-200">
                            <span class="text-sm leading-none">•</span>
                            <span>Bullets</span>
                        </button>
                        <button type="button" id="btnNumbering" data-cmd="insertOrderedList" title="Daftar Angka (Numbering: 1, 2, 3)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-bold font-mono border border-transparent hover:border-slate-200">
                            <span>1.</span>
                            <span>Numbering</span>
                        </button>
                        <button type="button" id="btnChecklist" title="Sisipkan Ceklis / To-Do List" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-bold border border-transparent hover:border-slate-200">
                            <span>☑</span>
                            <span>Ceklis</span>
                        </button>
                    </div>

                    <!-- Indentasi: Outdent & Indent -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <button type="button" id="btnOutdent" data-cmd="outdent" title="Kurangi Indentasi / Keluar Sub-List (Shift + Tab)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-semibold border border-transparent hover:border-slate-200">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-4-4 4-4m-7 4h16M21 6H3m18 12H3"/></svg>
                            <span>Outdent</span>
                        </button>
                        <button type="button" id="btnIndent" data-cmd="indent" title="Tambah Indentasi / Masuk Sub-List (Tombol Tab)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-semibold border border-transparent hover:border-slate-200">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l4 4-4 4m7-4H3m18-6H3m18 12H3"/></svg>
                            <span>Indent</span>
                            <span class="text-[9px] px-1 py-0.2 bg-slate-100 text-slate-500 rounded font-mono">Tab</span>
                        </button>
                    </div>

                    <!-- Insert Media & Elemen: Link, Picture, Table, HR, Simbol -->
                    <div class="flex items-center gap-1 pr-1.5 border-r border-slate-200">
                        <button type="button" id="openLinkModalBtn" title="Sisipkan Link Tautan" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-semibold border border-transparent hover:border-slate-200">
                            🔗 Link
                        </button>
                        <button type="button" id="openImageModalBtn" title="Sisipkan Gambar (Upload / URL & Layout)" class="editor-btn px-2.5 py-1 rounded-lg bg-orange-100 hover:bg-orange-200 text-orange-800 text-xs flex items-center gap-1 font-bold border border-orange-200 shadow-2xs">
                            🖼️ Gambar
                        </button>
                        <!-- Tombol Buat Tabel Jelas & Menonjol -->
                        <button type="button" id="openTableModalBtn" title="Buat & Sisipkan Tabel Baru" class="editor-btn px-2.5 py-1 rounded-lg bg-emerald-100 hover:bg-emerald-200 text-emerald-900 text-xs flex items-center gap-1 font-bold border border-emerald-300 shadow-2xs">
                            <span>📊</span> <span>+ Buat Tabel</span>
                        </button>
                        
                        <!-- Table Tools Dropdown -->
                        <div class="relative inline-block text-left" id="tableToolsDropdownWrap">
                            <button type="button" id="openTableToolsBtn" title="Menu Aksi Kelola Baris & Kolom Tabel" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-semibold border border-transparent hover:border-slate-200">
                                <span>📑 Aksi Tabel ▾</span>
                            </button>
                            <div id="tableToolsMenu" class="hidden absolute left-0 mt-1 w-52 bg-white rounded-xl shadow-xl border border-slate-200 py-1 z-30 text-xs text-slate-700">
                                <button type="button" id="menuCreateNewTable" class="w-full text-left px-3 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 font-bold flex items-center gap-2 border-b border-emerald-100">
                                    <span>➕</span> Buat / Sisipkan Tabel Baru...
                                </button>
                                <div class="px-3 pt-2 pb-1 font-bold text-[10px] text-slate-400 uppercase tracking-wider">Kelola Baris Tabel</div>
                                <button type="button" id="tblAddRowBelow" class="w-full text-left px-3 py-1.5 hover:bg-orange-50 hover:text-orange-600 flex items-center gap-2">
                                    <span>⬇️</span> Tambah Baris di Bawah
                                </button>
                                <button type="button" id="tblAddRowAbove" class="w-full text-left px-3 py-1.5 hover:bg-orange-50 hover:text-orange-600 flex items-center gap-2">
                                    <span>⬆️</span> Tambah Baris di Atas
                                </button>
                                <button type="button" id="tblDeleteRow" class="w-full text-left px-3 py-1.5 hover:bg-rose-50 hover:text-rose-600 flex items-center gap-2 text-rose-600">
                                    <span>➖</span> Hapus Baris Aktif
                                </button>
                                <div class="border-t border-slate-100 my-1"></div>
                                <div class="px-3 py-1 font-bold text-[10px] text-slate-400 uppercase tracking-wider">Kelola Kolom Tabel</div>
                                <button type="button" id="tblAddColRight" class="w-full text-left px-3 py-1.5 hover:bg-orange-50 hover:text-orange-600 flex items-center gap-2">
                                    <span>➡️</span> Tambah Kolom di Kanan
                                </button>
                                <button type="button" id="tblAddColLeft" class="w-full text-left px-3 py-1.5 hover:bg-orange-50 hover:text-orange-600 flex items-center gap-2">
                                    <span>⬅️</span> Tambah Kolom di Kiri
                                </button>
                                <button type="button" id="tblDeleteCol" class="w-full text-left px-3 py-1.5 hover:bg-rose-50 hover:text-rose-600 flex items-center gap-2 text-rose-600">
                                    <span>✂️</span> Hapus Kolom Aktif
                                </button>
                                <div class="border-t border-slate-100 my-1"></div>
                                <div class="px-3 pt-1 pb-1 font-bold text-[10px] text-slate-400 uppercase tracking-wider">Atur Lebar Kolom Aktif</div>
                                <div class="px-2 py-1 grid grid-cols-3 gap-1">
                                    <button type="button" class="tbl-set-col-width px-1.5 py-1 rounded bg-slate-100 hover:bg-orange-100 hover:text-orange-700 text-[10px] font-bold text-center transition" data-width="12%" title="Kecil (12%) - Pas untuk Nomor">12% (No)</button>
                                    <button type="button" class="tbl-set-col-width px-1.5 py-1 rounded bg-slate-100 hover:bg-orange-100 hover:text-orange-700 text-[10px] font-bold text-center transition" data-width="25%" title="Sedang (25%)">25%</button>
                                    <button type="button" class="tbl-set-col-width px-1.5 py-1 rounded bg-slate-100 hover:bg-orange-100 hover:text-orange-700 text-[10px] font-bold text-center transition" data-width="33%" title="Seimbang (33%)">33%</button>
                                    <button type="button" class="tbl-set-col-width px-1.5 py-1 rounded bg-slate-100 hover:bg-orange-100 hover:text-orange-700 text-[10px] font-bold text-center transition" data-width="50%" title="Besar (50%)">50%</button>
                                    <button type="button" class="tbl-set-col-width px-1.5 py-1 rounded bg-slate-100 hover:bg-orange-100 hover:text-orange-700 text-[10px] font-bold text-center transition" data-width="70%" title="Lebar (70%) - Pas untuk Uraian">70%</button>
                                    <button type="button" class="tbl-set-col-width px-1.5 py-1 rounded bg-slate-100 hover:bg-orange-100 hover:text-orange-700 text-[10px] font-bold text-center transition" data-width="auto" title="Lebar Otomatis Sesuai Teks">Auto</button>
                                </div>
                                <button type="button" id="tblDistributeCols" class="w-full text-left px-3 py-1.5 hover:bg-orange-50 hover:text-orange-600 flex items-center gap-2">
                                    <span>⚖️</span> Ratakan Lebar Kolom
                                </button>
                                <button type="button" id="tblPromptColWidth" class="w-full text-left px-3 py-1.5 hover:bg-orange-50 hover:text-orange-600 flex items-center gap-2">
                                    <span>📏</span> Input Lebar Sendiri (% / px)...
                                </button>
                                <div class="border-t border-slate-100 my-1"></div>
                                <button type="button" id="tblDeleteTable" class="w-full text-left px-3 py-1.5 hover:bg-rose-50 hover:text-rose-600 flex items-center gap-2 text-rose-600 font-bold">
                                    <span>🗑️</span> Hapus Seluruh Tabel
                                </button>
                            </div>
                        </div>

                        <!-- Simbol Khusus -->
                        <button type="button" id="openSymbolModalBtn" title="Sisipkan Simbol & Karakter Khusus (Ω)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-bold border border-transparent hover:border-slate-200">
                            <span>Ω</span> <span>Simbol</span>
                        </button>
                        <button type="button" data-cmd="insertHorizontalRule" title="Garis Pemisah (HR)" class="editor-btn p-1.5 rounded-lg hover:bg-white hover:text-orange-600 text-xs w-7 h-7 flex items-center justify-center font-bold border border-transparent hover:border-slate-200">
                            ―
                        </button>
                    </div>

                    <!-- Search, Undo, Redo -->
                    <div class="flex items-center gap-1">
                        <button type="button" id="openFindReplaceBtn" title="Cari & Ganti Teks (Find & Replace)" class="editor-btn px-2 py-1 rounded-lg hover:bg-white hover:text-orange-600 text-xs flex items-center gap-1 font-semibold border border-transparent hover:border-slate-200">
                            <span>🔍</span> <span>Cari & Ganti</span>
                        </button>
                        <button type="button" data-cmd="undo" title="Urungkan (Undo: Ctrl+Z)" class="editor-btn p-1.5 rounded-lg hover:bg-white text-xs w-7 h-7 flex items-center justify-center font-bold border border-transparent hover:border-slate-200">
                            ↺
                        </button>
                        <button type="button" data-cmd="redo" title="Ulangi (Redo: Ctrl+Y)" class="editor-btn p-1.5 rounded-lg hover:bg-white text-xs w-7 h-7 flex items-center justify-center font-bold border border-transparent hover:border-slate-200">
                            ↻
                        </button>
                    </div>

                </div>

            </div>

            <!-- Floating Quick Toolbar for Images in Editor -->
            <div id="imageQuickToolbar" class="fixed z-40 hidden bg-slate-900/95 backdrop-blur-sm text-white rounded-xl shadow-2xl p-1.5 border border-slate-700 items-center gap-1.5 text-[11px] font-sans transition-opacity select-none">
                <div class="flex items-center gap-1 border-r border-slate-700 pr-1.5 mr-0.5">
                    <span class="text-[10px] text-slate-400 font-bold px-1">LEBAR:</span>
                    <button type="button" data-size="100%" class="img-quick-size px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-bold transition">100%</button>
                    <button type="button" data-size="75%" class="img-quick-size px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-bold transition">75%</button>
                    <button type="button" data-size="50%" class="img-quick-size px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-bold transition">50%</button>
                    <button type="button" data-size="30%" class="img-quick-size px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-bold transition">30%</button>
                </div>
                <div class="flex items-center gap-1 border-r border-slate-700 pr-1.5 mr-0.5">
                    <span class="text-[10px] text-slate-400 font-bold px-1">POSISI:</span>
                    <button type="button" data-align="left" title="Rata Kiri (Teks di Kanan)" class="img-quick-align px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-semibold transition flex items-center gap-1">
                        <span>⬅</span> Kiri
                    </button>
                    <button type="button" data-align="center" title="Tengah (Baris Sendiri)" class="img-quick-align px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-semibold transition flex items-center gap-1">
                        <span>⏺</span> Tengah
                    </button>
                    <button type="button" data-align="right" title="Rata Kanan (Teks di Kiri)" class="img-quick-align px-2 py-1 rounded-md bg-slate-800 hover:bg-orange-600 text-slate-200 font-semibold transition flex items-center gap-1">
                        <span>➡</span> Kanan
                    </button>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button" id="imgQuickSettingsBtn" title="Pengaturan Lanjutan (Alt, Caption, Sudut, Bayangan)" class="px-2.5 py-1 rounded-md bg-orange-600 hover:bg-orange-500 text-white font-bold transition flex items-center gap-1">
                        <span>⚙️</span> Detail
                    </button>
                    <button type="button" id="imgQuickDeleteBtn" title="Hapus Gambar" class="px-2 py-1 rounded-md bg-rose-600/80 hover:bg-rose-600 text-white font-bold transition flex items-center gap-1">
                        <span>🗑️</span>
                    </button>
                </div>
            </div>

            <!-- Area Visual Editor (Contenteditable) -->
            <div id="editorVisual" contenteditable="true" class="bg-white border border-slate-200 rounded-xl p-6 text-slate-800 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 shadow-inner">
                {!! old('content', '<p>Tulis konten artikel Anda di sini secara mendalam. Gunakan heading H2 dan H3 untuk membagi topik dengan rapi...</p>') !!}
            </div>

            <!-- Area HTML Source Code (Toggle View) -->
            <textarea id="editorSource" class="hidden min-h-[420px] max-h-[700px] w-full bg-slate-900 border border-slate-700 text-emerald-400 font-mono rounded-xl p-4 text-xs focus:outline-none focus:border-orange-500 leading-relaxed"></textarea>

            <!-- Hidden Actual Field submitted to Backend -->
            <textarea name="content" id="articleContentInput" class="hidden" required>{{ old('content') }}</textarea>

            <div class="flex items-center justify-between text-[11px] text-slate-400 pt-1">
                <span>Gunakan H2 dan H3 untuk membagi struktur topik artikel demi mendominasi Featured Snippet Google.</span>
                <span>Auto-sync aktif ke server</span>
            </div>
        </div>

        <!-- Bagian 4: Optimasi Khusus SEO & GEO (Google / AI Search Engine) -->
        <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800 text-white rounded-2xl p-7 border border-slate-700 shadow-xl space-y-6">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl orange-gradient flex items-center justify-center text-lg shadow-lg">
                        🎯
                    </div>
                    <div>
                        <h3 class="font-black text-white text-sm tracking-wide">Optimasi Khusus SEO & GEO (Google & AI Search)</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Konfigurasi senjata utama agar artikel mendominasi peringkat 1 Google dan dikutip AI (ChatGPT, Gemini, Perplexity).</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 border border-orange-500/30 text-[11px] font-extrabold tracking-wider uppercase">
                    Formula Ranking #1
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Kolom Kiri: Input SEO & GEO Fields -->
                <div class="space-y-4">
                    
                    <!-- Meta Title -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label class="font-bold text-slate-200 flex items-center gap-1.5">
                                <span>Meta Title (Judul di Google & AI)</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <button type="button" id="copyTitleToMetaBtn" class="text-[10px] text-orange-400 hover:text-orange-300 font-bold">
                                    Salin dari Judul
                                </button>
                                <span id="metaTitleCounter" class="text-[10px] px-2 py-0.5 rounded-full font-mono bg-slate-800 text-slate-300">
                                    0 / 60
                                </span>
                            </div>
                        </div>
                        <input type="text" id="metaTitleInput" name="meta_title" value="{{ old('meta_title') }}" placeholder="Judul memikat dengan keyword utama (Rekomendasi 50 - 60 karakter)" class="w-full bg-slate-800/90 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-orange-500">
                        <div class="w-full bg-slate-800 h-1.5 rounded-full mt-1.5 overflow-hidden">
                            <div id="metaTitleBar" class="h-full bg-emerald-500 transition-all duration-300" style="width: 0%;"></div>
                        </div>
                    </div>

                    <!-- Meta Description -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label class="font-bold text-slate-200">Meta Description (Cuplikan Deskripsi SERP)</label>
                            <div class="flex items-center gap-2">
                                <button type="button" id="copyExcerptToMetaBtn" class="text-[10px] text-orange-400 hover:text-orange-300 font-bold">
                                    Salin dari Ringkasan
                                </button>
                                <span id="metaDescCounter" class="text-[10px] px-2 py-0.5 rounded-full font-mono bg-slate-800 text-slate-300">
                                    0 / 160
                                </span>
                            </div>
                        </div>
                        <textarea id="metaDescInput" name="meta_description" rows="3" placeholder="Deskripsi menarik dengan ajakan klik (Rekomendasi 140 - 160 karakter agar tidak terpotong di Google)" class="w-full bg-slate-800/90 border border-slate-700 rounded-xl p-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 leading-relaxed">{{ old('meta_description') }}</textarea>
                        <div class="w-full bg-slate-800 h-1.5 rounded-full mt-1.5 overflow-hidden">
                            <div id="metaDescBar" class="h-full bg-emerald-500 transition-all duration-300" style="width: 0%;"></div>
                        </div>
                    </div>

                    <!-- Meta Keywords (Target Focus & LSI Keywords) -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label class="font-bold text-slate-200 flex items-center gap-1">
                                <span>Target Focus Keywords & Frasa Pencarian</span>
                                <span class="text-orange-400">*</span>
                            </label>
                            <span class="text-[10px] text-slate-400">Pisahkan dengan koma (,)</span>
                        </div>
                        <input type="text" id="metaKeywordsInput" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Contoh: jasa pembuatan website bogor, web developer ciawi, harga web murah jabodetabek, seo specialist" class="w-full bg-slate-800/90 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 font-mono">
                        <p class="text-[11px] text-slate-400 mt-1">
                            🔑 Sangat penting untuk meta keywords, Schema.org `keywords`, dan pemetaan entity pada AI search engine.
                        </p>
                    </div>

                    <!-- Target GEO Region (Local & Regional SEO) -->
                    <div>
                        <label class="block font-bold text-slate-200 mb-1">Target Wilayah GEO (GEO Targeting Region)</label>
                        <input type="text" name="geo_target_region" value="{{ old('geo_target_region', 'Bogor, Ciawi, Jabodetabek') }}" placeholder="Contoh: Bogor, Ciawi, Jabodetabek, Jawa Barat, Seluruh Indonesia" class="w-full bg-slate-800/90 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-orange-500">
                        <p class="text-[10px] text-slate-400 mt-1">
                            📍 Menargetkan pencarian lokal Google Maps dan kueri lokal AI: <em>"Jasa IT terdekat di Ciawi Bogor"</em>.
                        </p>
                    </div>

                    <!-- Ringkasan Khusus AI / GEO Knowledge Snippet -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label class="font-bold text-slate-200 flex items-center gap-1.5">
                                <span>Ringkasan Jawaban AI (GEO / LLM Answer Snippet)</span>
                                <span class="px-1.5 py-0.5 rounded bg-purple-500/20 text-purple-300 text-[10px] font-bold">AI Engine</span>
                            </label>
                        </div>
                        <textarea name="geo_summary" rows="3" placeholder="Tulis 2-3 kalimat padat berupa fakta & solusi langsung (problem -> solusi NazwaGraha Pratama -> ajakan kontak). Format ini dirancang agar langsung dikutip oleh ChatGPT, Google Gemini, dan Perplexity saat pengguna mencari solusi." class="w-full bg-slate-800/90 border border-slate-700 rounded-xl p-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 leading-relaxed">{{ old('geo_summary') }}</textarea>
                    </div>

                </div>

                <!-- Kolom Kanan: Live Google SERP Snippet Preview -->
                <div class="space-y-4">
                    <div class="bg-slate-800/60 border border-slate-700 rounded-xl p-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-700/60">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-slate-300">Pratinjau Live Google SERP</span>
                            </div>
                            <div class="flex items-center gap-1 bg-slate-900 p-1 rounded-lg text-[10px]">
                                <button type="button" id="previewMobileBtn" class="px-2 py-0.5 rounded font-bold bg-orange-500 text-white transition">Mobile</button>
                                <button type="button" id="previewDesktopBtn" class="px-2 py-0.5 rounded font-bold text-slate-400 hover:text-white transition">Desktop</button>
                            </div>
                        </div>

                        <!-- Google Snippet Card Container -->
                        <div id="serpContainer" class="mt-4 p-4 bg-white rounded-xl text-slate-800 shadow-md font-sans transition-all max-w-full">
                            
                            <!-- Google Header / Breadcrumb -->
                            <div class="flex items-center gap-2 mb-1.5">
                                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center p-0.5 border border-slate-200">
                                    <img src="{{ asset('images/ngp-logo.webp') }}" alt="" class="w-full h-full object-contain">
                                </div>
                                <div class="leading-tight">
                                    <div class="text-[12px] font-medium text-slate-900 flex items-center gap-1">
                                        <span>NazwaGraha Pratama</span>
                                        <span class="text-slate-400 text-[10px]">› artikel</span>
                                    </div>
                                    <div id="serpUrl" class="text-[11px] text-slate-500 font-mono truncate">
                                        https://nazwagraha.com/artikel/slug-artikel
                                    </div>
                                </div>
                            </div>

                            <!-- Google Title (Blue) -->
                            <h4 id="serpTitle" class="text-base font-medium text-[#1a0dab] hover:underline cursor-pointer leading-snug line-clamp-2">
                                Judul Artikel Menarik di Sini
                            </h4>

                            <!-- Google Snippet Description -->
                            <p id="serpSnippet" class="text-xs text-[#4d5156] mt-1.5 leading-relaxed line-clamp-3">
                                Deskripsi artikel informatif dan profesional dari NazwaGraha Pratama Solusi IT...
                            </p>

                            <!-- Tags Preview -->
                            <div id="serpTags" class="mt-3 pt-2 border-t border-slate-100 flex flex-wrap gap-1">
                                <span class="text-[10px] text-slate-400 italic">Belum ada keyword dimasukkan</span>
                            </div>

                        </div>

                        <!-- Checklist SEO Cepat -->
                        <div class="mt-4 space-y-2 text-[11px]">
                            <div class="font-bold text-slate-300 mb-1">Checklist Kesiapan Ranking Google:</div>
                            <div class="flex items-center gap-2 text-slate-300">
                                <span class="text-emerald-400">✓</span> Judul artikel menarik & mengandung kata kunci
                            </div>
                            <div class="flex items-center gap-2 text-slate-300">
                                <span class="text-emerald-400">✓</span> Alt text gambar utama telah dikonfigurasi
                            </div>
                            <div class="flex items-center gap-2 text-slate-300">
                                <span class="text-emerald-400">✓</span> Struktur artikel memuat H2/H3 dan paragraf jelas
                            </div>
                            <div class="flex items-center gap-2 text-slate-300">
                                <span class="text-emerald-400">✓</span> Target wilayah GEO Bogor & Jabodetabek aktif
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- Tombol Aksi Submit -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-2">
            <button type="submit" id="saveArticleBtn" class="w-full sm:flex-1 py-4 rounded-xl orange-gradient text-white font-extrabold text-sm shadow-lg hover:shadow-orange-500/40 transition flex items-center justify-center gap-2 cursor-pointer">
                <span>🚀</span> Simpan & Terbitkan Artikel dengan Optimasi SEO
            </button>
            <a href="{{ route('admin.articles.index') }}" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs text-center transition">
                Batal
            </a>
        </div>

    </form>

</div>

<!-- Modal Dialog Sisipkan Link -->
<div id="linkModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2">🔗 Sisipkan Tautan / Link</h4>
            <button type="button" id="closeLinkModal" class="text-slate-400 hover:text-slate-700 text-base">✕</button>
        </div>
        <div class="space-y-3 text-xs">
            <div>
                <label class="block font-bold text-slate-700 mb-1">URL Tujuan (dengan https://)</label>
                <input type="url" id="linkUrlInput" placeholder="https://nazwagraha.com/kontak" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Teks Tautan</label>
                <input type="text" id="linkTextInput" placeholder="Konsultasi Gratis Sekarang" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" id="linkNewTab" checked class="rounded border-slate-300 text-orange-600 focus:ring-0">
                <label for="linkNewTab" class="text-slate-700 font-medium">Buka di tab baru (target="_blank")</label>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
            <button type="button" id="cancelLinkModal" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">Batal</button>
            <button type="button" id="applyLinkBtn" class="px-5 py-2 rounded-xl orange-gradient text-white font-bold text-xs shadow-md">Terapkan Link</button>
        </div>
    </div>
</div>

<!-- Modal Dialog Sisipkan Gambar (Upload & URL) -->
<div id="imageModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h4 id="imageModalTitle" class="font-black text-slate-900 text-sm flex items-center gap-2">🖼️ Sisipkan Gambar ke Artikel</h4>
            <button type="button" id="closeImageModal" class="text-slate-400 hover:text-slate-700 text-base">✕</button>
        </div>

        <!-- Tab Upload / URL -->
        <div class="flex items-center gap-2 border-b border-slate-200 pb-2 text-xs font-bold">
            <button type="button" id="tabUploadImg" class="px-3 py-1.5 rounded-lg bg-orange-100 text-orange-700">Upload File Komputer/HP</button>
            <button type="button" id="tabUrlImg" class="px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800">Gunakan Link URL Gambar</button>
        </div>

        <div class="space-y-3.5 text-xs">
            <!-- Box Upload File -->
            <div id="boxUploadImg" class="space-y-2">
                <label class="block font-bold text-slate-700">Pilih File Gambar</label>
                <input type="file" id="contentImageFileInput" accept=".webp,.png,.jpg,.jpeg,.gif,.svg,.bmp,.avif,image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-xs text-slate-600 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-orange-100 file:text-orange-700">
                <div id="uploadImgStatus" class="text-[11px] text-slate-500"></div>
            </div>

            <!-- Box URL Gambar -->
            <div id="boxUrlImg" class="hidden space-y-2">
                <label class="block font-bold text-slate-700">URL Gambar</label>
                <input type="url" id="contentImageUrlInput" placeholder="https://domain.com/gambar.webp" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>

            <!-- Alt Text Gambar Konten (PENTING SEO) -->
            <div>
                <label class="block font-bold text-slate-700 mb-1">Alt Text Gambar (Wajib untuk SEO) <span class="text-red-500">*</span></label>
                <input type="text" id="contentImageAltInput" placeholder="Deskripsikan gambar dengan kata kunci relevan" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>

            <!-- Caption Gambar Opsional -->
            <div>
                <label class="block font-bold text-slate-700 mb-1">Keterangan Gambar / Caption (Opsional)</label>
                <input type="text" id="contentImageCaptionInput" placeholder="Contoh: Ilustrasi arsitektur jaringan LAN kantor modern" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>

            <!-- Pengaturan Ukuran & Posisi Tampilan Gambar -->
            <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-3">
                <div class="font-bold text-slate-800 text-[11px] uppercase tracking-wider flex items-center gap-1.5 text-orange-600">
                    <span>📐</span> Pengaturan Ukuran & Tampilan Gambar
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Ukuran Lebar</label>
                        <select id="contentImageSizeInput" class="w-full bg-white border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-orange-500 font-semibold">
                            <option value="100%">100% - Lebar Penuh (Standar)</option>
                            <option value="75%">75% - Lebar Besar</option>
                            <option value="50%">50% - Lebar Sedang</option>
                            <option value="30%">30% - Kecil / Thumbnail</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Posisi / Perataan</label>
                        <select id="contentImageAlignInput" class="w-full bg-white border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-orange-500 font-semibold">
                            <option value="center">⏺ Tengah (Baris Sendiri)</option>
                            <option value="left">⬅ Kiri (Teks di Kanan / Wrap)</option>
                            <option value="right">➡ Kanan (Teks di Kiri / Wrap)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Lengkungan Sudut</label>
                        <select id="contentImageRadiusInput" class="w-full bg-white border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
                            <option value="rounded-2xl">Modern (Melengkung 2xl)</option>
                            <option value="rounded-lg">Halus (Melengkung Sedang)</option>
                            <option value="rounded-none">Persegi Tegak (Tanpa Sudut)</option>
                            <option value="rounded-full">Lingkaran / Bulat Penuh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Efek Bayangan</label>
                        <select id="contentImageShadowInput" class="w-full bg-white border border-slate-200 rounded-lg px-2.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
                            <option value="shadow-md">Bayangan Lembut (Standar)</option>
                            <option value="shadow-xl">Bayangan Menonjol (Elegan)</option>
                            <option value="shadow-none">Tanpa Bayangan (Flat)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
            <button type="button" id="deleteImageModalBtn" class="hidden px-3.5 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs border border-rose-200 transition flex items-center gap-1.5">
                <span>🗑️</span> Hapus Gambar
            </button>
            <div class="flex items-center gap-2 ml-auto">
                <button type="button" id="cancelImageModal" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">Batal</button>
                <button type="button" id="applyImageBtn" class="px-5 py-2 rounded-xl orange-gradient text-white font-bold text-xs shadow-md flex items-center gap-1.5">
                    <span id="applyImageBtnIcon">✓</span> <span id="applyImageBtnText">Sisipkan Gambar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dialog Sisipkan Tabel -->
<div id="tableModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-2xl space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2">
                <span class="p-1 rounded bg-emerald-100 text-emerald-700 text-xs">📊</span> Buat & Sisipkan Tabel Baru
            </h4>
            <button type="button" id="closeTableModal" class="text-slate-400 hover:text-slate-700 text-base">✕</button>
        </div>

        <!-- Pilihan Cepat / Preset Ukuran -->
        <div>
            <label class="block font-bold text-slate-700 text-[11px] mb-1.5">Ukuran Cepat:</label>
            <div class="grid grid-cols-4 gap-1.5 text-xs font-bold text-slate-700">
                <button type="button" class="tbl-preset-btn py-1.5 px-2 rounded-lg bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-300 border border-slate-200 transition text-center" data-rows="3" data-cols="2">2 Kolom × 3 Baris</button>
                <button type="button" class="tbl-preset-btn py-1.5 px-2 rounded-lg bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-300 border border-slate-200 transition text-center" data-rows="4" data-cols="3">3 Kolom × 4 Baris</button>
                <button type="button" class="tbl-preset-btn py-1.5 px-2 rounded-lg bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-300 border border-slate-200 transition text-center" data-rows="5" data-cols="3">3 Kolom × 5 Baris</button>
                <button type="button" class="tbl-preset-btn py-1.5 px-2 rounded-lg bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-300 border border-slate-200 transition text-center" data-rows="5" data-cols="4">4 Kolom × 5 Baris</button>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3 text-xs">
            <div>
                <label class="block font-bold text-slate-700 mb-1">Jumlah Baris</label>
                <input type="number" id="tableRowsInput" min="1" max="50" value="4" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-emerald-500 font-bold text-slate-800">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Jumlah Kolom</label>
                <input type="number" id="tableColsInput" min="1" max="20" value="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-emerald-500 font-bold text-slate-800">
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
            <button type="button" id="cancelTableModal" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">Batal</button>
            <button type="button" id="applyTableBtn" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">✓ Sisipkan Tabel</button>
        </div>
    </div>
</div>

<!-- Modal Dialog Sisipkan Simbol & Karakter Khusus -->
<div id="symbolModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2">
                <span class="p-1 rounded bg-orange-100 text-orange-600 text-xs">Ω</span> Sisipkan Simbol & Karakter Khusus
            </h4>
            <button type="button" id="closeSymbolModal" class="text-slate-400 hover:text-slate-700 text-base">✕</button>
        </div>

        <!-- Symbol Categories / Tabs -->
        <div class="flex items-center gap-1 overflow-x-auto pb-1 border-b border-slate-100 text-xs font-semibold" id="symbolCatTabs">
            <button type="button" data-cat="all" class="symbol-cat-btn px-2.5 py-1 rounded-lg bg-orange-500 text-white font-bold">Semua</button>
            <button type="button" data-cat="currency" class="symbol-cat-btn px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Mata Uang</button>
            <button type="button" data-cat="math" class="symbol-cat-btn px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Matematika</button>
            <button type="button" data-cat="typography" class="symbol-cat-btn px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Tipografi</button>
            <button type="button" data-cat="arrows" class="symbol-cat-btn px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Panah</button>
            <button type="button" data-cat="greek" class="symbol-cat-btn px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Yunani</button>
        </div>

        <!-- Symbols Grid -->
        <div class="max-h-64 overflow-y-auto p-1 grid grid-cols-8 sm:grid-cols-10 gap-1.5 text-center" id="symbolGrid"></div>

        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
            <span class="text-[11px] text-slate-400">Klik salah satu karakter untuk langsung menyisipkan ke artikel.</span>
            <button type="button" id="cancelSymbolModal" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">Tutup</button>
        </div>
    </div>
</div>

<!-- Modal Dialog Cari & Ganti Kata (Find & Replace) -->
<div id="findReplaceModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2">
                <span class="p-1 rounded bg-orange-100 text-orange-600 text-xs">🔍</span> Cari & Ganti Teks (Find & Replace)
            </h4>
            <button type="button" id="closeFindReplaceModal" class="text-slate-400 hover:text-slate-700 text-base">✕</button>
        </div>

        <div class="space-y-3 text-xs">
            <div>
                <label class="block font-bold text-slate-700 mb-1">Cari Kata / Teks</label>
                <input type="text" id="findInput" placeholder="Masukkan kata yang ingin dicari..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Ganti Dengan</label>
                <input type="text" id="replaceInput" placeholder="Masukkan kata pengganti..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-orange-500">
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" id="matchCaseCheckbox" class="rounded border-slate-300 text-orange-600 focus:ring-orange-500 w-4 h-4 cursor-pointer">
                <label for="matchCaseCheckbox" class="text-slate-600 font-medium cursor-pointer">Cocokkan Huruf Besar/Kecil (Match Case)</label>
            </div>
            <div id="findReplaceStatus" class="text-[11px] text-slate-500 min-h-[16px]"></div>
        </div>

        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
            <button type="button" id="cancelFindReplaceModal" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">Tutup</button>
            <div class="flex items-center gap-2">
                <button type="button" id="findNextBtn" class="px-3.5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition">Cari Berikutnya</button>
                <button type="button" id="replaceBtn" class="px-3.5 py-2 rounded-xl bg-orange-100 hover:bg-orange-200 text-orange-800 font-bold text-xs transition">Ganti</button>
                <button type="button" id="replaceAllBtn" class="px-4 py-2 rounded-xl orange-gradient text-white font-bold text-xs shadow-md transition">Ganti Semua</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Elements references
    const articleForm = document.getElementById('articleForm');
    const editorVisual = document.getElementById('editorVisual');
    const editorSource = document.getElementById('editorSource');
    const articleContentInput = document.getElementById('articleContentInput');
    const toggleCodeViewBtn = document.getElementById('toggleCodeViewBtn');
    const editorStats = document.getElementById('editorStats');

    // Title & Slug
    const articleTitle = document.getElementById('articleTitle');
    const articleSlug = document.getElementById('articleSlug');
    const titleCounter = document.getElementById('titleCounter');

    // Meta SEO fields
    const metaTitleInput = document.getElementById('metaTitleInput');
    const metaTitleCounter = document.getElementById('metaTitleCounter');
    const metaTitleBar = document.getElementById('metaTitleBar');

    const metaDescInput = document.getElementById('metaDescInput');
    const metaDescCounter = document.getElementById('metaDescCounter');
    const metaDescBar = document.getElementById('metaDescBar');

    const metaKeywordsInput = document.getElementById('metaKeywordsInput');

    // SERP Preview elements
    const serpTitle = document.getElementById('serpTitle');
    const serpSnippet = document.getElementById('serpSnippet');
    const serpUrl = document.getElementById('serpUrl');
    const serpTags = document.getElementById('serpTags');
    const serpContainer = document.getElementById('serpContainer');
    const previewMobileBtn = document.getElementById('previewMobileBtn');
    const previewDesktopBtn = document.getElementById('previewDesktopBtn');

    let isCodeMode = false;
    let savedSelection = null;

    function saveSelection() {
        if (window.getSelection) {
            const sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                return sel.getRangeAt(0);
            }
        }
        return null;
    }
    function restoreSelection(range) {
        if (range && window.getSelection) {
            const sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
        }
    }

    // Helper: Execute document formatting command
    function execCmd(command, value = null) {
        editorVisual.focus();
        document.execCommand(command, false, value);
        syncContent();
        updateToolbarStates();
    }

    // Helper: Apply heading / block formatting reliably cross-browser
    function applyFormatBlock(tag) {
        editorVisual.focus();
        try {
            document.execCommand('formatBlock', false, '<' + tag + '>');
        } catch(e) {
            document.execCommand('formatBlock', false, tag);
        }
        syncContent();
        updateToolbarStates();
    }

    // PREVENT FOCUS LOSS: All toolbar buttons must prevent default on mousedown
    document.querySelectorAll('.editor-btn').forEach(btn => {
        btn.addEventListener('mousedown', function(e) {
            e.preventDefault(); // Retains contenteditable text selection!
        });
    });

    // Connect toolbar buttons with data-cmd
    document.querySelectorAll('.editor-btn[data-cmd]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const cmd = this.getAttribute('data-cmd');
            if (cmd === 'heading2') {
                applyFormatBlock('h2');
            } else if (cmd === 'heading3') {
                applyFormatBlock('h3');
            } else if (cmd === 'heading1') {
                applyFormatBlock('h1');
            } else {
                execCmd(cmd);
            }
        });
    });

    // Heading & Block format dropdown
    const formatBlockSelect = document.getElementById('formatBlockSelect');
    if (formatBlockSelect) {
        formatBlockSelect.addEventListener('mousedown', function() {
            savedSelection = saveSelection();
        });
        formatBlockSelect.addEventListener('change', function() {
            if (savedSelection) {
                restoreSelection(savedSelection);
            }
            const val = this.value;
            applyFormatBlock(val);
        });
    }

    // Font Family Select
    const fontFamilySelect = document.getElementById('fontFamilySelect');
    if (fontFamilySelect) {
        fontFamilySelect.addEventListener('mousedown', function() {
            savedSelection = saveSelection();
        });
        fontFamilySelect.addEventListener('change', function() {
            if (savedSelection) restoreSelection(savedSelection);
            const val = this.value;
            if (val) {
                execCmd('fontName', val);
            }
        });
    }

    // Font Size Select (with standard span inline-styling)
    const fontSizeSelect = document.getElementById('fontSizeSelect');
    if (fontSizeSelect) {
        fontSizeSelect.addEventListener('mousedown', function() {
            savedSelection = saveSelection();
        });
        fontSizeSelect.addEventListener('change', function() {
            if (savedSelection) restoreSelection(savedSelection);
            const val = this.value;
            if (val) {
                editorVisual.focus();
                document.execCommand('fontSize', false, '7');
                const fontTags = editorVisual.querySelectorAll('font[size="7"]');
                fontTags.forEach(f => {
                    const span = document.createElement('span');
                    span.style.fontSize = val;
                    span.innerHTML = f.innerHTML;
                    f.parentNode.replaceChild(span, f);
                });
                syncContent();
                updateToolbarStates();
            }
        });
    }

    // Line Spacing / Tinggi Baris Paragraf
    const lineHeightSelect = document.getElementById('lineHeightSelect');
    if (lineHeightSelect) {
        lineHeightSelect.addEventListener('mousedown', function() {
            savedSelection = saveSelection();
        });
        lineHeightSelect.addEventListener('change', function() {
            if (savedSelection) restoreSelection(savedSelection);
            const val = this.value;
            if (val) {
                editorVisual.focus();
                const sel = window.getSelection();
                if (sel && sel.rangeCount > 0) {
                    let node = sel.anchorNode;
                    if (node && node.nodeType === 3) node = node.parentNode;
                    let block = node ? node.closest('p, h1, h2, h3, h4, h5, blockquote, li, div') : null;
                    if (block && block !== editorVisual) {
                        block.style.lineHeight = val;
                    } else {
                        document.execCommand('formatBlock', false, 'p');
                        let p = window.getSelection().anchorNode;
                        if (p && p.nodeType === 3) p = p.parentNode;
                        if (p && p !== editorVisual) p.style.lineHeight = val;
                    }
                    syncContent();
                }
            }
        });
    }

    // Checklist / To-Do List Insertion
    const btnChecklist = document.getElementById('btnChecklist');
    if (btnChecklist) {
        btnChecklist.addEventListener('click', function(e) {
            e.preventDefault();
            editorVisual.focus();
            const checklistHtml = '<ul class="task-list"><li class="task-list-item"><input type="checkbox"> <span>Item ceklis baru</span></li></ul><p><br></p>';
            document.execCommand('insertHTML', false, checklistHtml);
            syncContent();
        });
    }

    // Fullscreen Mode Toggle
    const toggleFullscreenBtn = document.getElementById('toggleFullscreenBtn');
    const fullscreenBtnText = document.getElementById('fullscreenBtnText');
    const editorCardContainer = document.getElementById('editorCardContainer');
    let isFullscreen = false;

    function toggleFullscreen() {
        isFullscreen = !isFullscreen;
        if (isFullscreen) {
            editorCardContainer.classList.add('is-fullscreen');
            document.body.style.overflow = 'hidden';
            if (fullscreenBtnText) fullscreenBtnText.innerText = 'Tutup Layar Penuh';
            toggleFullscreenBtn.classList.add('bg-orange-500', 'text-white', 'border-orange-600');
            toggleFullscreenBtn.classList.remove('bg-slate-50', 'text-slate-700');
        } else {
            editorCardContainer.classList.remove('is-fullscreen');
            document.body.style.overflow = '';
            if (fullscreenBtnText) fullscreenBtnText.innerText = 'Layar Penuh';
            toggleFullscreenBtn.classList.remove('bg-orange-500', 'text-white', 'border-orange-600');
            toggleFullscreenBtn.classList.add('bg-slate-50', 'text-slate-700');
        }
    }
    if (toggleFullscreenBtn) {
        toggleFullscreenBtn.addEventListener('click', toggleFullscreen);
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isFullscreen) {
            toggleFullscreen();
        }
    });

    // Keyboard support: Tab for Indent, Shift+Tab for Outdent inside lists
    editorVisual.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            e.preventDefault();
            if (e.shiftKey) {
                execCmd('outdent');
            } else {
                execCmd('indent');
            }
        }
    });

    // Active state sync on toolbar buttons
    function updateToolbarStates() {
        const stateMap = [
            { cmd: 'bold', id: 'btnBold' },
            { cmd: 'italic', id: 'btnItalic' },
            { cmd: 'underline', id: 'btnUnderline' },
            { cmd: 'strikeThrough', id: 'btnStrike' },
            { cmd: 'subscript', id: 'btnSubscript' },
            { cmd: 'superscript', id: 'btnSuperscript' },
            { cmd: 'insertUnorderedList', id: 'btnBullets' },
            { cmd: 'insertOrderedList', id: 'btnNumbering' },
            { cmd: 'justifyLeft', id: 'btnAlignLeft' },
            { cmd: 'justifyCenter', id: 'btnAlignCenter' },
            { cmd: 'justifyRight', id: 'btnAlignRight' },
            { cmd: 'justifyFull', id: 'btnAlignJustify' },
        ];

        stateMap.forEach(item => {
            const btn = document.getElementById(item.id);
            if (!btn) return;
            try {
                if (document.queryCommandState(item.cmd)) {
                    btn.classList.add('is-active', 'bg-orange-100', 'text-orange-700', 'border-orange-300');
                    btn.classList.remove('text-slate-700', 'border-transparent');
                } else {
                    btn.classList.remove('is-active', 'bg-orange-100', 'text-orange-700', 'border-orange-300');
                    btn.classList.add('text-slate-700', 'border-transparent');
                }
            } catch(e) {}
        });

        // Sync dropdown value with current block
        try {
            const block = document.queryCommandValue('formatBlock');
            if (block && formatBlockSelect) {
                const clean = block.toLowerCase().replace(/<|>/g, '');
                if (['h1','h2','h3','h4','h5','p','blockquote','pre'].includes(clean)) {
                    formatBlockSelect.value = clean;
                }
            }
        } catch(e) {}
    }

    editorVisual.addEventListener('keyup', updateToolbarStates);
    editorVisual.addEventListener('mouseup', updateToolbarStates);
    document.addEventListener('selectionchange', function() {
        if (document.activeElement === editorVisual) {
            updateToolbarStates();
        }
    });

    // Colors
    document.getElementById('textColorPicker').addEventListener('input', function() {
        execCmd('foreColor', this.value);
    });
    document.getElementById('bgColorPicker').addEventListener('input', function() {
        execCmd('hiliteColor', this.value);
    });

    // Toggle Code / HTML View
    toggleCodeViewBtn.addEventListener('click', function() {
        if (!isCodeMode) {
            editorSource.value = editorVisual.innerHTML;
            editorVisual.classList.add('hidden');
            editorSource.classList.remove('hidden');
            toggleCodeViewBtn.innerHTML = '<span>👁️</span> Mode Tampilan Visual';
            toggleCodeViewBtn.classList.add('bg-orange-100', 'text-orange-700');
            isCodeMode = true;
        } else {
            editorVisual.innerHTML = editorSource.value;
            editorSource.classList.add('hidden');
            editorVisual.classList.remove('hidden');
            toggleCodeViewBtn.innerHTML = '<span>&lt;/&gt;</span> Mode Kode HTML';
            toggleCodeViewBtn.classList.remove('bg-orange-100', 'text-orange-700');
            isCodeMode = false;
            syncContent();
        }
    });

    // Sync content to hidden textarea & calculate stats (words, chars, reading time)
    function syncContent() {
        let html = isCodeMode ? editorSource.value : editorVisual.innerHTML;
        articleContentInput.value = html;

        // Count words, chars & reading time
        const text = editorVisual.innerText || '';
        const words = text.trim() ? text.trim().split(/\s+/).filter(Boolean).length : 0;
        const chars = text.length;
        const readingTimeMin = Math.max(1, Math.ceil(words / 200));
        editorStats.innerText = `${words} kata | ${chars} karakter | ~${readingTimeMin} mnt baca`;
    }

    editorVisual.addEventListener('input', syncContent);
    editorSource.addEventListener('input', syncContent);

    // Ensure synced on form submit
    articleForm.addEventListener('submit', function() {
        if (isCodeMode) {
            editorVisual.innerHTML = editorSource.value;
        }
        articleContentInput.value = isCodeMode ? editorSource.value : editorVisual.innerHTML;
    });

    // Slug generation from title helper
    function stringToSlug(str) {
        return str.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
    }

    // Live Title & Slug handling
    function updateTitleCount() {
        const val = articleTitle.value || '';
        titleCounter.innerText = val.length + ' karakter';
    }
    articleTitle.addEventListener('input', function() {
        updateTitleCount();
        if (!articleSlug.dataset.customEdited) {
            articleSlug.value = stringToSlug(this.value);
            serpUrl.innerText = 'https://nazwagraha.com/artikel/' + (articleSlug.value || 'slug-artikel');
        }
        if (!metaTitleInput.value) {
            serpTitle.innerText = this.value || 'Judul Artikel Menarik di Sini';
        }
    });

    articleSlug.addEventListener('input', function() {
        this.dataset.customEdited = 'true';
        serpUrl.innerText = 'https://nazwagraha.com/artikel/' + (articleSlug.value || 'slug-artikel');
    });

    // Copy title to meta title button
    document.getElementById('copyTitleToMetaBtn').addEventListener('click', function() {
        metaTitleInput.value = articleTitle.value;
        updateMetaCounters();
        updateSerp();
    });

    // Copy excerpt to meta desc button
    document.getElementById('copyExcerptToMetaBtn').addEventListener('click', function() {
        const excerptVal = document.querySelector('textarea[name="excerpt"]').value;
        if (excerptVal) {
            metaDescInput.value = excerptVal;
            updateMetaCounters();
            updateSerp();
        }
    });

    // Meta Title Counter & Bar
    function updateMetaCounters() {
        const titleLen = metaTitleInput.value.length;
        metaTitleCounter.innerText = titleLen + ' / 60';
        const titlePct = Math.min(100, (titleLen / 60) * 100);
        metaTitleBar.style.width = titlePct + '%';
        if (titleLen < 40) {
            metaTitleBar.className = 'h-full bg-amber-500 transition-all duration-300';
        } else if (titleLen <= 60) {
            metaTitleBar.className = 'h-full bg-emerald-500 transition-all duration-300';
        } else {
            metaTitleBar.className = 'h-full bg-rose-500 transition-all duration-300';
        }

        const descLen = metaDescInput.value.length;
        metaDescCounter.innerText = descLen + ' / 160';
        const descPct = Math.min(100, (descLen / 160) * 100);
        metaDescBar.style.width = descPct + '%';
        if (descLen < 100) {
            metaDescBar.className = 'h-full bg-amber-500 transition-all duration-300';
        } else if (descLen <= 160) {
            metaDescBar.className = 'h-full bg-emerald-500 transition-all duration-300';
        } else {
            metaDescBar.className = 'h-full bg-rose-500 transition-all duration-300';
        }
    }

    metaTitleInput.addEventListener('input', function() {
        updateMetaCounters();
        updateSerp();
    });

    metaDescInput.addEventListener('input', function() {
        updateMetaCounters();
        updateSerp();
    });

    // Keywords live chips in SERP
    metaKeywordsInput.addEventListener('input', function() {
        const val = this.value;
        if (!val.trim()) {
            serpTags.innerHTML = '<span class="text-[10px] text-slate-400 italic">Belum ada keyword dimasukkan</span>';
            return;
        }
        const kws = val.split(',');
        let html = '';
        kws.forEach(k => {
            const clean = k.trim();
            if (clean) {
                html += '<span class="text-[10px] px-2 py-0.5 rounded bg-slate-100 text-slate-600 font-medium"># ' + clean + '</span> ';
            }
        });
        serpTags.innerHTML = html;
    });

    // Update SERP preview card
    function updateSerp() {
        serpTitle.innerText = metaTitleInput.value || articleTitle.value || 'Judul Artikel Menarik di Sini';
        serpSnippet.innerText = metaDescInput.value || 'Deskripsi cuplikan Google akan muncul di sini sesuai meta description yang diinput...';
        serpUrl.innerText = 'https://nazwagraha.com/artikel/' + (articleSlug.value || 'slug-artikel');
    }

    // SERP Mobile vs Desktop preview toggle
    previewMobileBtn.addEventListener('click', function() {
        previewMobileBtn.className = 'px-2 py-0.5 rounded font-bold bg-orange-500 text-white transition';
        previewDesktopBtn.className = 'px-2 py-0.5 rounded font-bold text-slate-400 hover:text-white transition';
        serpContainer.className = 'mt-4 p-4 bg-white rounded-xl text-slate-800 shadow-md font-sans transition-all max-w-[360px] mx-auto';
    });
    previewDesktopBtn.addEventListener('click', function() {
        previewDesktopBtn.className = 'px-2 py-0.5 rounded font-bold bg-orange-500 text-white transition';
        previewMobileBtn.className = 'px-2 py-0.5 rounded font-bold text-slate-400 hover:text-white transition';
        serpContainer.className = 'mt-4 p-4 bg-white rounded-xl text-slate-800 shadow-md font-sans transition-all w-full';
    });

    updateMetaCounters();
    syncContent();

    // ==========================================
    // MODAL DIALOGS: LINK, IMAGE, TABLE
    // ==========================================

    // LINK MODAL
    const linkModal = document.getElementById('linkModal');
    const openLinkModalBtn = document.getElementById('openLinkModalBtn');
    const closeLinkModal = document.getElementById('closeLinkModal');
    const cancelLinkModal = document.getElementById('cancelLinkModal');
    const applyLinkBtn = document.getElementById('applyLinkBtn');
    const linkUrlInput = document.getElementById('linkUrlInput');
    const linkTextInput = document.getElementById('linkTextInput');
    const linkNewTab = document.getElementById('linkNewTab');

    openLinkModalBtn.addEventListener('click', function() {
        savedSelection = saveSelection();
        const selectedText = window.getSelection().toString();
        linkTextInput.value = selectedText || '';
        linkUrlInput.value = '';
        linkModal.classList.remove('hidden');
        linkModal.classList.add('flex');
        linkUrlInput.focus();
    });

    function hideLinkModal() {
        linkModal.classList.add('hidden');
        linkModal.classList.remove('flex');
    }
    closeLinkModal.addEventListener('click', hideLinkModal);
    cancelLinkModal.addEventListener('click', hideLinkModal);

    applyLinkBtn.addEventListener('click', function() {
        const url = linkUrlInput.value.trim();
        const text = linkTextInput.value.trim() || url;
        if (!url) {
            alert('Silakan masukkan URL tujuan.');
            return;
        }
        hideLinkModal();
        editorVisual.focus();
        restoreSelection(savedSelection);

        const targetAttr = linkNewTab.checked ? ' target="_blank" rel="noopener noreferrer"' : '';
        const linkHtml = `<a href="${url}"${targetAttr} class="text-orange-600 font-semibold underline hover:text-orange-700">${text}</a>`;
        document.execCommand('insertHTML', false, linkHtml);
        syncContent();
    });

    // IMAGE QUICK TOOLBAR & MANAGEMENT
    const imageQuickToolbar = document.getElementById('imageQuickToolbar');
    const imgQuickSettingsBtn = document.getElementById('imgQuickSettingsBtn');
    const imgQuickDeleteBtn = document.getElementById('imgQuickDeleteBtn');

    let activeEditingImg = null;
    let activeEditingFigure = null;
    let isEditingExistingImage = false;

    // Handle clicking image inside visual editor
    editorVisual.addEventListener('click', function(e) {
        if (e.target.tagName === 'IMG') {
            e.stopPropagation();
            let target = e.target;
            let figure = target.closest('figure');
            
            // Auto wrap with figure if bare img
            if (!figure) {
                figure = document.createElement('figure');
                figure.className = 'article-img-box align-center';
                figure.style.cssText = 'max-width: 100%; margin: 1.5rem auto; text-align: center; clear: both;';
                target.parentNode.insertBefore(figure, target);
                figure.appendChild(target);
            }

            editorVisual.querySelectorAll('figure.article-img-box').forEach(f => f.classList.remove('is-selected'));
            figure.classList.add('is-selected');

            activeEditingImg = target;
            activeEditingFigure = figure;

            positionQuickToolbar();
        }
    });

    function positionQuickToolbar() {
        if (!activeEditingImg || !activeEditingFigure || !imageQuickToolbar) {
            hideQuickToolbar();
            return;
        }
        const rect = activeEditingImg.getBoundingClientRect();
        imageQuickToolbar.classList.remove('hidden');
        imageQuickToolbar.classList.add('flex');

        const tbWidth = imageQuickToolbar.offsetWidth || 360;
        const tbHeight = imageQuickToolbar.offsetHeight || 38;

        let top = rect.top - tbHeight - 8;
        if (top < 60) {
            top = rect.bottom + 8;
        }
        let left = rect.left + (rect.width / 2) - (tbWidth / 2);
        if (left < 10) left = 10;
        if (left + tbWidth > window.innerWidth - 10) {
            left = window.innerWidth - tbWidth - 10;
        }

        imageQuickToolbar.style.top = `${top}px`;
        imageQuickToolbar.style.left = `${left}px`;

        updateQuickToolbarUI();
    }

    function hideQuickToolbar() {
        if (!imageQuickToolbar) return;
        imageQuickToolbar.classList.add('hidden');
        imageQuickToolbar.classList.remove('flex');
        if (activeEditingFigure) {
            activeEditingFigure.classList.remove('is-selected');
        }
        activeEditingImg = null;
        activeEditingFigure = null;
    }

    function updateQuickToolbarUI() {
        if (!activeEditingFigure) return;
        // Check size
        const curWidth = activeEditingFigure.style.maxWidth || '100%';
        document.querySelectorAll('.img-quick-size').forEach(btn => {
            if (btn.getAttribute('data-size') === curWidth) {
                btn.className = 'img-quick-size px-2 py-1 rounded-md bg-orange-600 text-white font-black transition shadow-sm';
            } else {
                btn.className = 'img-quick-size px-2 py-1 rounded-md bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold transition';
            }
        });

        // Check alignment
        const isLeft = activeEditingFigure.classList.contains('align-left');
        const isRight = activeEditingFigure.classList.contains('align-right');
        const curAlign = isLeft ? 'left' : (isRight ? 'right' : 'center');

        document.querySelectorAll('.img-quick-align').forEach(btn => {
            if (btn.getAttribute('data-align') === curAlign) {
                btn.className = 'img-quick-align px-2 py-1 rounded-md bg-orange-600 text-white font-black transition shadow-sm flex items-center gap-1';
            } else {
                btn.className = 'img-quick-align px-2 py-1 rounded-md bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold transition flex items-center gap-1';
            }
        });
    }

    function applyFigureAlign(fig, align) {
        fig.classList.remove('align-left', 'align-right', 'align-center');
        if (align === 'left') {
            fig.classList.add('align-left');
            fig.style.float = 'left';
            fig.style.margin = '0.5rem 1.5rem 1rem 0';
            fig.style.clear = 'left';
            fig.style.display = 'block';
            if (!fig.style.maxWidth || fig.style.maxWidth === '100%') {
                fig.style.maxWidth = '50%';
            }
        } else if (align === 'right') {
            fig.classList.add('align-right');
            fig.style.float = 'right';
            fig.style.margin = '0.5rem 0 1rem 1.5rem';
            fig.style.clear = 'right';
            fig.style.display = 'block';
            if (!fig.style.maxWidth || fig.style.maxWidth === '100%') {
                fig.style.maxWidth = '50%';
            }
        } else {
            fig.classList.add('align-center');
            fig.style.float = 'none';
            fig.style.margin = '1.5rem auto';
            fig.style.clear = 'both';
            fig.style.display = 'block';
            fig.style.textAlign = 'center';
        }
    }

    // Quick toolbar button listeners
    document.querySelectorAll('.img-quick-size').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (!activeEditingFigure) return;
            const sz = this.getAttribute('data-size');
            activeEditingFigure.style.maxWidth = sz;
            syncContent();
            updateQuickToolbarUI();
            positionQuickToolbar();
        });
    });

    document.querySelectorAll('.img-quick-align').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (!activeEditingFigure) return;
            const align = this.getAttribute('data-align');
            applyFigureAlign(activeEditingFigure, align);
            syncContent();
            updateQuickToolbarUI();
            positionQuickToolbar();
        });
    });

    if (imgQuickDeleteBtn) {
        imgQuickDeleteBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (!activeEditingFigure) return;
            if (confirm('Hapus gambar ini dari artikel?')) {
                activeEditingFigure.remove();
                hideQuickToolbar();
                syncContent();
            }
        });
    }

    if (imgQuickSettingsBtn) {
        imgQuickSettingsBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (!activeEditingFigure || !activeEditingImg) return;
            openEditImageModal(activeEditingFigure, activeEditingImg);
        });
    }

    // Dismiss toolbar when clicking outside
    document.addEventListener('click', function(e) {
        if (imageQuickToolbar && !imageQuickToolbar.contains(e.target)) {
            if (!editorVisual || !editorVisual.contains(e.target) || e.target.tagName !== 'IMG') {
                hideQuickToolbar();
            }
        }
    });

    window.addEventListener('scroll', function() {
        if (activeEditingImg) {
            positionQuickToolbar();
        }
    }, { passive: true });

    window.addEventListener('resize', function() {
        if (activeEditingImg) {
            positionQuickToolbar();
        }
    }, { passive: true });

    // IMAGE MODAL
    const imageModal = document.getElementById('imageModal');
    const imageModalTitle = document.getElementById('imageModalTitle');
    const openImageModalBtn = document.getElementById('openImageModalBtn');
    const closeImageModal = document.getElementById('closeImageModal');
    const cancelImageModal = document.getElementById('cancelImageModal');
    const applyImageBtn = document.getElementById('applyImageBtn');
    const applyImageBtnIcon = document.getElementById('applyImageBtnIcon');
    const applyImageBtnText = document.getElementById('applyImageBtnText');
    const deleteImageModalBtn = document.getElementById('deleteImageModalBtn');

    const tabUploadImg = document.getElementById('tabUploadImg');
    const tabUrlImg = document.getElementById('tabUrlImg');
    const boxUploadImg = document.getElementById('boxUploadImg');
    const boxUrlImg = document.getElementById('boxUrlImg');

    const contentImageFileInput = document.getElementById('contentImageFileInput');
    const contentImageUrlInput = document.getElementById('contentImageUrlInput');
    const contentImageAltInput = document.getElementById('contentImageAltInput');
    const contentImageCaptionInput = document.getElementById('contentImageCaptionInput');
    const contentImageSizeInput = document.getElementById('contentImageSizeInput');
    const contentImageAlignInput = document.getElementById('contentImageAlignInput');
    const contentImageRadiusInput = document.getElementById('contentImageRadiusInput');
    const contentImageShadowInput = document.getElementById('contentImageShadowInput');
    const uploadImgStatus = document.getElementById('uploadImgStatus');

    let currentImgTab = 'upload';

    tabUploadImg.addEventListener('click', function() {
        currentImgTab = 'upload';
        tabUploadImg.className = 'px-3 py-1.5 rounded-lg bg-orange-100 text-orange-700 font-bold';
        tabUrlImg.className = 'px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 font-bold';
        boxUploadImg.classList.remove('hidden');
        boxUrlImg.classList.add('hidden');
    });

    tabUrlImg.addEventListener('click', function() {
        currentImgTab = 'url';
        tabUrlImg.className = 'px-3 py-1.5 rounded-lg bg-orange-100 text-orange-700 font-bold';
        tabUploadImg.className = 'px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 font-bold';
        boxUrlImg.classList.remove('hidden');
        boxUploadImg.classList.add('hidden');
    });

    openImageModalBtn.addEventListener('click', function() {
        isEditingExistingImage = false;
        savedSelection = saveSelection();
        imageModalTitle.innerHTML = '🖼️ Sisipkan Gambar ke Artikel';
        applyImageBtnText.innerText = 'Sisipkan Gambar';
        applyImageBtnIcon.innerText = '✓';
        deleteImageModalBtn.classList.add('hidden');
        deleteImageModalBtn.classList.remove('flex');
        
        tabUploadImg.click();
        contentImageFileInput.value = '';
        contentImageUrlInput.value = '';
        contentImageAltInput.value = '';
        contentImageCaptionInput.value = '';
        contentImageSizeInput.value = '100%';
        contentImageAlignInput.value = 'center';
        contentImageRadiusInput.value = 'rounded-2xl';
        contentImageShadowInput.value = 'shadow-md';
        uploadImgStatus.innerText = '';
        
        imageModal.classList.remove('hidden');
        imageModal.classList.add('flex');
    });

    function openEditImageModal(fig, img) {
        isEditingExistingImage = true;
        imageModalTitle.innerHTML = '⚙️ Edit Ukuran & Tampilan Gambar';
        applyImageBtnText.innerText = 'Simpan Perubahan';
        applyImageBtnIcon.innerText = '💾';
        deleteImageModalBtn.classList.remove('hidden');
        deleteImageModalBtn.classList.remove('flex');
        deleteImageModalBtn.classList.add('flex');
        uploadImgStatus.innerText = '';

        tabUrlImg.click();
        contentImageFileInput.value = '';
        contentImageUrlInput.value = img.getAttribute('src') || '';
        contentImageAltInput.value = img.getAttribute('alt') || '';
        
        const fc = fig.querySelector('figcaption');
        contentImageCaptionInput.value = fc ? fc.innerText.trim() : '';

        // Size
        const curW = fig.style.maxWidth || '100%';
        if (['100%', '75%', '50%', '30%'].includes(curW)) {
            contentImageSizeInput.value = curW;
        } else {
            contentImageSizeInput.value = '100%';
        }

        // Align
        if (fig.classList.contains('align-left')) {
            contentImageAlignInput.value = 'left';
        } else if (fig.classList.contains('align-right')) {
            contentImageAlignInput.value = 'right';
        } else {
            contentImageAlignInput.value = 'center';
        }

        // Radius
        if (img.classList.contains('rounded-none')) contentImageRadiusInput.value = 'rounded-none';
        else if (img.classList.contains('rounded-lg')) contentImageRadiusInput.value = 'rounded-lg';
        else if (img.classList.contains('rounded-full')) contentImageRadiusInput.value = 'rounded-full';
        else contentImageRadiusInput.value = 'rounded-2xl';

        // Shadow
        if (img.classList.contains('shadow-none')) contentImageShadowInput.value = 'shadow-none';
        else if (img.classList.contains('shadow-xl')) contentImageShadowInput.value = 'shadow-xl';
        else contentImageShadowInput.value = 'shadow-md';

        imageModal.classList.remove('hidden');
        imageModal.classList.add('flex');
    }

    function hideImageModal() {
        imageModal.classList.add('hidden');
        imageModal.classList.remove('flex');
    }
    closeImageModal.addEventListener('click', hideImageModal);
    cancelImageModal.addEventListener('click', hideImageModal);

    deleteImageModalBtn.addEventListener('click', function() {
        if (activeEditingFigure && confirm('Hapus gambar ini dari artikel?')) {
            activeEditingFigure.remove();
            hideImageModal();
            hideQuickToolbar();
            syncContent();
        }
    });

    applyImageBtn.addEventListener('click', async function() {
        const alt = contentImageAltInput.value.trim() || 'Gambar Artikel NazwaGraha';
        const caption = contentImageCaptionInput.value.trim();
        const size = contentImageSizeInput.value;
        const align = contentImageAlignInput.value;
        const radius = contentImageRadiusInput.value;
        const shadow = contentImageShadowInput.value;

        let finalSrc = '';

        if (currentImgTab === 'upload') {
            if (!contentImageFileInput.files || !contentImageFileInput.files[0]) {
                if (isEditingExistingImage && activeEditingImg) {
                    // Keep current src if editing and didn't pick a new file
                    finalSrc = activeEditingImg.getAttribute('src');
                } else {
                    alert('Pilih file gambar yang ingin diunggah.');
                    return;
                }
            } else {
                const file = contentImageFileInput.files[0];
                const formData = new FormData();
                formData.append('image', file);
                formData.append('_token', '{{ csrf_token() }}');

                uploadImgStatus.innerHTML = '<span class="text-orange-600 font-bold">Mengunggah gambar ke server...</span>';
                applyImageBtn.disabled = true;

                try {
                    const response = await fetch("{{ route('admin.articles.upload-image', [], false) }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    applyImageBtn.disabled = false;

                    const rawText = await response.text();
                    let data = null;
                    try {
                        data = JSON.parse(rawText);
                    } catch(parseErr) {
                        console.error('Non-JSON response from server:', rawText);
                    }

                    if (response.ok && data && data.success && data.url) {
                        finalSrc = data.url;
                    } else {
                        const errorMsg = (data && data.message) 
                            ? data.message 
                            : (data && data.errors 
                                ? Object.values(data.errors).flat().join(', ') 
                                : (rawText.length > 200 ? rawText.substring(0, 200) + '...' : rawText || 'Gagal mengunggah gambar (HTTP ' + response.status + ').'));
                        uploadImgStatus.innerHTML = '<span class="text-rose-600 font-semibold">Gagal: ' + errorMsg + '</span>';
                        return;
                    }
                } catch (err) {
                    applyImageBtn.disabled = false;
                    uploadImgStatus.innerHTML = '<span class="text-rose-600 font-semibold">' + (err.message || 'Terjadi kesalahan koneksi server.') + '</span>';
                    return;
                }
            }
        } else {
            const url = contentImageUrlInput.value.trim();
            if (!url) {
                alert('Silakan masukkan link URL gambar.');
                return;
            }
            finalSrc = url;
        }

        if (isEditingExistingImage && activeEditingFigure && activeEditingImg) {
            // Update existing figure & img
            if (finalSrc) {
                activeEditingImg.src = finalSrc;
            }
            activeEditingImg.alt = alt;

            // Update radius & shadow
            ['rounded-none', 'rounded-lg', 'rounded-2xl', 'rounded-full'].forEach(c => activeEditingImg.classList.remove(c));
            activeEditingImg.classList.add(radius);

            ['shadow-none', 'shadow-md', 'shadow-xl'].forEach(c => activeEditingImg.classList.remove(c));
            activeEditingImg.classList.add(shadow);

            // Update caption
            let fc = activeEditingFigure.querySelector('figcaption');
            if (caption) {
                if (!fc) {
                    fc = document.createElement('figcaption');
                    activeEditingFigure.appendChild(fc);
                }
                fc.className = 'text-xs text-slate-500 mt-2 italic text-center';
                fc.innerText = caption;
            } else if (fc) {
                fc.remove();
            }

            // Update size & align
            activeEditingFigure.style.maxWidth = size;
            applyFigureAlign(activeEditingFigure, align);

            hideImageModal();
            positionQuickToolbar();
            syncContent();
        } else {
            // Insert brand new image
            insertImageToContent(finalSrc, alt, caption, size, align, radius, shadow);
            hideImageModal();
        }
    });

    function insertImageToContent(src, alt, caption, size = '100%', align = 'center', radius = 'rounded-2xl', shadow = 'shadow-md') {
        editorVisual.focus();
        restoreSelection(savedSelection);

        let alignClass = 'align-center';
        let figStyle = `max-width: ${size}; margin: 1.5rem auto; text-align: center; clear: both;`;
        if (align === 'left') {
            alignClass = 'align-left';
            figStyle = `max-width: ${size}; float: left; margin: 0.5rem 1.5rem 1rem 0; clear: left;`;
        } else if (align === 'right') {
            alignClass = 'align-right';
            figStyle = `max-width: ${size}; float: right; margin: 0.5rem 0 1rem 1.5rem; clear: right;`;
        }

        let imgHtml = `
            <figure class="article-img-box ${alignClass}" style="${figStyle}">
                <img src="${src}" alt="${alt}" class="${radius} ${shadow} mx-auto block max-w-full h-auto border border-slate-200" loading="lazy">
                ${caption ? `<figcaption class="text-xs text-slate-500 mt-2 italic text-center">${caption}</figcaption>` : ''}
            </figure>
            <p><br></p>
        `;
        document.execCommand('insertHTML', false, imgHtml);
        syncContent();
    }

    // TABLE MODAL
    const tableModal = document.getElementById('tableModal');
    const openTableModalBtn = document.getElementById('openTableModalBtn');
    const closeTableModal = document.getElementById('closeTableModal');
    const cancelTableModal = document.getElementById('cancelTableModal');
    const applyTableBtn = document.getElementById('applyTableBtn');

    openTableModalBtn.addEventListener('click', function() {
        savedSelection = saveSelection();
        tableModal.classList.remove('hidden');
        tableModal.classList.add('flex');
    });

    function hideTableModal() {
        tableModal.classList.add('hidden');
        tableModal.classList.remove('flex');
    }
    closeTableModal.addEventListener('click', hideTableModal);
    cancelTableModal.addEventListener('click', hideTableModal);

    applyTableBtn.addEventListener('click', function() {
        const rows = parseInt(document.getElementById('tableRowsInput').value) || 3;
        const cols = parseInt(document.getElementById('tableColsInput').value) || 3;
        hideTableModal();

        editorVisual.focus();
        restoreSelection(savedSelection);

        let tableHtml = '<div class="overflow-x-auto my-6"><table class="w-full border-collapse border border-slate-300 text-xs text-left">';
        // Thead
        tableHtml += '<thead class="bg-slate-100 text-slate-800 font-bold"><tr>';
        for (let c = 1; c <= cols; c++) {
            tableHtml += `<th class="border border-slate-300 p-2.5">Kolom Header ${c}</th>`;
        }
        tableHtml += '</tr></thead><tbody>';
        // Tbody
        for (let r = 1; r <= rows; r++) {
            tableHtml += `<tr class="${r % 2 === 0 ? 'bg-slate-50' : 'bg-white'}">`;
            for (let c = 1; c <= cols; c++) {
                tableHtml += `<td class="border border-slate-300 p-2.5">Data ${r},${c}</td>`;
            }
            tableHtml += '</tr>';
        }
        tableHtml += '</tbody></table></div><p><br></p>';

        document.execCommand('insertHTML', false, tableHtml);
        syncContent();
    });

    // Quick Presets inside Table Modal
    document.querySelectorAll('.tbl-preset-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const r = this.getAttribute('data-rows');
            const c = this.getAttribute('data-cols');
            document.getElementById('tableRowsInput').value = r;
            document.getElementById('tableColsInput').value = c;
            document.getElementById('applyTableBtn').click();
        });
    });

    // ==========================================
    // TABLE TOOLS: ADD/DELETE ROWS & COLS
    // ==========================================
    const openTableToolsBtn = document.getElementById('openTableToolsBtn');
    const tableToolsMenu = document.getElementById('tableToolsMenu');
    const menuCreateNewTable = document.getElementById('menuCreateNewTable');

    if (menuCreateNewTable) {
        menuCreateNewTable.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            if (openTableModalBtn) openTableModalBtn.click();
        });
    }

    if (openTableToolsBtn && tableToolsMenu) {
        openTableToolsBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            tableToolsMenu.classList.toggle('hidden');
        });
        document.addEventListener('click', function(e) {
            if (!tableToolsMenu.contains(e.target) && e.target !== openTableToolsBtn) {
                tableToolsMenu.classList.add('hidden');
            }
        });
    }

    let lastActiveTableCell = null;

    function getActiveTableCell() {
        const sel = window.getSelection();
        if (sel && sel.rangeCount) {
            let node = sel.anchorNode;
            if (node && node.nodeType === 3) node = node.parentNode;
            const cell = node ? node.closest('td, th') : null;
            if (cell && editorVisual.contains(cell)) {
                lastActiveTableCell = cell;
                return cell;
            }
        }
        if (lastActiveTableCell && editorVisual.contains(lastActiveTableCell)) {
            return lastActiveTableCell;
        }
        return null;
    }

    ['keyup', 'mouseup', 'click', 'focus'].forEach(evt => {
        editorVisual.addEventListener(evt, () => {
            const sel = window.getSelection();
            if (!sel || !sel.rangeCount) return;
            let node = sel.anchorNode;
            if (node && node.nodeType === 3) node = node.parentNode;
            const cell = node ? node.closest('td, th') : null;
            if (cell && editorVisual.contains(cell)) {
                lastActiveTableCell = cell;
            }
        });
    });

    // Add row below
    const tblAddRowBelow = document.getElementById('tblAddRowBelow');
    if (tblAddRowBelow) {
        tblAddRowBelow.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const tr = cell.closest('tr');
            const newTr = document.createElement('tr');
            newTr.className = tr.className;
            const cellsCount = tr.children.length;
            for (let i = 0; i < cellsCount; i++) {
                const newTd = document.createElement('td');
                newTd.className = 'border border-slate-300 p-2.5';
                newTd.innerHTML = '<br>';
                newTr.appendChild(newTd);
            }
            tr.parentNode.insertBefore(newTr, tr.nextSibling);
            syncContent();
        });
    }

    // Add row above
    const tblAddRowAbove = document.getElementById('tblAddRowAbove');
    if (tblAddRowAbove) {
        tblAddRowAbove.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const tr = cell.closest('tr');
            const newTr = document.createElement('tr');
            newTr.className = tr.className;
            const cellsCount = tr.children.length;
            for (let i = 0; i < cellsCount; i++) {
                const newTd = document.createElement('td');
                newTd.className = 'border border-slate-300 p-2.5';
                newTd.innerHTML = '<br>';
                newTr.appendChild(newTd);
            }
            tr.parentNode.insertBefore(newTr, tr);
            syncContent();
        });
    }

    // Delete row
    const tblDeleteRow = document.getElementById('tblDeleteRow');
    if (tblDeleteRow) {
        tblDeleteRow.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const tr = cell.closest('tr');
            const tbody = tr.parentNode;
            tr.remove();
            if (tbody && tbody.children.length === 0) {
                const tableWrap = tbody.closest('div.overflow-x-auto') || tbody.closest('table');
                if (tableWrap) tableWrap.remove();
            }
            syncContent();
        });
    }

    // Add column right
    const tblAddColRight = document.getElementById('tblAddColRight');
    if (tblAddColRight) {
        tblAddColRight.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const colIdx = cell.cellIndex;
            const table = cell.closest('table');
            Array.from(table.rows).forEach(row => {
                const refCell = row.cells[colIdx];
                const isTh = refCell && refCell.tagName === 'TH';
                const newCell = document.createElement(isTh ? 'th' : 'td');
                newCell.className = isTh ? 'border border-slate-300 p-2.5 bg-slate-100 font-bold' : 'border border-slate-300 p-2.5';
                newCell.innerHTML = isTh ? 'Kolom Baru' : '<br>';
                if (refCell && refCell.nextSibling) {
                    row.insertBefore(newCell, refCell.nextSibling);
                } else {
                    row.appendChild(newCell);
                }
            });
            syncContent();
        });
    }

    // Add column left
    const tblAddColLeft = document.getElementById('tblAddColLeft');
    if (tblAddColLeft) {
        tblAddColLeft.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const colIdx = cell.cellIndex;
            const table = cell.closest('table');
            Array.from(table.rows).forEach(row => {
                const refCell = row.cells[colIdx];
                const isTh = refCell && refCell.tagName === 'TH';
                const newCell = document.createElement(isTh ? 'th' : 'td');
                newCell.className = isTh ? 'border border-slate-300 p-2.5 bg-slate-100 font-bold' : 'border border-slate-300 p-2.5';
                newCell.innerHTML = isTh ? 'Kolom Baru' : '<br>';
                if (refCell) {
                    row.insertBefore(newCell, refCell);
                } else {
                    row.appendChild(newCell);
                }
            });
            syncContent();
        });
    }

    // Delete column
    const tblDeleteCol = document.getElementById('tblDeleteCol');
    if (tblDeleteCol) {
        tblDeleteCol.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const colIdx = cell.cellIndex;
            const table = cell.closest('table');
            Array.from(table.rows).forEach(row => {
                if (row.cells[colIdx]) {
                    row.cells[colIdx].remove();
                }
            });
            syncContent();
        });
    }

    // Set Column Width Presets
    document.querySelectorAll('.tbl-set-col-width').forEach(btn => {
        btn.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const colIdx = cell.cellIndex;
            const table = cell.closest('table');
            const targetWidth = this.getAttribute('data-width');
            Array.from(table.rows).forEach(row => {
                const targetCell = row.cells[colIdx];
                if (targetCell) {
                    if (targetWidth === 'auto') {
                        targetCell.style.width = '';
                        targetCell.style.minWidth = '';
                    } else {
                        targetCell.style.width = targetWidth;
                        targetCell.style.minWidth = targetWidth;
                    }
                }
            });
            syncContent();
        });
    });

    // Distribute Columns Evenly
    const tblDistributeCols = document.getElementById('tblDistributeCols');
    if (tblDistributeCols) {
        tblDistributeCols.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const table = cell.closest('table');
            let maxCols = 0;
            Array.from(table.rows).forEach(row => {
                if (row.cells.length > maxCols) maxCols = row.cells.length;
            });
            if (maxCols === 0) return;
            const pct = (100 / maxCols).toFixed(1) + '%';
            Array.from(table.rows).forEach(row => {
                Array.from(row.cells).forEach(c => {
                    c.style.width = pct;
                    c.style.minWidth = pct;
                });
            });
            syncContent();
        });
    }

    // Custom Prompt Column Width
    const tblPromptColWidth = document.getElementById('tblPromptColWidth');
    if (tblPromptColWidth) {
        tblPromptColWidth.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            const currentW = cell.style.width || '';
            const val = prompt('Masukkan lebar kolom yang diinginkan (contoh: 15%, 150px, atau auto):', currentW);
            if (val !== null) {
                const trimmed = val.trim();
                const colIdx = cell.cellIndex;
                const table = cell.closest('table');
                Array.from(table.rows).forEach(row => {
                    const targetCell = row.cells[colIdx];
                    if (targetCell) {
                        if (trimmed === '' || trimmed.toLowerCase() === 'auto') {
                            targetCell.style.width = '';
                            targetCell.style.minWidth = '';
                        } else {
                            targetCell.style.width = trimmed;
                            targetCell.style.minWidth = trimmed;
                        }
                    }
                });
                syncContent();
            }
        });
    }

    // Interactive Drag-to-Resize Table Columns (Hover border and drag)
    let hoverResizingCell = null;
    let isDraggingCol = false;
    let dragStartX = 0;
    let dragStartWidth = 0;
    let dragColIdx = -1;
    let dragTable = null;

    editorVisual.addEventListener('mousemove', function(e) {
        if (isDraggingCol) return;
        const target = e.target;
        const cell = target ? target.closest('td, th') : null;
        if (cell && editorVisual.contains(cell)) {
            const rect = cell.getBoundingClientRect();
            // Check right border of cell (within 8px inside or 4px outside)
            if (e.clientX >= rect.right - 8 && e.clientX <= rect.right + 4) {
                editorVisual.style.cursor = 'col-resize';
                hoverResizingCell = cell;
                return;
            }
            // Check left border of cell if previous sibling exists
            else if (e.clientX >= rect.left - 4 && e.clientX <= rect.left + 5 && cell.previousElementSibling) {
                editorVisual.style.cursor = 'col-resize';
                hoverResizingCell = cell.previousElementSibling;
                return;
            }
        }
        if (!isDraggingCol && hoverResizingCell) {
            editorVisual.style.cursor = '';
            hoverResizingCell = null;
        }
    });

    editorVisual.addEventListener('mousedown', function(e) {
        if (hoverResizingCell) {
            e.preventDefault();
            isDraggingCol = true;
            dragStartX = e.clientX;
            dragStartWidth = hoverResizingCell.getBoundingClientRect().width;
            dragColIdx = hoverResizingCell.cellIndex;
            dragTable = hoverResizingCell.closest('table');
            document.body.style.cursor = 'col-resize';
            document.body.style.userSelect = 'none';
        }
    });

    window.addEventListener('mousemove', function(e) {
        if (!isDraggingCol || !dragTable) return;
        e.preventDefault();
        const delta = e.clientX - dragStartX;
        const newW = Math.max(30, Math.round(dragStartWidth + delta));
        Array.from(dragTable.rows).forEach(row => {
            const c = row.cells[dragColIdx];
            if (c) {
                c.style.width = newW + 'px';
                c.style.minWidth = newW + 'px';
            }
        });
    });

    window.addEventListener('mouseup', function() {
        if (isDraggingCol) {
            isDraggingCol = false;
            dragTable = null;
            document.body.style.cursor = '';
            document.body.style.userSelect = '';
            if (editorVisual) editorVisual.style.cursor = '';
            hoverResizingCell = null;
            syncContent();
        }
    });

    // Delete entire table
    const tblDeleteTable = document.getElementById('tblDeleteTable');
    if (tblDeleteTable) {
        tblDeleteTable.addEventListener('click', function() {
            if (tableToolsMenu) tableToolsMenu.classList.add('hidden');
            const cell = getActiveTableCell();
            if (!cell) {
                alert('Arahkan kursor atau klik di dalam sel tabel terlebih dahulu.');
                return;
            }
            if (confirm('Hapus seluruh tabel ini dari artikel?')) {
                const table = cell.closest('table');
                const wrap = table.closest('div.overflow-x-auto') || table;
                wrap.remove();
                syncContent();
            }
        });
    }

    // ==========================================
    // SPECIAL CHARACTERS & SYMBOLS MODAL
    // ==========================================
    const symbolModal = document.getElementById('symbolModal');
    const openSymbolModalBtn = document.getElementById('openSymbolModalBtn');
    const closeSymbolModal = document.getElementById('closeSymbolModal');
    const cancelSymbolModal = document.getElementById('cancelSymbolModal');
    const symbolGrid = document.getElementById('symbolGrid');

    const symbolsData = {
        currency: ['$', '€', '£', '¥', '₹', 'Rp', '¢', '₿', '₽', '₩', '₺', '₴'],
        math: ['±', '×', '÷', '≠', '≈', '≤', '≥', '½', '¼', '¾', '∞', '√', '∑', '°', '℃', '℉', '‰', 'µ', '²', '³', 'π', '¬', '∫', '∆', '∏'],
        typography: ['©', '®', '™', '§', '¶', '•', '–', '—', '“', '”', '‘', '’', '«', '»', '†', '‡', '…', '№', '‹', '›', '„', '‚'],
        arrows: ['←', '↑', '→', '↓', '↔', '↕', '↵', '➔', '➜', '✔', '✕', '★', '☆', '▲', '▼', '◄', '►', '✓', '✗', '❖', '➤'],
        greek: ['α', 'β', 'γ', 'δ', 'ε', 'ζ', 'η', 'θ', 'ι', 'κ', 'λ', 'μ', 'ν', 'ξ', 'π', 'ρ', 'σ', 'τ', 'υ', 'φ', 'χ', 'ψ', 'ω', 'Δ', 'Ω', '∑']
    };

    function renderSymbols(filterCat = 'all') {
        if (!symbolGrid) return;
        symbolGrid.innerHTML = '';
        let list = [];
        if (filterCat === 'all') {
            Object.values(symbolsData).forEach(arr => { list = list.concat(arr); });
            list = [...new Set(list)];
        } else if (symbolsData[filterCat]) {
            list = symbolsData[filterCat];
        }

        list.forEach(sym => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'p-2 rounded-lg bg-slate-50 hover:bg-orange-500 hover:text-white font-mono text-base font-bold transition flex items-center justify-center border border-slate-200 hover:border-orange-500 shadow-2xs';
            btn.innerText = sym;
            btn.title = `Sisipkan: ${sym}`;
            btn.addEventListener('click', function() {
                hideSymbolModal();
                editorVisual.focus();
                restoreSelection(savedSelection);
                document.execCommand('insertText', false, sym);
                syncContent();
            });
            symbolGrid.appendChild(btn);
        });
    }

    if (openSymbolModalBtn) {
        openSymbolModalBtn.addEventListener('click', function() {
            savedSelection = saveSelection();
            renderSymbols('all');
            symbolModal.classList.remove('hidden');
            symbolModal.classList.add('flex');
        });
    }

    function hideSymbolModal() {
        if (symbolModal) {
            symbolModal.classList.add('hidden');
            symbolModal.classList.remove('flex');
        }
    }
    if (closeSymbolModal) closeSymbolModal.addEventListener('click', hideSymbolModal);
    if (cancelSymbolModal) cancelSymbolModal.addEventListener('click', hideSymbolModal);

    document.querySelectorAll('.symbol-cat-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.symbol-cat-btn').forEach(b => {
                b.className = 'symbol-cat-btn px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold';
            });
            this.className = 'symbol-cat-btn px-2.5 py-1 rounded-lg bg-orange-500 text-white font-bold';
            renderSymbols(this.getAttribute('data-cat'));
        });
    });

    // ==========================================
    // FIND & REPLACE MODAL
    // ==========================================
    const findReplaceModal = document.getElementById('findReplaceModal');
    const openFindReplaceBtn = document.getElementById('openFindReplaceBtn');
    const closeFindReplaceModal = document.getElementById('closeFindReplaceModal');
    const cancelFindReplaceModal = document.getElementById('cancelFindReplaceModal');
    const findInput = document.getElementById('findInput');
    const replaceInput = document.getElementById('replaceInput');
    const matchCaseCheckbox = document.getElementById('matchCaseCheckbox');
    const findReplaceStatus = document.getElementById('findReplaceStatus');
    const findNextBtn = document.getElementById('findNextBtn');
    const replaceBtn = document.getElementById('replaceBtn');
    const replaceAllBtn = document.getElementById('replaceAllBtn');

    if (openFindReplaceBtn) {
        openFindReplaceBtn.addEventListener('click', function() {
            savedSelection = saveSelection();
            const selectedText = window.getSelection().toString();
            if (selectedText && findInput) findInput.value = selectedText;
            if (findReplaceStatus) findReplaceStatus.innerText = '';
            findReplaceModal.classList.remove('hidden');
            findReplaceModal.classList.add('flex');
            if (findInput) findInput.focus();
        });
    }

    function hideFindReplaceModal() {
        if (findReplaceModal) {
            findReplaceModal.classList.add('hidden');
            findReplaceModal.classList.remove('flex');
        }
    }
    if (closeFindReplaceModal) closeFindReplaceModal.addEventListener('click', hideFindReplaceModal);
    if (cancelFindReplaceModal) cancelFindReplaceModal.addEventListener('click', hideFindReplaceModal);

    if (findNextBtn) {
        findNextBtn.addEventListener('click', function() {
            const query = findInput.value;
            if (!query) {
                findReplaceStatus.innerHTML = '<span class="text-rose-500">Masukkan kata yang ingin dicari.</span>';
                return;
            }
            const matchCase = matchCaseCheckbox.checked;
            editorVisual.focus();
            if (window.find) {
                const found = window.find(query, matchCase, false, true, false, false, false);
                if (found) {
                    findReplaceStatus.innerHTML = `<span class="text-emerald-600 font-semibold">Ditemukan: "${query}"</span>`;
                } else {
                    // Try searching from top
                    const sel = window.getSelection();
                    if (sel && sel.collapse) sel.collapse(editorVisual, 0);
                    const retry = window.find(query, matchCase, false, true, false, false, false);
                    if (retry) {
                        findReplaceStatus.innerHTML = `<span class="text-emerald-600 font-semibold">Ditemukan (dari awal): "${query}"</span>`;
                    } else {
                        findReplaceStatus.innerHTML = `<span class="text-slate-400">Kata "${query}" tidak ditemukan.</span>`;
                    }
                }
            }
        });
    }

    if (replaceBtn) {
        replaceBtn.addEventListener('click', function() {
            const query = findInput.value;
            const replacement = replaceInput.value;
            if (!query) return;
            const sel = window.getSelection();
            if (sel && sel.toString() && (matchCaseCheckbox.checked ? sel.toString() === query : sel.toString().toLowerCase() === query.toLowerCase())) {
                document.execCommand('insertText', false, replacement);
                syncContent();
                findReplaceStatus.innerHTML = '<span class="text-emerald-600 font-semibold">1 kata berhasil diganti.</span>';
                if (findNextBtn) findNextBtn.click();
            } else {
                if (findNextBtn) findNextBtn.click();
            }
        });
    }

    if (replaceAllBtn) {
        replaceAllBtn.addEventListener('click', function() {
            const query = findInput.value;
            const replacement = replaceInput.value;
            if (!query) {
                findReplaceStatus.innerHTML = '<span class="text-rose-500">Masukkan kata yang dicari.</span>';
                return;
            }
            const flags = matchCaseCheckbox.checked ? 'g' : 'gi';
            const safeQuery = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            const regex = new RegExp(safeQuery, flags);
            
            const textContent = editorVisual.innerText || '';
            const matches = (textContent.match(regex) || []).length;
            
            if (matches === 0) {
                findReplaceStatus.innerHTML = `<span class="text-slate-400">Tidak ada kata "${query}" yang cocok.</span>`;
                return;
            }

            editorVisual.innerHTML = editorVisual.innerHTML.replace(regex, replacement);
            syncContent();
            findReplaceStatus.innerHTML = `<span class="text-emerald-600 font-bold">Berhasil mengganti ${matches} kemunculan kata.</span>`;
        });
    }

});
</script>
@endpush

