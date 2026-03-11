@extends('layouts.app')

@section('title', 'Data Kelas')
@section('breadcrumb', 'KELAS / INDEX')

@section('content')
<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-diagram-3-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $kelas->total() }}</h3>
            <p>Total Kelas</p>
        </div>
    </div>
    <button class="btn-outline-custom" onclick="window.print()">
    <i class="bi bi-printer"></i>
    Cetak
    </button>

    <a href="{{ route('kelas.export.pdf') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-pdf"></i>
    Export PDF
    </a>

    <a href="{{ route('kelas.export.excel') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-excel"></i>
    Export Excel
    </a>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $kelas->sum('jumlah_siswa') ?? 0 }}</h3>
            <p>Total Siswa</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-person-badge-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $kelas->whereNotNull('wali_kelas')->count() }}</h3>
            <p>Dengan Wali Kelas</p>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        <a href="{{ route('kelas.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-circle"></i>
            Tambah Kelas
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
            <option>Semua Jurusan</option>
            <option>IPA</option>
            <option>IPS</option>
            <option>Bahasa</option>
            <option>RPL</option>
            <option>AKL</option>
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
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Wali Kelas</th>
                    <th>Jumlah Siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kelas as $k)
                <tr>
                    <td>
                        <span class="fw-700" style="color: var(--primary-600);">{{ $loop->iteration }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--primary-500), var(--primary-400)); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                {{ substr($k->nama_kelas, 0, 1) }}
                            </div>
                            <div>
                                <span class="fw-700">{{ $k->nama_kelas }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-premium badge-blue">
                            <i class="bi bi-bookmark"></i>
                            {{ $k->jurusan ?? '-' }}
                        </span>
                    </td>
                    <td>
                        @if($k->wali_kelas)
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-person-check" style="color: var(--primary-500);"></i>
                                <span class="text-muted fw-600">{{ $k->wali_kelas }}</span>
                            </div>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <span class="fw-600">{{ $k->jumlah_siswa ?? 0 }} Siswa</span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('kelas.show', $k->id) }}" class="btn-action" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('kelas.edit', $k->id) }}" class="btn-action btn-action-edit" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus kelas {{ $k->nama_kelas }}?')">
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
                    <td colspan="6" style="text-align: center; padding: 3rem;">
                        <i class="bi bi-diagram-3 fs-1" style="color: var(--text-muted); opacity: 0.5;"></i>
                        <h5 class="mt-3 fw-700">Belum Ada Data Kelas</h5>
                        <p class="text-muted">Klik tombol "Tambah Kelas" untuk menambahkan data</p>
                        <a href="{{ route('kelas.create') }}" class="btn-primary-custom mt-3">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Kelas
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
        Menampilkan {{ $kelas->firstItem() ?? 0 }} - {{ $kelas->lastItem() ?? 0 }} dari {{ $kelas->total() ?? 0 }} data
    </div>
    <div>
        {{ $kelas->links() }}
    </div>
</div>

<!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-premium" style="border-radius: 24px;">
            <div class="modal-header border-soft" style="padding: 1.5rem;">
                <h5 class="modal-title fw-800">
                    <i class="bi bi-funnel me-2" style="color: var(--primary-500);"></i>
                    Filter Data Kelas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Jurusan</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua Jurusan</option>
                            <option>IPA</option>
                            <option>IPS</option>
                            <option>Bahasa</option>
                            <option>RPL</option>
                            <option>AKL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Tingkat</label>
                        <select class="form-control border-soft rounded-3 p-3">
                            <option>Semua Tingkat</option>
                            <option>X</option>
                            <option>XI</option>
                            <option>XII</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Kata Kunci</label>
                        <input type="text" class="form-control border-soft rounded-3 p-3" placeholder="Cari nama kelas atau wali kelas...">
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