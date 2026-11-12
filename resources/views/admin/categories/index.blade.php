@extends('admin.layouts.app')

@section('title', 'Kategori Artikel')
@section('page-title', 'Kelola Kategori Artikel')

@section('content')
<div class="row">
  <!-- Form Tambah Kategori -->
  <div class="col-md-4">
    <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
      <div class="panel-heading" style="font-weight: 700; background: #1e293b; color: #fff;">
        <i class="fa fa-plus-circle fa-fw"></i> Tambah Kategori Baru
      </div>
      <div class="panel-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: CLOUD COMPUTING" required value="{{ old('name') }}">
            <small class="text-muted">Nama kategori yang akan tampil pada artikel.</small>
          </div>

          <div class="form-group">
            <label>Slug URL (Opsional)</label>
            <input type="text" name="slug" class="form-control" placeholder="contoh: cloud-computing" value="{{ old('slug') }}">
            <small class="text-muted">Jika dikosongkan, slug dibuat otomatis dari nama.</small>
          </div>

          <div class="form-group">
            <label>Deskripsi Kategori</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Keterangan singkat seputar topik kategori ini...">{{ old('description') }}</textarea>
          </div>

          <button type="submit" class="btn btn-orange btn-block">
            <i class="fa fa-save fa-fw"></i> Simpan Kategori
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Daftar Kategori -->
  <div class="col-md-8">
    <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
      <div class="panel-heading" style="font-weight: 700;">
        <i class="fa fa-tags fa-fw"></i> Daftar Kategori Tersedia ({{ $categories->count() }})
      </div>
      <div class="panel-body" style="padding: 0;">
        <div class="table-responsive">
          <table class="table table-striped table-hover" style="margin-bottom: 0;">
            <thead>
              <tr>
                <th style="width: 50px;">#</th>
                <th>Nama Kategori</th>
                <th>Slug URL</th>
                <th class="text-center">Jumlah Artikel</th>
                <th class="text-right" style="width: 140px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($categories as $index => $cat)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    <strong>{{ $cat->name }}</strong>
                    @if($cat->description)
                      <div class="text-muted small">{{ Str::limit($cat->description, 60) }}</div>
                    @endif
                  </td>
                  <td><code>{{ $cat->slug }}</code></td>
                  <td class="text-center">
                    <span class="badge badge-orange">{{ $cat->articles_count }}</span>
                  </td>
                  <td class="text-right">
                    <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal{{ $cat->id }}" title="Edit">
                      <i class="fa fa-pencil"></i> Edit
                    </button>

                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $cat->name }}?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-xs btn-danger" title="Hapus" {{ $cat->articles_count > 0 ? 'disabled' : '' }}>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>

                <!-- Modal Edit Kategori -->
                <div class="modal fade" id="editModal{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $cat->id }}">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form action="{{ route('admin.categories.update', $cat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="modalLabel{{ $cat->id }}">Edit Kategori: {{ $cat->name }}</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $cat->name }}" required>
                          </div>
                          <div class="form-group">
                            <label>Slug URL</label>
                            <input type="text" name="slug" class="form-control" value="{{ $cat->slug }}" required>
                          </div>
                          <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3">{{ $cat->description }}</textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-orange">Perbarui Kategori</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              @empty
                <tr>
                  <td colspan="5" class="text-center text-muted" style="padding: 24px;">Belum ada kategori yang dibuat.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
