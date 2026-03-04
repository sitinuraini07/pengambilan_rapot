@extends('layouts.app')

@section('title', 'Data Guru - E-Raport')
@section('page-title', 'Data Guru')
@section('icon', 'people-fill')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
@endsection

@section('content')
<!-- Header dengan Statistik Sederhana -->
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
</div>

<!-- Tombol Action -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div style="display: flex; gap: 1rem;">
        <a href="{{ route('guru.create') }}" class="btn-custom btn-custom-light">
            <i class="bi bi-plus-circle"></i>
            Tambah Guru Baru
        </a>
        <button class="btn-custom" onclick="window.print()">
            <i class="bi bi-printer"></i>
            Cetak Data
        </button>
    </div>
</div>

<!-- Tabel Data Guru -->
<div class="table-responsive">
    <table class="table-custom">
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
            @forelse($gurus as $index => $g)
            <tr>
                <td>
                    <span class="badge-custom">
                        {{ $loop->iteration }}
                    </span>
                </td>
                <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #6fa8dc 0%, #4a86e8 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-person-fill" style="color: white; font-size: 1.1rem;"></i>
                        </div>
                        <div>
                            <strong style="color: var(--text-primary);">{{ $g->nama_guru }}</strong>
                        </div>
                    </div>
                </td>
                <td>
                    <span style="color: var(--text-secondary); font-family: monospace;">
                        {{ $g->nip ?? '-' }}
                    </span>
                </td>
                <td>
                    <span class="badge-custom" style="background: rgba(111, 168, 220, 0.1); color: var(--accent); border: 1px solid rgba(111, 168, 220, 0.2);">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        {{ $g->mapel ?? '-' }}
                    </span>
                </td>
                <td>
                    @if($g->email)
                        <span style="color: var(--text-secondary);">
                            <i class="bi bi-envelope" style="color: var(--accent); margin-right: 4px;"></i>
                            {{ $g->email }}
                        </span>
                    @else
                        <span style="color: var(--text-muted);">-</span>
                    @endif
                </td>
                <td>
                    @if($g->no_hp)
                        <span style="color: var(--text-secondary);">
                            <i class="bi bi-whatsapp" style="color: #25D366; margin-right: 4px;"></i>
                            {{ $g->no_hp }}
                        </span>
                    @else
                        <span style="color: var(--text-muted);">-</span>
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
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru {{ $g->nama_guru }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-action-delete" title="Hapus" style="border: none; background: none; cursor: pointer;">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 3rem;">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                        <div style="width: 80px; height: 80px; background: var(--bg-card); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-people" style="font-size: 2.5rem; color: var(--text-muted);"></i>
                        </div>
                        <h5 style="color: var(--text-primary); margin: 0;">Belum Ada Data Guru</h5>
                        <p style="color: var(--text-muted); margin: 0;">Klik tombol "Tambah Guru Baru" untuk menambahkan data</p>
                        <a href="{{ route('guru.create') }}" class="btn-custom btn-custom-light" style="margin-top: 1rem;">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Guru Baru
                        </a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Info -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 2rem;">
    <div style="color: var(--text-muted); font-size: 0.9rem;">
        Menampilkan {{ $gurus->firstItem() ?? 0 }} - {{ $gurus->lastItem() ?? 0 }} dari {{ $gurus->total() ?? 0 }} data
    </div>
    <div class="pagination-custom">
        {{ $gurus->links() }}
    </div>
</div>
@endsection