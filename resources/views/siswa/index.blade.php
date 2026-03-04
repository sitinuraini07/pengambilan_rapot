@extends('layouts.app')

@section('content')

<h2 class="mb-3">Data Siswa</h2>

<a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">
    Tambah Siswa
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->jenis_kelamin }}</td>
            <td>{{ $s->alamat }}</td>
            <td>
                <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('siswa.destroy', $s->id) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection