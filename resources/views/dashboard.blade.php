@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold text-blue-700 mb-6">
Dashboard Statistik
</h2>

<div class="grid grid-cols-5 gap-6">

    <div class="bg-white shadow rounded p-6">
        <p class="text-gray-500">Total Siswa</p>
        <h3 class="text-3xl font-bold text-blue-600">
            {{ $stats['siswa'] }}
        </h3>
    </div>

    <div class="bg-white shadow rounded p-6">
        <p class="text-gray-500">Total Guru</p>
        <h3 class="text-3xl font-bold text-blue-600">
            {{ $stats['guru'] }}
        </h3>
    </div>

    <div class="bg-white shadow rounded p-6">
        <p class="text-gray-500">Total Kelas</p>
        <h3 class="text-3xl font-bold text-blue-600">
            {{ $stats['kelas'] }}
        </h3>
    </div>

    <div class="bg-white shadow rounded p-6">
        <p class="text-gray-500">Total Nilai</p>
        <h3 class="text-3xl font-bold text-blue-600">
            {{ $stats['nilai'] }}
        </h3>
    </div>

    <div class="bg-white shadow rounded p-6">
        <p class="text-gray-500">Total Rapot</p>
        <h3 class="text-3xl font-bold text-blue-600">
            {{ $stats['rapot'] }}
        </h3>
    </div>

</div>

@endsection