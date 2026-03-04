@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Tambah Data Rapot</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('rapot.store') }}" method="POST">
                @csrf

                {{-- ✅ INI YANG TADI HILANG --}}
                @include('rapot.form')

                <div class="mt-3 text-end">
                    <a href="{{ route('rapot.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
