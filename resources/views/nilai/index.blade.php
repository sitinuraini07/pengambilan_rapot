@extends('layouts.app')

@section('title', 'Data Nilai')
@section('breadcrumb', 'NILAI / INDEX')

@section('content')
<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-journal-check"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $nilais->total() }}</h3>            
            <p>Total Nilai</p>
        </div>
    </div>
    <button class="btn-outline-custom" onclick="window.print()">
    <i class="bi bi-printer"></i>
    Cetak
    </button>

    <a href="{{ route('nilai.export.pdf') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-pdf"></i>
    Export PDF
    </a>

    <a href="{{ route('nilai.export.excel') }}" class="btn-outline-custom">
    <i class="bi bi-file-earmark-excel"></i>
    Export Excel
    </a>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $nilais->pluck('nama_siswa')->unique()->count() }}</h3>
            <p>Siswa Dinilai</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-book-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $nilais->pluck('mata_pelajaran')->unique()->count() }}</h3>
            <p>Mata Pelajaran</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-calculator"></i>
        </div>
        <div class="stat-content">
            <h3>{{ round($nilais->avg('nilai'), 1) ?? 0 }}</h3>
            <p>Rata-rata Nilai</p>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        <a href="{{ route('nilai.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-circle"></i>
            Tambah Nilai
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
        </select>
    </div>
</div>

<!-- Table -->
<div class="card-premium p-0 overflow-hidden">
<div class="table-responsive">

<table class="table align-middle mb-0">
<thead>
<tr>
<th width="5%">No</th>
<th>Nama Siswa</th>
<th width="20%">Mata Pelajaran</th>
<th width="10%" class="text-center">Nilai</th>
<th width="15%" class="text-center">Keterangan</th>
<th width="15%" class="text-center">Aksi</th>
</tr>
</thead>

<tbody>
@forelse($nilais as $n)

<tr>

<td>
<span class="badge bg-light text-dark border">
{{ $loop->iteration }}
</span>
</td>

<td>
<div class="d-flex align-items-center">

<div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
style="width:35px;height:35px;">
<i class="bi bi-person"></i>
</div>

<strong>{{ $n->nama_siswa }}</strong>

</div>
</td>

<td>
<span class="badge bg-info bg-opacity-10 text-info border border-info">
<i class="bi bi-book-half me-1"></i>
{{ $n->mata_pelajaran }}
</span>
</td>

<td class="text-center">
<span class="fs-5 fw-bold text-dark">
{{ $n->nilai }}
</span>
</td>

<td class="text-center">

@if($n->nilai >= 90)

<span class="badge bg-success bg-opacity-10 text-success border border-success rounded-pill px-3 py-2">
Sangat Baik
</span>

@elseif($n->nilai >= 75)

<span class="badge bg-primary bg-opacity-10 text-primary border border-primary rounded-pill px-3 py-2">
Baik
</span>

@elseif($n->nilai >= 60)

<span class="badge bg-warning bg-opacity-10 text-warning border border-warning rounded-pill px-3 py-2">
Cukup
</span>

@else

<span class="badge bg-danger bg-opacity-10 text-danger border border-danger rounded-pill px-3 py-2">
Kurang
</span>

@endif

</td>

<td class="text-center">

<div class="d-flex justify-content-center gap-1">

<a href="{{ route('nilai.edit', $n->id) }}"
class="btn btn-warning btn-sm text-white"
title="Edit">

<i class="bi bi-pencil-square"></i>

</a>

<form action="{{ route('nilai.destroy', $n->id) }}"
method="POST"
class="d-inline"
onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">

@csrf
@method('DELETE')

<button type="submit"
class="btn btn-danger btn-sm"
title="Hapus">

<i class="bi bi-trash"></i>

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center py-5">

<div class="d-flex flex-column align-items-center">

<i class="bi bi-clipboard-x text-muted mb-3" style="font-size:3rem;"></i>

<h5 class="text-muted mb-0">
Belum Ada Data Nilai
</h5>

<p class="text-muted small">
Silakan tambahkan data nilai siswa terlebih dahulu.
</p>

</div>

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
        Menampilkan {{ $nilais->firstItem() ?? 0 }} - {{ $nilais->lastItem() ?? 0 }} dari {{ $nilais->total() ?? 0 }} data
    </div>
    <div>
        {{ $nilais->links() }}
    </div>
</div>

<!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-premium" style="border-radius: 24px;">
            <div class="modal-header border-soft" style="padding: 1.5rem;">
                <h5 class="modal-title fw-800">
                    <i class="bi bi-funnel me-2" style="color: var(--primary-500);"></i>
                    Filter Data Nilai
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
                        </select>
                    </div>
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
                        <label class="form-label fw-600 small text-muted">Rentang Nilai</label>
                        <div class="d-flex gap-2">
                            <input type="number" class="form-control border-soft rounded-3 p-3" placeholder="Min">
                            <input type="number" class="form-control border-soft rounded-3 p-3" placeholder="Max">
                        </div>
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