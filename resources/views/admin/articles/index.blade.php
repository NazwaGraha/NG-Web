@extends('admin.layouts.app')

@section('title', 'Manajemen Artikel')
@section('page-title', 'Semua Artikel')

@section('content')
<!-- Filter & Action Header -->
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-8">
    <form action="{{ route('admin.articles.index') }}" method="GET" class="form-inline">
      <div class="form-group">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control input-sm" placeholder="Cari judul / keyword..." style="width: 220px;">
      </div>
      <div class="form-group">
        <select name="category" class="form-control input-sm">
          <option value="">-- Semua Kategori --</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <select name="status" class="form-control input-sm">
          <option value="">-- Semua Status --</option>
          <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Terbit (Live)</option>
          <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Terjadwal</option>
          <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
      </div>
      <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-filter"></i> Filter</button>
      @if(request()->hasAny(['q', 'category', 'status']))
        <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-link text-danger">Reset</a>
      @endif
    </form>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{ route('admin.articles.create') }}" class="btn btn-orange">
      <i class="fa fa-plus-circle fa-fw"></i> Tulis Artikel Baru
    </a>
  </div>
</div>

<!-- Table Panel -->
<div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
  <div class="panel-heading" style="font-weight: 700;">
    <i class="fa fa-list fa-fw"></i> Data Artikel Terdaftar ({{ $articles->total() }})
  </div>
  <div class="panel-body" style="padding: 0;">
    <div class="table-responsive">
      <table class="table table-striped table-hover" style="margin-bottom: 0;">
        <thead>
          <tr>
            <th style="width: 70px;">Media</th>
            <th>Judul & Focus Keyword</th>
            <th>Kategori</th>
            <th>Target GEO</th>
            <th class="text-center">Status</th>
            <th>Tanggal Terbit</th>
            <th class="text-right" style="width: 140px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($articles as $art)
            <tr>
              <td>
                <img src="{{ asset($art->image) }}" alt="Thumbnail" style="width: 60px; height: 42px; object-fit: cover; border-radius: 6px;">
              </td>
              <td>
                <strong style="font-size: 14px; color: #0f172a;">{{ $art->title }}</strong>
                <div class="text-muted small">
                  Slug: <code>/{{ $art->slug }}</code>
                </div>
                @if($art->focus_keyword)
                  <span class="label label-info" style="font-size: 10px;">🎯 {{ $art->focus_keyword }}</span>
                @endif
              </td>
              <td>
                <span class="label label-default" style="font-size: 11px;">{{ $art->category }}</span>
              </td>
              <td>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger"></i> {{ $art->geo_target ?? 'Bogor & Ciawi' }}</span>
              </td>
              <td class="text-center">
                @if(!$art->is_published)
                  <span class="label label-default" style="padding: 4px 8px;">Draft</span>
                @elseif($art->isScheduled())
                  <span class="label label-info" style="padding: 4px 8px;"><i class="fa fa-clock-o"></i> Terjadwal</span>
                @else
                  <span class="label label-success" style="padding: 4px 8px;"><i class="fa fa-check"></i> Terbit</span>
                @endif
              </td>
              <td>
                <small class="text-muted">
                  @if($art->isScheduled())
                    <span style="color: #0284c7; font-weight: 700;">{{ $art->published_at->format('d M Y, H:i') }}</span>
                  @elseif($art->published_at)
                    {{ $art->published_at->format('d M Y, H:i') }}
                  @else
                    Belum Terbit
                  @endif
                </small>
              </td>
              <td class="text-right">
                <a href="{{ route('articles.show', $art->slug) }}" target="_blank" class="btn btn-xs btn-default" title="Lihat di Web">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('admin.articles.edit', $art->id) }}" class="btn btn-xs btn-primary" title="Edit">
                  <i class="fa fa-pencil"></i>
                </a>
                <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-xs btn-danger" title="Hapus">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center text-muted" style="padding: 30px;">
                Tidak ada artikel ditemukan yang sesuai kriteria pencarian.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @if($articles->hasPages())
    <div class="panel-footer" style="background: #ffffff; border-top: 1px solid #f1f5f9; padding: 14px 20px;">
      <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
        <div class="col-sm-6 text-muted" style="font-size: 13px;">
          Menampilkan <strong>{{ $articles->firstItem() }}</strong> - <strong>{{ $articles->lastItem() }}</strong> dari total <strong>{{ $articles->total() }}</strong> artikel
        </div>
        <div class="col-sm-6 text-right">
          {{ $articles->links() }}
        </div>
      </div>
    </div>
  @endif
</div>
@endsection
