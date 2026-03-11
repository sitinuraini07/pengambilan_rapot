@extends('layouts.app')

@section('title', 'Faculty Modification')

@section('content')
<div class="row justify-content-center animate-entrance">
    <div class="col-md-10 col-lg-9">
        <div class="premium-card border-0 overflow-hidden shadow-premium">
            <div class="card-header border-0 p-5 p-lg-6 text-white" style="background: linear-gradient(135deg, #064e3b 0%, #0f172a 100%);">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-20 rounded-4 p-3 me-4 shadow-glow" style="box-shadow: 0 0 15px rgba(255, 193, 7, 0.1);">
                        <i class="bi bi-pencil-square fs-2 text-warning"></i>
                    </div>
                    <div>
                        <h3 class="heading-premium mb-1" style="font-size: 2rem; letter-spacing: -0.02em;">Modify Faculty Profile</h3>
                        <p class="tiny-text fw-800 opacity-50 mb-0">UPDATE RECORD FOR: {{ strtoupper($guru->nama_guru) }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-5 p-lg-6 bg-white">
                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-5">
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-muted tiny-text mb-2">Teacher Full Legal Name</label>
                            <input type="text" name="nama_guru" class="form-control premium-input py-3 px-4 shadow-sm" value="{{ $guru->nama_guru }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-muted tiny-text mb-2">Employee ID (NIP)</label>
                            <input type="text" name="nip" class="form-control premium-input py-3 px-4 shadow-sm" value="{{ $guru->nip }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-muted tiny-text mb-2">Subject Specialization</label>
                            <input type="text" name="mapel" class="form-control premium-input py-3 px-4 shadow-sm" value="{{ $guru->mapel }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-muted tiny-text mb-2">Institutional Email</label>
                            <input type="email" name="email" class="form-control premium-input py-3 px-4 shadow-sm" value="{{ $guru->email }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-800 text-muted tiny-text mb-2">Contact Number</label>
                            <input type="text" name="no_hp" class="form-control premium-input py-3 px-4 shadow-sm" value="{{ $guru->no_hp }}">
                        </div>
                    </div>

                    <div class="mt-6 pt-5 d-flex gap-3 border-top border-light">
                        <button type="submit" class="btn btn-warning rounded-pill px-5 py-3 fw-800 flex-grow-1 text-white shadow-glow" style="background: #f59e0b; border: none;">
                            UPDATE APPOINTMENT
                        </button>
                        <a href="{{ route('guru.index') }}" class="btn btn-light rounded-pill px-5 py-3 fw-800 text-muted border border-light">
                            DISCARD CHANGES
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .premium-input {
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.05);
        background: #f8fafc;
        transition: all 0.3s ease;
    }
    .premium-input:focus {
        background: #fff;
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
    }
    .mt-6 { margin-top: 3.5rem; }
</style>
@endsection
