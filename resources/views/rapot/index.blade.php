@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ================= HEADER ================= --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Rapot Siswa</h3>

        <a href="{{ route('rapot.create') }}" class="btn btn-success">
            + Tambah Rapot
        </a>
    </div>


    {{-- ================= ALERT ================= --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- ================= TABLE ================= --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Rata-rata</th>
                        <th width="230">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $r)

                        @php
                            $rata = (
                                $r->matematika +
                                $r->b_indonesia +
                                $r->b_inggris +
                                $r->produktif
                            ) / 4;
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $r->nama_siswa }}</td>
                            <td>{{ $r->nis }}</td>
                            <td>{{ $r->kelas }}</td>
                            <td>{{ $r->semester }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ number_format($rata,1) }}
                                </span>
                            </td>

                            {{-- ================= BUTTON ================= --}}
                            <td>
                                <a href="{{ route('rapot.show',$r->id) }}"
                                   class="btn btn-primary btn-sm">
                                    Lihat
                                </a>

                                <a href="{{ route('rapot.edit',$r->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('rapot.destroy',$r->id) }}"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7">Belum ada data rapot</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
