@extends('layouts.app')

@section('content')
<h2>Tambah Guru</h2>

<form action="{{ route('guru.store') }}" method="POST">
    @csrf

    Nama:
    <input type="text" name="nama_guru" class="form-control mb-2">

    NIP:
    <input type="text" name="nip" class="form-control mb-2">

    Mapel:
    <input type="text" name="mapel" class="form-control mb-2">

    Email:
    <input type="email" name="email" class="form-control mb-2">

    No HP:
    <input type="text" name="no_hp" class="form-control mb-2">

    <button class="btn btn-success">Simpan</button>
</form>
@endsection