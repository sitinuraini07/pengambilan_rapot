@extends('layouts.app')

@section('title', 'Data Guru')
@section('breadcrumb', 'GURU / INDEX')

@section('content')
<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $gurus->total() }}</h3>
            <p>Total Guru</p>
        </div>
    </div>
    <button class="btn-outline-custom" onclick="window.print()">
    <i class="bi bi-printer"></i>
    Cetak
    </button>

    <a href="{{ route('guru.export.pdf') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-pdf"></i>
    Export PDF
    </a>

    <a href="{{ route('guru.export.excel') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-excel"></i>
    Export Excel
    </a>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-book-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $gurus->pluck('mapel')->unique()->count() }}</h3>
            <p>Mata Pelajaran</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $gurus->where('email', '!=', null)->count() }}</h3>
            <p>Memiliki Email</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-whatsapp"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $gurus->where('no_hp', '!=', null)->count() }}</h3>
            <p>Memiliki WA</p>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        <a href="{{ route('guru.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-circle"></i>
            Tambah Guru
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
            <option>Semua Mapel</option>
            <option>Matematika</option>
            <option>Bahasa Indonesia</option>
            <option>Bahasa Inggris</option>
            <option>IPA</option>
            <option>IPS</option>
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
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $g)
                <tr>
                    <td>
                        <span class="fw-700" style="color: var(--primary-600);">{{ $loop->iteration }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--primary-500), var(--primary-400)); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                {{ substr($g->nama_guru, 0, 1) }}
                            </div>
                            <div>
                                <span class="fw-700">{{ $g->nama_guru }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-muted fw-600">{{ $g->nip ?? '-' }}</span>
                    </td>
                    <td>
                        <span class="badge-premium badge-blue">
                            <i class="bi bi-journal-bookmark-fill"></i>
                            {{ $g->mapel ?? '-' }}
                        </span>
                    </td>
                    <td>
                        @if($g->email)
                            <span class="text-muted fw-600">
                                <i class="bi bi-envelope me-1" style="color: var(--primary-500);"></i>
                                {{ $g->email }}
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($g->no_hp)
                            <span class="text-muted fw-600">
                                <i class="bi bi-whatsapp me-1" style="color: #25D366;"></i>
                                {{ $g->no_hp }}
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('guru.show', $g->id) }}" class="btn-action" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('guru.edit', $g->id) }}" class="btn-action btn-action-edit" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus data guru {{ $g->nama_guru }}?')">
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
                        <h5 class="mt-3 fw-700">Belum Ada Data Guru</h5>
                        <p class="text-muted">Klik tombol "Tambah Guru" untuk menambahkan data</p>
                        <a href="{{ route('guru.create') }}" class="btn-primary-custom mt-3">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Guru
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
        Menampilkan {{ $gurus->firstItem() ?? 0 }} - {{ $gurus->lastItem() ?? 0 }} dari {{ $gurus->total() ?? 0 }} data
    </div>
    <div>
        {{ $gurus->links() }}
    </div>
</div>

<!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-premium" style="border-radius: 24px;">
            <div class="modal-header border-soft" style="padding: 1.5rem;">
                <h5 class="modal-title fw-800">
                    <i class="bi bi-funnel me-2" style="color: var(--primary-500);"></i>
                    Filter Data Guru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Mata Pelajaran</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua Mapel</option>
                            <option>Matematika</option>
                            <option>Bahasa Indonesia</option>
                            <option>Bahasa Inggris</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Status</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua Status</option>
                            <option>PNS</option>
                            <option>Honorer</option>
                            <option>Kontrak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Kata Kunci</label>
                        <input type="text" class="form-control border-soft rounded-3 p-3" placeholder="Cari nama atau NIP...">
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

@push('scripts')
<style>
    .pagination-custom .pagination {
        margin: 0;
        gap: 5px;
    }
    .pagination-custom .page-link {
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        color: var(--text-secondary);
        font-weight: 600;
        padding: 0.5rem 0.9rem;
    }
    .pagination-custom .page-item.active .page-link {
        background: var(--primary-500);
        border-color: var(--primary-500);
        color: white;
    }
    .pagination-custom .page-link:hover {
        background: var(--primary-50);
        color: var(--primary-600);
        border-color: var(--primary-300);
    }
</style>
@endpush