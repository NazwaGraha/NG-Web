@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')
@section('page-title', 'Dashboard Backoffice')

@section('content')
<!-- Quick Statistic Cards -->
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
      <div class="panel-heading" style="background: #1e293b; padding: 18px 15px;">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-newspaper-o fa-4x" style="color: #60a5fa;"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">{{ $totalArticles }}</div>
            <div>Total Artikel ({{ $publishedArticles }} Terbit)</div>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.articles.index') }}">
        <div class="panel-footer" style="background: #0f172a; color: #93c5fd;">
          <span class="pull-left">Kelola Artikel</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-green" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
      <div class="panel-heading" style="background: #166534; padding: 18px 15px;">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-tags fa-4x" style="color: #86efac;"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">{{ $totalCategories }}</div>
            <div>Kategori Artikel</div>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.categories.index') }}">
        <div class="panel-footer" style="background: #14532d; color: #bbf7d0;">
          <span class="pull-left">Kelola Kategori</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
      <div class="panel-heading" style="background: #b45309; padding: 18px 15px;">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-envelope fa-4x" style="color: #fde047;"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">{{ $totalInquiries }}</div>
            <div>Prospek ({{ $newInquiries }} Baru)</div>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.inquiries.index') }}">
        <div class="panel-footer" style="background: #92400e; color: #fef08a;">
          <span class="pull-left">Lihat Pesan Prospek</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-red" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
      <div class="panel-heading" style="background: #c2410c; padding: 18px 15px;">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-briefcase fa-4x" style="color: #fdba74;"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">{{ $totalServices }}</div>
            <div>Pilar Layanan Aktif</div>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.services.index') }}">
        <div class="panel-footer" style="background: #9a3412; color: #fed7aa;">
          <span class="pull-left">Kelola Layanan</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
</div>

<!-- Action Shortcuts -->
<div class="row" style="margin-bottom: 25px;">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-radius: 10px;">
      <div class="panel-body" style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
        <span style="font-weight: 700; color: #334155; margin-right: 10px;"><i class="fa fa-bolt text-warning"></i> Aksi Cepat:</span>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-orange">
          <i class="fa fa-plus fa-fw"></i> Tulis Artikel Baru
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-default">
          <i class="fa fa-tags fa-fw"></i> Tambah Kategori
        </a>
        <a href="{{ route('admin.services.index') }}" class="btn btn-default">
          <i class="fa fa-star fa-fw text-warning"></i> Layanan Unggulan
        </a>
        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-default">
          <i class="fa fa-briefcase fa-fw text-success"></i> Portofolio & Proyek ({{ $totalPortfolios }})
        </a>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-default">
          <i class="fa fa-comments-o fa-fw"></i> Cek Pesan Masuk
        </a>
        <a href="{{ route('articles.index') }}" target="_blank" class="btn btn-default">
          <i class="fa fa-external-link fa-fw"></i> Preview News & Events
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Two Columns: Recent Inquiries & Recent Articles -->
<div class="row">
  <!-- Recent Inquiries -->
  <div class="col-lg-6">
    <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
      <div class="panel-heading" style="font-weight: 700;">
        <i class="fa fa-envelope-o fa-fw"></i> 5 Prospek & Pesan Masuk Terbaru
        <a href="{{ route('admin.inquiries.index') }}" class="pull-right text-muted" style="font-size: 12px;">Lihat Semua →</a>
      </div>
      <div class="panel-body" style="padding: 0;">
        @if($recentInquiries->isEmpty())
          <p class="text-center text-muted" style="padding: 30px;">Belum ada pesan prospek masuk.</p>
        @else
          <div class="table-responsive">
            <table class="table table-hover" style="margin-bottom: 0;">
              <thead>
                <tr>
                  <th>Nama Klien</th>
                  <th>Layanan</th>
                  <th>Status</th>
                  <th>Waktu</th>
                </tr>
              </thead>
              <tbody>
                @foreach($recentInquiries as $inq)
                  <tr>
                    <td>
                      <strong>{{ $inq->name }}</strong><br>
                      <small class="text-muted"><i class="fa fa-whatsapp text-success"></i> {{ $inq->whatsapp }}</small>
                    </td>
                    <td><span class="badge" style="background: #e2e8f0; color: #334155;">{{ $inq->service_name ?? 'Umum' }}</span></td>
                    <td>
                      @if($inq->status === 'baru')
                        <span class="label label-danger">Baru</span>
                      @elseif($inq->status === 'dihubungi')
                        <span class="label label-warning">Dihubungi</span>
                      @else
                        <span class="label label-success">Selesai</span>
                      @endif
                    </td>
                    <td><small class="text-muted">{{ $inq->created_at ? $inq->created_at->diffForHumans() : '-' }}</small></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Recent Articles -->
  <div class="col-lg-6">
    <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
      <div class="panel-heading" style="font-weight: 700;">
        <i class="fa fa-newspaper-o fa-fw"></i> 5 Artikel Terbaru di Sistem
        <a href="{{ route('admin.articles.index') }}" class="pull-right text-muted" style="font-size: 12px;">Semua Artikel →</a>
      </div>
      <div class="panel-body" style="padding: 0;">
        @if($recentArticles->isEmpty())
          <p class="text-center text-muted" style="padding: 30px;">Belum ada artikel.</p>
        @else
          <div class="table-responsive">
            <table class="table table-hover" style="margin-bottom: 0;">
              <thead>
                <tr>
                  <th>Judul Artikel</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th class="text-right">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($recentArticles as $art)
                  <tr>
                    <td>
                      <a href="{{ route('admin.articles.edit', $art->id) }}" style="font-weight: 700; color: #1e293b;">
                        {{ Str::limit($art->title, 40) }}
                      </a>
                    </td>
                    <td><span class="label label-default">{{ $art->category }}</span></td>
                    <td>
                      @if($art->is_published)
                        <span class="label label-success">Terbit</span>
                      @else
                        <span class="label label-default">Draf</span>
                      @endif
                    </td>
                    <td class="text-right">
                      <a href="{{ route('admin.articles.edit', $art->id) }}" class="btn btn-xs btn-default" title="Edit">
                        <i class="fa fa-pencil"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
