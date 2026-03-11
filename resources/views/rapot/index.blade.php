@extends('layouts.app')

@section('title', 'Data Rapot')
@section('breadcrumb', 'RAPOT / INDEX')

@section('content')
<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-file-text-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $rapots->total() }}</h3>
            <p>Total Rapot</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $rapots->pluck('nama_siswa')->unique()->count() }}</h3>
            <p>Siswa</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-calendar-check"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $rapots->pluck('semester')->unique()->count() }}</h3>
            <p>Semester</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="bi bi-calculator"></i>
        </div>
        <div class="stat-content">
            @php
                $totalRata = 0;
                $countRata = 0;
                foreach($rapots as $r) {
                    $rata = ($r->matematika + $r->b_indonesia + $r->b_inggris + $r->produktif) / 4;
                    $totalRata += $rata;
                    $countRata++;
                }
                $avgRata = $countRata > 0 ? round($totalRata / $countRata, 1) : 0;
            @endphp
            <h3>{{ $avgRata }}</h3>
            <p>Rata-rata Nilai</p>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        <a href="{{ route('rapot.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-circle"></i>
            Tambah Rapot
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
        <select class="form-select border-soft rounded-3" style="width: auto; padding: 0.6rem 2rem 0.6rem 1rem; font-weight: 600; color: var(--text-secondary);" id="semesterFilter">
            <option value="">Semua Semester</option>
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
        </select>
    </div>
</div>

@if(session('success'))
    <div class="alert-custom alert-success mb-4">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<!-- Table -->
