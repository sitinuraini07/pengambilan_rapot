@extends('layouts.app')

@section('content')
<h2>Tambah Siswa</h2>

<form action="{{ route('siswa.store') }}" method="POST">
    @csrf

    <input type="text" name="nis" placeholder="NIS"><br><br>
    <input type="text" name="nama" placeholder="Nama"><br><br>

    <select name="jenis_kelamin">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br><br>

    <textarea name="alamat" placeholder="Alamat"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection