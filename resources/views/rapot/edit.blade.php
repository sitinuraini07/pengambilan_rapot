@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Data Rapot</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('rapot.update', $rapot->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('rapot.form')

                <div class="mt-3 text-end">
                    <a href="{{ route('rapot.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