<div class="card-premium p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table-premium" id="rapotTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Matematika</th>
                    <th>B. Indonesia</th>
                    <th>B. Inggris</th>
                    <th>Produktif</th>
                    <th>Rata-rata</th>
                    <th>Predikat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rapots as $r)
                @php
                    $rata = ($r->matematika + $r->b_indonesia + $r->b_inggris + $r->produktif) / 4;
                    
                    $predikat = '';
                    $badgeClass = '';
                    
                    if($rata >= 90) {
                        $predikat = 'A (Istimewa)';
                        $badgeClass = 'badge-green';
                    } elseif($rata >= 80) {
                        $predikat = 'B (Baik)';
                        $badgeClass = 'badge-blue';
                    } elseif($rata >= 70) {
                        $predikat = 'C (Cukup)';
                        $badgeClass = 'badge-orange';
                    } else {
                        $predikat = 'D (Kurang)';
                        $badgeClass = 'badge-danger';
                    }
                @endphp
                <tr data-semester="{{ $r->semester }}">
                    <td>
                        <span class="fw-700" style="color: var(--primary-600);">{{ $loop->iteration + $rapots->firstItem() - 1 }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--primary-500), var(--primary-400)); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                {{ substr($r->nama_siswa, 0, 1) }}
                            </div>
                            <div>
                                <span class="fw-700">{{ $r->nama_siswa }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-muted fw-600">{{ $r->nis }}</span>
                    </td>
                    <td>
                        <span class="badge-premium badge-blue">
                            <i class="bi bi-building"></i>
                            {{ $r->kelas }}
                        </span>
                    </td>
                    <td>
                        <span class="text-muted fw-600">{{ $r->semester }}</span>
                    </td>
                    <td>
                        <span class="fw-600">{{ $r->matematika }}</span>
                    </td>
                    <td>
                        <span class="fw-600">{{ $r->b_indonesia }}</span>
                    </td>
                    <td>
                        <span class="fw-600">{{ $r->b_inggris }}</span>
                    </td>
                    <td>
                        <span class="fw-600">{{ $r->produktif }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-700 fs-5" style="color: var(--primary-600);">{{ number_format($rata, 1) }}</span>
                            <div class="progress" style="width: 50px; height: 6px; border-radius: 10px; background: var(--border-soft);">
                                <div class="progress-bar" style="width: {{ $rata }}%; background: var(--primary-500); border-radius: 10px;"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-premium {{ $badgeClass }}">
                            {{ $predikat }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('rapot.show', $r->id) }}" class="btn-action" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('rapot.edit', $r->id) }}" class="btn-action btn-action-edit" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="#" class="btn-action" title="Cetak" onclick="window.open('{{ route('rapot.cetak', $r->id) }}', '_blank')">
                                <i class="bi bi-printer"></i>
                            </a>
                            <form action="{{ route('rapot.destroy', $r->id) }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus rapot {{ $r->nama_siswa }}?')">
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
                    <td colspan="12" style="text-align: center; padding: 3rem;">
                        <i class="bi bi-files fs-1" style="color: var(--text-muted); opacity: 0.5;"></i>
                        <h5 class="mt-3 fw-700">Belum Ada Data Rapot</h5>
                        <p class="text-muted">Klik tombol "Tambah Rapot" untuk menambahkan data</p>
                        <a href="{{ route('rapot.create') }}" class="btn-primary-custom mt-3">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Rapot
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
        Menampilkan {{ $rapots->firstItem() ?? 0 }} - {{ $rapots->lastItem() ?? 0 }} dari {{ $rapots->total() ?? 0 }} data
    </div>
    <div>
        {{ $rapots->links() }}
    </div>
</div>

<!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-premium" style="border-radius: 24px;">
            <div class="modal-header border-soft" style="padding: 1.5rem;">
                <h5 class="modal-title fw-800">
                    <i class="bi bi-funnel me-2" style="color: var(--primary-500);"></i>
                    Filter Data Rapot
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <form id="filterForm">
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Kelas</label>
                        <select class="form-control border-soft rounded-3 p-3" id="filterKelas">
                            <option value="">Semua Kelas</option>
                            @php
                                $kelasList = $rapots->pluck('kelas')->unique();
                            @endphp
                            @foreach($kelasList as $kelas)
                                <option value="{{ $kelas }}">{{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Semester</label>
                        <select class="form-control border-soft rounded-3 p-3" id="filterSemester">
                            <option value="">Semua Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Rentang Nilai Rata-rata</label>
                        <div class="d-flex gap-2">
                            <input type="number" class="form-control border-soft rounded-3 p-3" id="filterMin" placeholder="Min" min="0" max="100">
                            <input type="number" class="form-control border-soft rounded-3 p-3" id="filterMax" placeholder="Max" min="0" max="100">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-600 small text-muted">Kata Kunci</label>
                        <input type="text" class="form-control border-soft rounded-3 p-3" id="filterKeyword" placeholder="Cari nama siswa atau NIS...">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-soft" style="padding: 1.5rem;">
                <button type="button" class="btn-outline-custom" id="resetFilter">Reset</button>
                <button type="button" class="btn-primary-custom" id="applyFilter">Terapkan Filter</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter by semester from dropdown
        const semesterFilter = document.getElementById('semesterFilter');
        if(semesterFilter) {
            semesterFilter.addEventListener('change', function() {
                const semester = this.value;
                const rows = document.querySelectorAll('#rapotTable tbody tr');
                
                rows.forEach(row => {
                    if(semester === '' || row.dataset.semester === semester) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // Modal filter functionality
        const applyFilter = document.getElementById('applyFilter');
        const resetFilter = document.getElementById('resetFilter');
        
        if(applyFilter) {
            applyFilter.addEventListener('click', function() {
                const kelas = document.getElementById('filterKelas').value;
                const semester = document.getElementById('filterSemester').value;
                const min = document.getElementById('filterMin').value;
                const max = document.getElementById('filterMax').value;
                const keyword = document.getElementById('filterKeyword').value.toLowerCase();
                
                const rows = document.querySelectorAll('#rapotTable tbody tr');
                
                rows.forEach(row => {
                    let show = true;
                    
                    // Filter kelas
                    if(kelas && !row.querySelector('td:nth-child(4) .badge-premium').textContent.includes(kelas)) {
                        show = false;
                    }
                    
                    // Filter semester
                    if(semester && row.dataset.semester !== semester) {
                        show = false;
                    }
                    
                    // Filter nilai rata-rata
                    if(min || max) {
                        const rataText = row.querySelector('td:nth-child(10) .fw-700').textContent;
                        const rata = parseFloat(rataText);
                        
                        if(min && rata < parseFloat(min)) show = false;
                        if(max && rata > parseFloat(max)) show = false;
                    }
                    
                    // Filter keyword
                    if(keyword) {
                        const nama = row.querySelector('td:nth-child(2) .fw-700').textContent.toLowerCase();
                        const nis = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                        
                        if(!nama.includes(keyword) && !nis.includes(keyword)) {
                            show = false;
                        }
                    }
                    
                    row.style.display = show ? '' : 'none';
                });
                
                // Close modal
                bootstrap.Modal.getInstance(document.getElementById('filterModal')).hide();
            });
        }
        
        if(resetFilter) {
            resetFilter.addEventListener('click', function() {
                document.getElementById('filterKelas').value = '';
                document.getElementById('filterSemester').value = '';
                document.getElementById('filterMin').value = '';
                document.getElementById('filterMax').value = '';
                document.getElementById('filterKeyword').value = '';
                
                const rows = document.querySelectorAll('#rapotTable tbody tr');
                rows.forEach(row => {
                    row.style.display = '';
                });
                
                bootstrap.Modal.getInstance(document.getElementById('filterModal')).hide();
            });
        }
    });
</script>

<style>
    .badge-danger {
        background: #fee9e7;
        color: #dc2626;
        border: 1px solid #fecaca;
    }
    
    .progress {
        background: var(--border-soft);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .progress-bar {
        background: var(--primary-500);
        transition: width 0.3s ease;
    }
    
    .table-premium td {
        vertical-align: middle;
    }
    
    /* Style untuk dropdown filter */
    #semesterFilter {
        cursor: pointer;
        background-color: white;
        min-width: 150px;
    }
    
    #semesterFilter:hover {
        border-color: var(--primary-400);
    }
    
    /* Animasi untuk alert */
    .alert-custom {
        animation: slideIn 0.3s ease;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush