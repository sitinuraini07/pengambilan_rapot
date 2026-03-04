@extends('layouts.app')

@section('content')
<h2>Detail Guru</h2>

<p><b>Nama:</b> {{ $guru->nama_guru }}</p>
<p><b>NIP:</b> {{ $guru->nip }}</p>
<p><b>Mapel:</b> {{ $guru->mapel }}</p>
<p><b>Email:</b> {{ $guru->email }}</p>
<p><b>No HP:</b> {{ $guru->no_hp }}</p>

<a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
@endsection