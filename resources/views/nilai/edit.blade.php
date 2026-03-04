<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f4f6f9;">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">✏️ Edit Data Nilai</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="{{ $nilai->nama_siswa}}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" 
                           name="mata_pelajaran" 
                           class="form-control"
                           value="{{ $nilai->mata_pelajaran }}" 
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="number" 
                           name="nilai" 
                           class="form-control"
                           value="{{ $nilai->nilai }}" 
                           min="0" 
                           max="100"
                           required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>

                    <button type="submit" class="btn btn-warning">
                        🔄 Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>