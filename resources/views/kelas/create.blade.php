                        @extends('layouts.app')

@section('title', 'Class Initialization')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="premium-card border-0">
            <div class="card-header bg-white border-0 pt-5 px-5">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3 me-4">
                        <i class="bi bi-door-open-fill fs-2"></i>
                    </div>
                    <div>
                        <h3 class="heading-premium text-dark mb-1">Initialize New Class</h3>
                        <p class="text-muted fw-600 tiny-text mb-0">ACADEMIC STRUCTURING UNIT</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-secondary tiny-text mb-2">Class Nomenclature</label>
                            <input type="text" name="nama_kelas" class="form-control rounded-3 border-light py-3 px-4 shadow-sm" placeholder="e.g., XII RPL 1" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-secondary tiny-text mb-2">Wali Kelas (Full Name)</label>
                            <input type="text" name="wali_kelas" class="form-control rounded-3 border-light py-3 px-4 shadow-sm" placeholder="e.g., Prof. Xavier" required>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 d-flex gap-3">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-800 shadow-lg flex-grow-1 animate-hover">
                            Confirm Initialization
                        </button>
                        <a href="{{ route('kelas.index') }}" class="btn btn-light rounded-pill px-5 py-3 fw-800 text-secondary">
                            Cancel
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