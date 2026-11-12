@extends('admin.layouts.app')

@section('title', 'Kelola Pesan & Prospek Klien (Inquiries)')
@section('page-title', 'Kelola Pesan & Prospek Klien')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
      <div class="panel-heading" style="padding: 15px;">
        <div class="row">
          <div class="col-sm-6">
            <span style="font-size: 16px; font-weight: 700; color: #1e293b;">
              <i class="fa fa-envelope-open-o fa-fw"></i> Daftar Prospek Masuk (Leads)
            </span>
          </div>
          <div class="col-sm-6 text-right">
            <span class="label label-info" style="font-size: 12px; padding: 6px 12px; border-radius: 20px;">
              Total: {{ $inquiries->total() }} Pesan
            </span>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <!-- Filter & Search Bar -->
        <form method="GET" action="{{ route('admin.inquiries.index') }}" class="form-inline" style="margin-bottom: 20px;">
          <div class="form-group" style="margin-right: 10px;">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Cari nama, WA, email, PT..." value="{{ request('q') }}" style="min-width: 260px;">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>

          <div class="form-group" style="margin-right: 10px;">
            <select name="status" class="form-control" onchange="this.form.submit()">
              <option value="">-- Semua Status --</option>
              <option value="baru" {{ request('status') === 'baru' ? 'selected' : '' }}>Baru Masuk</option>
              <option value="dihubungi" {{ request('status') === 'dihubungi' ? 'selected' : '' }}>Sudah Dihubungi</option>
              <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai / Deal</option>
              <option value="batal" {{ request('status') === 'batal' ? 'selected' : '' }}>Batal</option>
            </select>
          </div>

          @if(request()->hasAny(['q', 'status']))
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-warning" title="Reset Filter">
              <i class="fa fa-undo"></i> Reset
            </a>
          @endif
        </form>

        <!-- Inquiries Table -->
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr style="background: #f8fafc;">
                <th style="width: 140px;">Waktu & Status</th>
                <th>Nama & Perusahaan</th>
                <th>Kontak Langsung</th>
                <th>Layanan & Budget</th>
                <th>Pesan / Kebutuhan</th>
                <th style="width: 160px; text-align: center;">Ubah Status / Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($inquiries as $inq)
                @php
                  // Sanitize WA phone
                  $waNum = preg_replace('/[^0-9]/', '', $inq->whatsapp);
                  if (str_starts_with($waNum, '0')) {
                    $waNum = '62' . substr($waNum, 1);
                  }
                  $waText = urlencode("Halo Bapak/Ibu {$inq->name}, terima kasih telah menghubungi NazwaGraha terkait layanan {$inq->service_name}. Kami siap membantu!");
                @endphp
                <tr>
                  <td>
                    <small class="text-muted"><i class="fa fa-clock-o"></i> {{ $inq->created_at->format('d M Y, H:i') }}</small>
                    <div style="margin-top: 6px;">
                      @if($inq->status === 'baru')
                        <span class="label label-danger" style="display: inline-block; padding: 4px 8px; border-radius: 4px;">Baru Masuk</span>
                      @elseif($inq->status === 'dihubungi')
                        <span class="label label-warning" style="display: inline-block; padding: 4px 8px; border-radius: 4px;">Dihubungi</span>
                      @elseif($inq->status === 'selesai')
                        <span class="label label-success" style="display: inline-block; padding: 4px 8px; border-radius: 4px;">Deal / Selesai</span>
                      @else
                        <span class="label label-default" style="display: inline-block; padding: 4px 8px; border-radius: 4px;">Batal</span>
                      @endif
                    </div>
                  </td>
                  <td>
                    <strong style="font-size: 14px; color: #1e293b;">{{ $inq->name }}</strong>
                    @if($inq->company_name)
                      <div class="text-muted" style="font-size: 12px;"><i class="fa fa-building-o"></i> {{ $inq->company_name }}</div>
                    @endif
                  </td>
                  <td>
                    <div>
                      <a href="https://wa.me/{{ $waNum }}?text={{ $waText }}" target="_blank" class="btn btn-xs btn-success" style="font-weight: 600; margin-bottom: 4px;">
                        <i class="fa fa-whatsapp"></i> Chat WA ({{ $inq->whatsapp }})
                      </a>
                    </div>
                    @if($inq->email)
                      <div style="font-size: 12px;">
                        <a href="mailto:{{ $inq->email }}" class="text-muted">
                          <i class="fa fa-envelope-o"></i> {{ $inq->email }}
                        </a>
                      </div>
                    @endif
                  </td>
                  <td>
                    <span class="label label-primary">{{ $inq->service_name ?: 'Konsultasi Umum' }}</span>
                    @if($inq->budget)
                      <div style="font-size: 12px; margin-top: 4px; color: #059669; font-weight: 600;">
                        <i class="fa fa-money"></i> Budget: {{ $inq->budget }}
                      </div>
                    @endif
                  </td>
                  <td>
                    <div style="max-height: 80px; overflow-y: auto; font-size: 12px; line-height: 1.5; color: #475569;">
                      {{ $inq->message }}
                    </div>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <!-- Quick status change form -->
                    <form action="{{ route('admin.inquiries.status', $inq) }}" method="POST" style="margin-bottom: 6px;">
                      @csrf
                      @method('PATCH')
                      <select name="status" class="form-control input-sm" onchange="this.form.submit()" style="font-size: 11px;">
                        <option value="baru" {{ $inq->status === 'baru' ? 'selected' : '' }}>Baru</option>
                        <option value="dihubungi" {{ $inq->status === 'dihubungi' ? 'selected' : '' }}>Dihubungi</option>
                        <option value="selesai" {{ $inq->status === 'selesai' ? 'selected' : '' }}>Deal / Selesai</option>
                        <option value="batal" {{ $inq->status === 'batal' ? 'selected' : '' }}>Batal</option>
                      </select>
                    </form>

                    <form action="{{ route('admin.inquiries.destroy', $inq) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data prospek ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-xs btn-danger" title="Hapus Prospek">
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center" style="padding: 40px;">
                    <i class="fa fa-inbox text-muted" style="font-size: 40px; margin-bottom: 10px;"></i>
                    <p class="text-muted">Belum ada pesan masuk atau data prospek yang sesuai pencarian.</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <span class="text-muted">Menampilkan {{ $inquiries->firstItem() ?? 0 }} sampai {{ $inquiries->lastItem() ?? 0 }} dari {{ $inquiries->total() }} data</span>
          </div>
          <div class="col-sm-6 text-right">
            {{ $inquiries->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
