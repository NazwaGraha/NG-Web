@extends('admin.layouts.app')

@section('title', 'Kelola Portofolio & Proyek Nyata')
@section('page-title', 'Portofolio & Proyek Nyata')

@section('content')
<div class="row" style="margin-bottom: 20px;">
  <div class="col-md-8">
    <p class="text-muted" style="font-size: 14px; margin-top: -10px;">
      Kelola daftar hasil karya dan bukti implementasi nyata solusi digital, website &amp; IT yang tampil di bagian <strong>Portofolio &amp; Proyek Nyata</strong> pada website NazwaGraha.
    </p>
  </div>
  <div class="col-md-4 text-right">
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-orange" style="box-shadow: 0 4px 12px rgba(244,119,18,0.25);">
      <i class="fa fa-plus-circle fa-fw"></i> + Tambah Portofolio Baru
    </a>
  </div>
</div>

<!-- 3 Metric Stat Widgets -->
<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 5px solid #10b981;">
      <div class="panel-body" style="padding: 18px 20px;">
        <div class="row">
          <div class="col-xs-3">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #d1fae5; display: grid; place-items: center;">
              <i class="fa fa-briefcase fa-2x" style="color: #10b981;"></i>
            </div>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge" style="font-size: 32px; font-weight: 800; color: #0f172a;">{{ $totalPortfolios }}</div>
            <div class="text-muted" style="font-size: 13px; font-weight: 600;">Total Portofolio Tersimpan</div>
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
            <div class="huge" style="font-size: 32px; font-weight: 800; color: #16a34a;">{{ $activePortfolios }}</div>
            <div class="text-muted" style="font-size: 13px; font-weight: 600;">Tayang di Halaman Depan</div>
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
            <div class="huge" style="font-size: 32px; font-weight: 800; color: #64748b;">{{ $inactivePortfolios }}</div>
            <div class="text-muted" style="font-size: 13px; font-weight: 600;">Draft / Disembunyikan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Search & Filter Filter Panel -->
<div class="panel panel-default" style="border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
  <div class="panel-body" style="padding: 16px 20px;">
    <form action="{{ route('admin.portfolios.index') }}" method="GET" class="form-inline" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; justify-content: space-between;">
      <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; flex: 1;">
        <div class="form-group" style="margin: 0; min-width: 240px; flex: 1;">
          <div class="input-group" style="width: 100%;">
            <span class="input-group-addon" style="background: #f8fafc;"><i class="fa fa-search"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Cari nama proyek, klien, kategori..." value="{{ request('search') }}">
          </div>
        </div>

        <div class="form-group" style="margin: 0;">
          <select name="status" class="form-control" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif (Tayang)</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif (Draft)</option>
          </select>
        </div>

        @if($categories->isNotEmpty())
        <div class="form-group" style="margin: 0;">
          <select name="category" class="form-control" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
              <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
          </select>
        </div>
        @endif

        <button type="submit" class="btn btn-default" style="font-weight: 600;">
          <i class="fa fa-filter"></i> Filter
        </button>

        @if(request()->hasAny(['search', 'status', 'category']))
          <a href="{{ route('admin.portfolios.index') }}" class="btn btn-link text-danger" style="text-decoration: none;">
            <i class="fa fa-times"></i> Reset Filter
          </a>
        @endif
      </div>
    </form>
  </div>
</div>

