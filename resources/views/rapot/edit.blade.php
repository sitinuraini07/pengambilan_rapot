@extends('layouts.app')

@section('title', 'Record Rectification')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="premium-card border-0">
            <div class="card-header bg-white border-0 pt-5 px-5">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-4 p-3 me-4">
                        <i class="bi bi-pencil-square fs-2"></i>
                    </div>
                    <div>
                        <h3 class="heading-premium text-dark mb-1">Rectify Report Data</h3>
                        <p class="text-muted fw-600 tiny-text mb-0">UPDATE ASSEMBLED DATA FOR: {{ strtoupper($rapot->nama_siswa) }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('rapot.update', $rapot->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @include('rapot.form')

                    <div class="mt-5 pt-4 d-flex gap-3">
                        <button type="submit" class="btn btn-warning rounded-pill px-5 py-3 fw-800 shadow-lg flex-grow-1 text-white animate-hover">
                            Authorize Rectification
                        </button>
                        <a href="{{ route('rapot.index') }}" class="btn btn-light rounded-pill px-5 py-3 fw-800 text-secondary">
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
</style>
@endsection
