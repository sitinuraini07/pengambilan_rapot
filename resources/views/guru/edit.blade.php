@extends('layouts.app')

@section('content')
<h2>Edit Guru</h2>

<form action="{{ route('guru.update', $guru->id) }}" method="POST">
    @csrf
    @method('PUT')

    Nama:
    <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}" class="form-control mb-2">

    NIP:
    <input type="text" name="nip" value="{{ $guru->nip }}" class="form-control mb-2">

    Mapel:
    <input type="text" name="mapel" value="{{ $guru->mapel }}" class="form-control mb-2">

    Email:
    <input type="email" name="email" value="{{ $guru->email }}" class="form-control mb-2">

    No HP:
    <input type="text" name="no_hp" value="{{ $guru->no_hp }}" class="form-control mb-2">

    <button class="btn btn-success">Update</button>
</form>
@endsection