<!-- Main Table Panel -->
<div class="panel panel-default" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
  <div class="panel-heading" style="background: #ffffff; border-bottom: 2px solid #f1f5f9; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between;">
    <div style="font-weight: 800; font-size: 16px; color: #0f172a;">
      <i class="fa fa-briefcase text-success fa-fw"></i> Daftar Portofolio &amp; Proyek Nyata
    </div>
    <span class="badge" style="background: var(--admin-orange); font-size: 12px; padding: 5px 10px;">
      Total: {{ $portfolios->total() }} Data
    </span>
  </div>

  <div class="table-responsive">
    <table class="table table-hover" style="margin-bottom: 0; vertical-align: middle;">
      <thead style="background: #f8fafc; font-size: 12px; text-transform: uppercase; color: #64748b; letter-spacing: 0.5px;">
        <tr>
          <th style="width: 60px; text-align: center;">Urutan</th>
          <th style="width: 120px; text-align: center;">Foto / Mockup</th>
          <th>Nama Proyek &amp; Klien</th>
          <th>Kategori Portofolio</th>
          <th style="max-width: 320px;">Ringkasan Hasil Kerja</th>
          <th style="width: 110px; text-align: center;">Status</th>
          <th style="width: 150px; text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($portfolios as $item)
          <tr style="{{ !$item->is_active ? 'opacity: 0.65; background: #fafafa;' : '' }}">
            <td style="text-align: center; vertical-align: middle;">
              <span class="badge" style="background: #f1f5f9; color: #334155; font-size: 13px; font-weight: 800; padding: 6px 10px; border-radius: 8px;">
                #{{ $item->sort_order }}
              </span>
            </td>

            <td style="text-align: center; vertical-align: middle;">
              <div style="width: 100px; height: 60px; border-radius: 8px; overflow: hidden; border: 1px solid #e2e8f0; background: #f8fafc; margin: 0 auto; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            </td>

            <td style="vertical-align: middle;">
              <strong style="font-size: 15px; color: #0f172a; display: block; margin-bottom: 3px;">
                {{ $item->title }}
              </strong>
              <div style="font-size: 12px; color: #64748b;">
                <i class="fa fa-map-marker text-danger"></i> {{ $item->client ?? 'Klien NazwaGraha' }}
                @if($item->badge)
                  <span class="badge" style="background: #eff6ff; color: #1d4ed8; font-size: 10px; font-weight: 700; margin-left: 6px; border: 1px solid #bfdbfe;">
                    {{ $item->badge }}
                  </span>
                @endif
              </div>
            </td>

            <td style="vertical-align: middle;">
              <span class="label" style="background: #fff7ed; color: #c2410c; border: 1px solid #fed7aa; padding: 4px 8px; font-size: 11px; font-weight: 700; border-radius: 4px; display: inline-block;">
                {{ $item->category }}
              </span>
            </td>

            <td style="vertical-align: middle; color: #475569; font-size: 13px; line-height: 1.5;">
              {{ Str::limit($item->description, 110) }}
            </td>

            <td style="text-align: center; vertical-align: middle;">
              <form action="{{ route('admin.portfolios.toggle', $item->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('PATCH')
                @if($item->is_active)
                  <button type="submit" class="btn btn-xs btn-success" style="border-radius: 20px; padding: 4px 12px; font-weight: 700;" title="Klik untuk menonaktifkan">
                    <i class="fa fa-check-circle"></i> AKTIF
                  </button>
                @else
                  <button type="submit" class="btn btn-xs btn-default" style="border-radius: 20px; padding: 4px 12px; font-weight: 700; color: #64748b; background: #e2e8f0;" title="Klik untuk mengaktifkan">
                    <i class="fa fa-pause-circle"></i> NONAKTIF
                  </button>
                @endif
              </form>
            </td>

            <td style="text-align: center; vertical-align: middle;">
              <div class="btn-group" role="group">
                <a href="{{ route('admin.portfolios.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit Portofolio" style="border-radius: 6px 0 0 6px;">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <button type="button" class="btn btn-sm btn-danger" style="border-radius: 0 6px 6px 0;" onclick="confirmDelete('{{ $item->id }}', '{{ addslashes($item->title) }}')" title="Hapus Portofolio">
                  <i class="fa fa-trash"></i>
                </button>
              </div>

              <form id="delete-form-{{ $item->id }}" action="{{ route('admin.portfolios.destroy', $item->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center" style="padding: 40px 20px;">
              <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 12px;">📁</div>
              <p style="font-size: 16px; color: #475569; font-weight: 600; margin-bottom: 8px;">Belum ada data portofolio yang sesuai</p>
              <p class="text-muted" style="font-size: 13px; margin-bottom: 16px;">Mulai tambahkan hasil proyek dan karya implementasi IT Anda sekarang.</p>
              <a href="{{ route('admin.portfolios.create') }}" class="btn btn-orange">
                <i class="fa fa-plus-circle"></i> Tambah Portofolio Pertama
              </a>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($portfolios->hasPages())
    <div class="panel-footer" style="background: #ffffff; border-top: 1px solid #f1f5f9; padding: 12px 20px;">
      <div class="row">
        <div class="col-sm-6 text-muted" style="padding-top: 7px; font-size: 13px;">
          Menampilkan {{ $portfolios->firstItem() }} - {{ $portfolios->lastItem() }} dari total {{ $portfolios->total() }} portofolio
        </div>
        <div class="col-sm-6 text-right">
          {{ $portfolios->links() }}
        </div>
      </div>
    </div>
  @endif
</div>

<!-- Visual Preview Section matching Front-End Cards -->
<div class="panel panel-default" style="border-radius: 12px; border: 1px solid #e2e8f0; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
  <div class="panel-heading" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 14px 20px; font-weight: 700; color: #0f172a;">
    <i class="fa fa-eye fa-fw text-primary"></i> Pratinjau Tampilan Live di Halaman Depan Web (Section: Portofolio &amp; Proyek Nyata)
  </div>
  <div class="panel-body" style="background: #f8fafc; padding: 25px;">
    <div class="row">
      @foreach($portfolios->where('is_active', true)->take(6) as $preview)
        <div class="col-md-4 col-sm-6" style="margin-bottom: 24px;">
          <div style="background: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04); height: 100%; display: flex; flex-direction: column;">
            <div style="height: 180px; overflow: hidden; position: relative; background: #f1f5f9;">
              <img src="{{ asset($preview->image) }}" alt="{{ $preview->title }}" style="width: 100%; height: 100%; object-fit: cover;">
              @if(!empty($preview->badge))
                <span style="position: absolute; top: 12px; right: 12px; background: rgba(16, 24, 40, 0.85); color: #ff9a4b; font-size: 11px; font-weight: 800; padding: 3px 9px; border-radius: 20px;">
                  {{ $preview->badge }}
                </span>
              @endif
            </div>
            <div style="padding: 18px 20px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
              <div>
                <span style="font-size: 10.5px; font-weight: 800; letter-spacing: 0.6px; color: var(--admin-orange); text-transform: uppercase; display: block; margin-bottom: 6px;">
                  {{ $preview->category }}
                </span>
                <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 8px; line-height: 1.35;">
                  {{ $preview->title }}
                </h4>
                <p style="font-size: 12.5px; color: #64748b; line-height: 1.6; margin: 0 0 16px;">
                  {{ $preview->description }}
                </p>
              </div>
              <div style="border-top: 1px solid #f1f5f9; padding-top: 12px; display: flex; align-items: center; justify-content: space-between; font-size: 12px;">
                <span style="color: #475569; font-weight: 600;">📍 {{ $preview->client ?? 'Klien NazwaGraha' }}</span>
                <span style="color: var(--admin-orange); font-weight: 700;">Konsultasi Serupa →</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function confirmDelete(id, title) {
    if (confirm("Apakah Anda yakin ingin menghapus portofolio '" + title + "'?\nData yang dihapus tidak dapat dikembalikan.")) {
      document.getElementById('delete-form-' + id).submit();
    }
  }
</script>
@endsection
