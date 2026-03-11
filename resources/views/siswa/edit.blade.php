@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow">

            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Edit Data Siswa</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('siswa.update',$siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control"
                        value="{{ $siswa->nis }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" name="nama" class="form-control"
                        value="{{ $siswa->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                            name="jenis_kelamin"
                            value="L"
                            {{ $siswa->jenis_kelamin == 'L' ? 'checked' : '' }}>

                            <label class="form-check-label">
                                Laki-laki
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                            name="jenis_kelamin"
                            value="P"
                            {{ $siswa->jenis_kelamin == 'P' ? 'checked' : '' }}>

                            <label class="form-check-label">
                                Perempuan
                            </label>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat"
                        class="form-control"
                        rows="3">{{ $siswa->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text"
                        name="kelas"
                        class="form-control"
                        value="{{ $siswa->kelas }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-control">

                            <option value="aktif"
                            {{ $siswa->status == 'aktif' ? 'selected' : '' }}>
                            Aktif
                            </option>

                            <option value="lulus"
                            {{ $siswa->status == 'lulus' ? 'selected' : '' }}>
                            Lulus
                            </option>

                            <option value="keluar"
                            {{ $siswa->status == 'keluar' ? 'selected' : '' }}>
                            Keluar
                            </option>

                        </select>

                    </div>

                    <button class="btn btn-warning">
                        Update
                    </button>

                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                        Batal
                    </a>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection