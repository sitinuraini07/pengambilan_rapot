<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kelas</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #4b6894;
        }
        .card {
            border: none;
        }
        .card-header {
            box-shadow: inset 0 -1px 0 rgba(255,255,255,.2);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .search-box {
            max-width: 260px;
        }
    </style>
</head>

<body>

<div class="container my-5">

    <div class="card shadow-lg rounded-4">

        <!-- HEADER -->
        <div class="card-header text-white rounded-top-4"
             style="background: linear-gradient(135deg, #4e73df, #151b2c);">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h4 class="mb-0">
                        <i class="bi bi-journal-bookmark-fill me-2"></i>
                        Data Kelas
                    </h4>
                    <small class="opacity-75">
                        Total kelas: <strong>{{ $kelas->count() }}</strong>
                    </small>
                </div>

                <a href="{{ route('kelas.create') }}" class="btn btn-light btn-sm fw-semibold">
                    <i class="bi bi-plus-circle"></i> Tambah Kelas
                </a>
            </div>
        </div>

        <!-- BODY -->
        <div class="card-body">

            <!-- SEARCH -->
            <div class="d-flex justify-content-end mb-3">
                <input type="text"
                       id="searchInput"
                       class="form-control form-control-sm search-box"
                       placeholder="🔍 Cari kelas...">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center" id="kelasTable">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Deskripsi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($kelas as $item)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="fw-semibold">{{ $item->nama_kelas }}</td>
                                <td>{{ $item->wali_kelas }}</td>
                                <td class="text-muted">
                                    {{ $item->deskripsi ?? '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('kelas.edit', $item->id) }}"
                                       class="btn btn-outline-warning btn-sm me-1"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('kelas.destroy', $item->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm"
                                                title="Hapus"
                                                onclick="return confirm('Yakin hapus data kelas ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    <div class="fw-semibold">Belum ada data kelas</div>
                                    <small>Silakan tambah data kelas terlebih dahulu</small>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SIMPLE SEARCH -->
<script>
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#kelasTable tbody tr');

    searchInput.addEventListener('keyup', function () {
        const keyword = this.value.toLowerCase();

        tableRows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(keyword)
                ? ''
                : 'none';
        });
    });
</script>

</body>
</html>