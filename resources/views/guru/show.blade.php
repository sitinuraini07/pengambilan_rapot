@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-body p-5">
                <div class="text-center mb-5">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">{{ $guru->nama_guru }}</h3>
                    <p class="text-muted text-uppercase small letter-spacing-1 fw-bold">Guru {{ $guru->mapel }}</p>
                </div>

                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-4 h-100">
                            <label class="text-secondary small fw-bold text-uppercase mb-1 d-block">NIP</label>
                            <span class="text-dark fw-bold fs-5">{{ $guru->nip ?? 'Tidak ada NIP' }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-4 h-100">
                            <label class="text-secondary small fw-bold text-uppercase mb-1 d-block">Mata Pelajaran</label>
                            <span class="text-dark fw-bold fs-5">{{ $guru->mapel }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-4 h-100">
                            <label class="text-secondary small fw-bold text-uppercase mb-1 d-block">Email</label>
                            <span class="text-dark fw-bold fs-6">{{ $guru->email ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-4 h-100">
                            <label class="text-secondary small fw-bold text-uppercase mb-1 d-block">No. HP</label>
                            <span class="text-dark fw-bold fs-5 text-success">{{ $guru->no_hp ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-5 d-flex gap-2">
                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning rounded-pill px-4 py-2 fw-bold text-white shadow-sm flex-grow-1">
                        <i class="bi bi-pencil-square me-2"></i> Edit Data
                    </a>
                    <a href="{{ route('guru.index') }}" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-secondary">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .letter-spacing-1 { letter-spacing: 1px; }
</style>
@endsection