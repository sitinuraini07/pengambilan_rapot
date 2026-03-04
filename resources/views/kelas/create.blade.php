<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border: none;
        }

        label {
            font-weight: 600;
            color: #495057; /* label lebih jelas */
        }

        .card-header {
            background: linear-gradient(135deg, #2d39a7, #1cc88a); /* gradient lebih elegan */
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #1cc88a;
            box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
        }

        .btn-success {
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #20b16a;
            border-color: #20b16a;
        }

        .btn-outline-secondary {
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>

<body>

<div class="container my-5">

    <div class="card shadow-lg rounded-4">

        <!-- HEADER -->
        <div class="card-header text-white rounded-top-4">
            <h4 class="mb-0">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah Data Kelas
            </h4>
        </div>

        <!-- BODY -->
        <div class="card-body p-4">

            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas"
                           class="form-control"
                           placeholder="Contoh: XI RPL 1"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Wali Kelas</label>
                    <input type="text" name="wali_kelas"
                           class="form-control"
                           placeholder="Nama wali kelas"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                              class="form-control"
                              rows="3"
                              placeholder="Keterangan tambahan (opsional)"></textarea>
                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">
                    <button class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>

                    <a href="{{ route('kelas.index') }}"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>