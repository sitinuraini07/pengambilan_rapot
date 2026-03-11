@extends('layouts.app')

@section('title', 'Evaluation Revision')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="premium-card border-0">
            <div class="card-header bg-white border-0 pt-5 px-5">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-4 p-3 me-4">
                        <i class="bi bi-pencil-square fs-2"></i>
                    </div>
                    <div>
                        <h3 class="heading-premium text-dark mb-1">Revise Evaluation Score</h3>
                        <p class="text-muted fw-600 tiny-text mb-0">UPDATE RECORD FOR: {{ strtoupper($nilai->nama_siswa) }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-5">
                @if ($errors->any())
                    <div class="alert alert-danger border-0 rounded-4 mb-4 glass-panel">
                        <ul class="mb-0 fw-600 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-secondary tiny-text mb-2">Student Identity</label>
                            <input type="text" name="nama_siswa" class="form-control rounded-3 border-light py-3 px-4 shadow-sm" value="{{ $nilai->nama_siswa }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-secondary tiny-text mb-2">Subject Matter</label>
                            <input type="text" name="mata_pelajaran" class="form-control rounded-3 border-light py-3 px-4 shadow-sm" value="{{ $nilai->mata_pelajaran }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-800 text-secondary tiny-text mb-2">Performance Score (0 - 100)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-light rounded-start-3 px-3"><i class="bi bi-calculator text-muted"></i></span>
                                <input type="number" name="nilai" class="form-control rounded-end-3 border-light py-3 px-4 shadow-sm" value="{{ $nilai->nilai }}" min="0" max="100" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 d-flex gap-3">
                        <button type="submit" class="btn btn-warning rounded-pill px-5 py-3 fw-800 shadow-lg flex-grow-1 text-white animate-hover">
                            Authorize Revision
                        </button>
                        <a href="{{ route('nilai.index') }}" class="btn btn-light rounded-pill px-5 py-3 fw-800 text-secondary">
                            Discard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .tiny-text { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; }
    .fw-800 { font-weight: 800; }
    .fw-600 { font-weight: 600; }
    .form-control:focus {
        border-color: var(--primary-core) !important;
        box-shadow: 0 0 0 4px var(--primary-glow) !important;
    }
</style>
@endsection