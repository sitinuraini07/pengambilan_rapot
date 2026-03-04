<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f4f6f9;">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">+ Tambah Data Nilai</h4>
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

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Contoh: Budi" required>
                </div>
                
<div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" class="form-control" placeholder="Contoh: Matematika" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="number" name="nilai" class="form-control" min="0" max="100" placeholder="0 - 100" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        💾 Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>