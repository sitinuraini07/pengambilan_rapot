<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f4f6f9;">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📚 Data Nilai Siswa</h4>
            <a href="{{ route('nilai.create') }}" class="btn btn-light btn-sm">
                + Tambah Nilai
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilais as $n)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $n->nama_siswa }}</td>
                            <td>{{ $n->mata_pelajaran }}</td>
                            <td><strong>{{ $n->nilai }}</strong></td>
                            <td>
                                @if($n->nilai >= 90)
                                    <span class="badge bg-success">Sangat Baik</span>
                                @elseif($n->nilai >= 75)
                                    <span class="badge bg-primary">Baik</span>
                                @elseif($n->nilai >= 60)
                                    <span class="badge bg-warning text-dark">Cukup</span>
                                @else
                                    <span class="badge bg-danger">Kurang</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('nilai.edit', $n->id) }}" 
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>

                                <form action="{{ route('nilai.destroy', $n->id) }}" 
                                      method="POST" 
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Belum ada data nilai</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>