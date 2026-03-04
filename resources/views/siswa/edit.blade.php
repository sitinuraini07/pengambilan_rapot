@extends('layouts.app')

@section('content')
<h2>Edit Siswa</h2>

<form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nis" value="{{ $siswa->nis }}"><br><br>
    <input type="text" name="nama" value="{{ $siswa->nama }}"><br><br>

    <select name="jenis_kelamin">
        <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select><br><br>

    <textarea name="alamat">{{ $siswa->alamat }}</textarea><br><br>

    <button type="submit">Update</button>
</form>
@endsection