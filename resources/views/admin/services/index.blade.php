@extends('admin.layouts.app')

@section('title', 'Kelola Layanan Unggulan')
@section('page-title', 'Kelola Layanan Unggulan Kami')

@section('content')
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-8">
    <p class="text-muted" style="font-size: 14px; margin-top: -10px;">
      Atur daftar layanan jasa yang tampil di bagian <strong>Layanan Kami</strong> pada Landing Page utama NazwaGraha.
    </p>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{ route('admin.services.create') }}" class="btn btn-orange" style="box-shadow: 0 4px 12px rgba(244,119,18,0.25);">
      <i class="fa fa-plus-circle fa-fw"></i> + Tambah Layanan Baru
    </a>
  </div>
</div>

<!-- 3 Metric Stat Widgets (Matching Mockup) -->
<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 5px solid #0284c7;">
      <div class="panel-body" style="padding: 18px 20px;">
        <div class="row">
          <div class="col-xs-3">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #e0f2fe; display: grid; place-items: center;">
              <i class="fa fa-cubes fa-2x" style="color: #0284c7;"></i>
            </div>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge" style="font-size: 32px; font-weight: 800; color: #0f172a;">{{ $totalServices }}</div>
            <div class="text-muted" style="font-size: 13px; font-weight: 600;">Total Layanan Tersimpan</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6">
    <div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 5px solid #16a34a;">
      <div class="panel-body" style="padding: 18px 20px;">
        <div class="row">
          <div class="col-xs-3">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #dcfce7; display: grid; place-items: center;">
              <i class="fa fa-check-circle fa-2x" style="color: #16a34a;"></i>
            </div>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge" style="font-size: 32px; font-weight: 800; color: #16a34a;">{{ $activeServices }}</div>
            <div class="text-muted" style="font-size: 13px; font-weight: 600;">Layanan Aktif (Tayang di Web)</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6">
    <div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 5px solid #64748b;">
      <div class="panel-body" style="padding: 18px 20px;">
        <div class="row">
          <div class="col-xs-3">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #f1f5f9; display: grid; place-items: center;">
              <i class="fa fa-eye-slash fa-2x" style="color: #64748b;"></i>
            </div>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge" style="font-size: 32px; font-weight: 800; color: #64748b;">{{ $inactiveServices }}</div>
            <div class="text-muted" style="font-size: 13px; font-weight: 600;">Layanan Nonaktif (Draft)</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Informational Notice Tip Callout -->
<div class="alert alert-info" style="border-radius: 10px; background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 14px 18px; margin-bottom: 24px;">
  <i class="fa fa-lightbulb-o fa-lg" style="margin-right: 6px;"></i>
  <strong>Petunjuk Pengelolaan:</strong>
  Layanan dengan status <strong>AKTIF</strong> akan otomatis muncul pada bagian <em>Layanan Unggulan Kami</em> di halaman depan (Landing Page). Anda dapat menonaktifkan sementara layanan dengan tombol <strong>"Nonaktifkan"</strong> tanpa menghapus data jika antrean sedang penuh.
</div>

<!-- Main Table Panel -->
<div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
  <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between;">
    <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
      <i class="fa fa-star text-yellow fa-fw"></i> Daftar Layanan Jasa &amp; Status Tayang
    </div>
    <span class="badge" style="background: var(--admin-orange); font-size: 12px; padding: 5px 10px;">
      Total: {{ $services->count() }} Layanan
    </span>
  </div>

  <div class="table-responsive">
    <table class="table table-hover" style="margin-bottom: 0; vertical-align: middle;">
      <thead style="background: #f8fafc; font-size: 12px; text-transform: uppercase; color: #64748b; letter-spacing: 0.5px;">
        <tr>
          <th style="width: 70px; text-align: center;">Urutan</th>
          <th style="width: 75px; text-align: center;">Ikon</th>
          <th style="width: 260px;">Nama Layanan &amp; Slug</th>
          <th>Deskripsi Singkat &amp; Fitur</th>
          <th style="width: 150px;">Estimasi Harga</th>
          <th style="width: 200px; text-align: center;">Status di Landing Page</th>
          <th style="width: 140px; text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $serv)
          <tr style="{{ !$serv->is_active ? 'background: #fafafa; opacity: 0.85;' : '' }}">
            <td style="text-align: center; vertical-align: middle;">
              <span class="badge" style="background: #334155; font-size: 12px;">#{{ $serv->sort_order }}</span>
            </td>

            <td style="text-align: center; vertical-align: middle;">
              <div style="width: 44px; height: 44px; border-radius: 10px; background: #fff4eb; border: 1px solid #fed7aa; display: inline-flex; align-items: center; justify-content: center; color: var(--admin-orange);">
                <div style="width: 24px; height: 24px;">
                  {!! $serv->icon_svg !!}
                </div>
              </div>
            </td>

            <td style="vertical-align: middle;">
              <div style="font-weight: 800; font-size: 14px; color: #0f172a; margin-bottom: 4px;">
                {{ $serv->name }}
              </div>
              <div style="margin-bottom: 4px;">
                @if(!empty($serv->badge))
                  <span class="label label-warning" style="font-size: 10px; padding: 2px 8px; border-radius: 10px; background: #f59e0b;">
                    ★ {{ $serv->badge }}
                  </span>
                @endif
              </div>
              <div class="text-muted" style="font-size: 11.5px; font-family: monospace;">
                /{{ $serv->slug }}
              </div>
            </td>

            <td style="vertical-align: middle;">
              <p style="font-size: 12.5px; color: #475569; margin: 0 0 6px; line-height: 1.45;">
                {{ Str::limit($serv->short_description, 110) }}
              </p>
              @if(!empty($serv->features) && is_array($serv->features))
                <div style="display: flex; flex-wrap: wrap; gap: 4px;">
                  @foreach(array_slice($serv->features, 0, 3) as $f)
                    <span class="label label-default" style="font-size: 10.5px; background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0;">
                      ✓ {{ $f }}
                    </span>
                  @endforeach
                  @if(count($serv->features) > 3)
                    <span class="text-muted small">+{{ count($serv->features) - 3 }} lainnya</span>
                  @endif
                </div>
              @endif
            </td>

            <td style="vertical-align: middle;">
              <strong style="color: #0f172a; font-size: 13.5px;">{{ $serv->price_starting_from }}</strong>
            </td>

            <td style="text-align: center; vertical-align: middle;">
              @if($serv->is_active)
                <div style="margin-bottom: 8px;">
                  <span class="label label-success" style="font-size: 11px; padding: 5px 12px; border-radius: 20px; background: #16a34a; display: inline-block;">
                    <i class="fa fa-check-circle"></i> AKTIF (Tayang)
                  </span>
                </div>
                <form action="{{ route('admin.services.toggle', $serv->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-xs btn-default text-danger" style="border-radius: 12px; padding: 3px 10px; font-size: 11px; font-weight: 700;" title="Sembunyikan dari Landing Page" onclick="return confirm('Sembunyikan layanan ini dari Landing Page?');">
                    <i class="fa fa-eye-slash fa-fw text-danger"></i> Nonaktifkan
                  </button>
                </form>
              @else
                <div style="margin-bottom: 8px;">
                  <span class="label label-default" style="font-size: 11px; padding: 5px 12px; border-radius: 20px; background: #64748b; display: inline-block;">
                    <i class="fa fa-eye-slash"></i> NONAKTIF (Draft)
                  </span>
                </div>
                <form action="{{ route('admin.services.toggle', $serv->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-xs btn-success" style="border-radius: 12px; padding: 3px 10px; font-size: 11px; font-weight: 700; background: #16a34a; border-color: #16a34a;" title="Tampilkan ke Landing Page">
                    <i class="fa fa-check fa-fw"></i> Aktifkan
                  </button>
                </form>
              @endif
            </td>

            <td style="text-align: center; vertical-align: middle;">
              <div class="btn-group" role="group">
                <a href="{{ route('admin.services.edit', $serv->id) }}" class="btn btn-sm btn-primary" style="border-radius: 6px; margin-right: 4px;" title="Edit Konten Layanan">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="{{ route('home') }}#{{ $serv->slug }}" target="_blank" class="btn btn-sm btn-default" style="border-radius: 6px;" title="Lihat di Web">
                  <i class="fa fa-external-link"></i>
                </a>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center" style="padding: 40px;">
              <i class="fa fa-briefcase fa-3x text-muted" style="margin-bottom: 12px;"></i>
              <h4>Belum Ada Data Layanan</h4>
              <p class="text-muted">Klik tombol "+ Tambah Layanan Baru" untuk menambahkan layanan pertama.</p>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
