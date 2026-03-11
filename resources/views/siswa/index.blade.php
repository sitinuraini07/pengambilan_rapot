@extends('layouts.app')

@section('title', 'Data Siswa')
@section('breadcrumb', 'SISWA / INDEX')

@section('content')
<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $siswas->total() }}</h3>
            <p>Total Siswa</p>
        </div>
    </div>
    <button class="btn-outline-custom" onclick="window.print()">
    <i class="bi bi-printer"></i>
    Cetak
    </button>
    <a href="{{ route('siswa.export.pdf') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-pdf"></i>
    Export PDF
    </a>

    <a href="{{ route('siswa.export.excel') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-excel"></i>
    Export Excel
    </a>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-building"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $siswas->pluck('kelas')->unique()->count() }}</h3>
            <p>Kelas</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-gender-ambiguous"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $siswas->where('jenis_kelamin', 'L')->count() }} / {{ $siswas->where('jenis_kelamin', 'P')->count() }}</h3>
            <p>Laki / Perempuan</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-calendar-check"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $siswas->where('status', 'aktif')->count() }}</h3>
            <p>Siswa Aktif</p>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        <a href="{{ route('siswa.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-circle"></i>
            Tambah Siswa
        </a>
        <button class="btn-outline-custom" onclick="window.print()">
            <i class="bi bi-printer"></i>
            Cetak
        </button>
        <button class="btn-outline-custom" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="bi bi-funnel"></i>
            Filter
        </button>
    </div>
    <div>
        <select class="form-select border-soft rounded-3" style="width: auto; padding: 0.6rem 2rem 0.6rem 1rem; font-weight: 600; color: var(--text-secondary);">
            <option>Semua Kelas</option>
            <option>X IPA 1</option>
            <option>X IPA 2</option>
            <option>XI IPA 1</option>
            <option>XI IPS 1</option>
            <option>XII IPA 1</option>
        </select>
    </div>
</div>

<!-- Table -->
<div class="card-premium p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table-premium">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NIS/NISN</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $s)
                <tr>
                    <td>
                        <span class="fw-700" style="color: var(--primary-600);">{{ $loop->iteration }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--primary-500), var(--primary-400)); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                {{ substr($s->nama, 0, 1) }}
                            </div>
                            <div>
                                <span class="fw-700">{{ $s->nama }}</span>
                                <div class="text-muted tiny-text">{{ $s->nis ?? $s->nisn ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-muted fw-600">{{ $s->nis ?? $s->nisn ?? '-' }}</span>
                    </td>
                    <td>
                        <span class="badge-premium badge-blue">
                            <i class="bi bi-building"></i>
                            {{ $s->kelas ?? '-' }}
                        </span>
                    </td>
                    <td>
                        @if($s->jenis_kelamin == 'L')
                            <span class="badge-premium badge-blue">
                                <i class="bi bi-gender-male"></i> Laki-laki
                            </span>
                        @elseif($s->jenis_kelamin == 'P')
                            <span class="badge-premium" style="background: #fee9e7; color: #dc2626; border: 1px solid #fecaca;">
                                <i class="bi bi-gender-female"></i> Perempuan
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge-premium badge-green">
                            <i class="bi bi-check-circle"></i>
                            Aktif
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('siswa.show', $s->id) }}" class="btn-action" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('siswa.edit', $s->id) }}" class="btn-action btn-action-edit" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus data siswa {{ $s->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-action-delete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 3rem;">
                        <i class="bi bi-people fs-1" style="color: var(--text-muted); opacity: 0.5;"></i>
                        <h5 class="mt-3 fw-700">Belum Ada Data Siswa</h5>
                        <p class="text-muted">Klik tombol "Tambah Siswa" untuk menambahkan data</p>
                        <a href="{{ route('siswa.create') }}" class="btn-primary-custom mt-3">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Siswa
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="text-muted small fw-600">
        Menampilkan {{ $siswas->firstItem() ?? 0 }} - {{ $siswas->lastItem() ?? 0 }} dari {{ $siswas->total() ?? 0 }} data
    </div>
    <div>
        {{ $siswas->links() }}
    </div>
</div>

<!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-premium" style="border-radius: 24px;">
            <div class="modal-header border-soft" style="padding: 1.5rem;">
                <h5 class="modal-title fw-800">
                    <i class="bi bi-funnel me-2" style="color: var(--primary-500);"></i>
                    Filter Data Siswa
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Kelas</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua Kelas</option>
                            <option>X IPA 1</option>
                            <option>X IPA 2</option>
                            <option>XI IPA 1</option>
                            <option>XI IPS 1</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Jenis Kelamin</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Status</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua Status</option>
                            <option>Aktif</option>
                            <option>Lulus</option>
                            <option>Keluar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Kata Kunci</label>
                        <input type="text" class="form-control border-soft rounded-3 p-3" placeholder="Cari nama atau NIS...">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-soft" style="padding: 1.5rem;">
                <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn-primary-custom" data-bs-dismiss="modal">Terapkan Filter</button>
            </div>
        </div>
    </div>
</div>
@endsection