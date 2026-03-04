<!DOCTYPE html>
<html>
<head>
    <title>Rapot Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:white;
        }

        .rapot-box{
            border:2px solid black;
            padding:30px;
        }

        /* tombol tidak ikut ke print */
        @media print {
            .no-print {
                display:none !important;
            }
        }
    </style>
</head>

<body>

<div class="container mt-4">

    {{-- ================= BUTTON AREA ================= --}}
    <div class="mb-3 no-print d-flex gap-2">

        <a href="{{ route('rapot.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>

        <button onclick="window.print()" class="btn btn-success">
            Print Rapot
        </button>

    </div>


    {{-- ================= RAPOT BOX ================= --}}
    <div class="rapot-box">

        <h3 class="text-center mb-4 fw-bold">RAPOT SISWA</h3>


        {{-- ================= DATA SISWA ================= --}}
        <table class="table table-borderless">
            <tr>
                <td width="200">Nama</td>
                <td>: {{ $rapot->nama_siswa }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>: {{ $rapot->nis }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: {{ $rapot->kelas }}</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>: {{ $rapot->semester }}</td>
            </tr>
        </table>

        <hr>


        {{-- ================= NILAI ================= --}}
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>Mata Pelajaran</th>
                    <th width="150">Nilai</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Matematika</td>
                    <td>{{ $rapot->matematika }}</td>
                </tr>

                <tr>
                    <td>Bahasa Indonesia</td>
                    <td>{{ $rapot->b_indonesia }}</td>
                </tr>

                <tr>
                    <td>Bahasa Inggris</td>
                    <td>{{ $rapot->b_inggris }}</td>
                </tr>

                <tr>
                    <td>Produktif</td>
                    <td>{{ $rapot->produktif }}</td>
                </tr>

                <tr class="fw-bold table-secondary">
                    <td>Rata-rata</td>
                    <td>{{ number_format($rata,2) }}</td>
                </tr>
            </tbody>
        </table>


        {{-- ================= TTD ================= --}}
        <br><br>

        <div class="text-end">
            <p>Wali Kelas</p>
            <br><br><br>
            <p>( ___________𝓜𝓪𝓱𝓶𝓾𝓭𝓲𝓷________ )</p>
        </div>
    
    </div>

</div>

</body>
</html>
