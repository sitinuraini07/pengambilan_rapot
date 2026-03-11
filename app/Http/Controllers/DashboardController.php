<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Rapot;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalSiswa = Siswa::count();
        $totalGuru  = Guru::count();
        $totalKelas = Kelas::count();
        $totalNilai = Nilai::count();
        $totalRapot = Rapot::count();

        // Data terbaru
        $siswaTerbaru = Siswa::latest()->take(5)->get();
        $guruTerbaru  = Guru::latest()->take(5)->get();

        // Statistik tambahan
        $lakiLaki = Siswa::where('jenis_kelamin','L')->count();
        $perempuan = Siswa::where('jenis_kelamin','P')->count();

        return view('dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalNilai',
            'totalRapot',
            'siswaTerbaru',
            'guruTerbaru',
            'lakiLaki',
            'perempuan'
        ));
    }
}