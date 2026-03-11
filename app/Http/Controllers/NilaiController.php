<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::paginate(10);

        $totalNilai = Nilai::count();
        $totalSiswa = Nilai::distinct('nama_siswa')->count('nama_siswa');
        $totalMapel = Nilai::distinct('mata_pelajaran')->count('mata_pelajaran');
        $rataNilai = round(Nilai::avg('nilai'), 1);

        return view('nilai.index', compact(
            'nilais',
            'totalNilai',
            'totalSiswa',
            'totalMapel',
            'rataNilai'
        ));
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        Nilai::create([
            'nama_siswa' => $request->nama_siswa,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->update([
            'nama_siswa' => $request->nama_siswa,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil dihapus');
    }

public function exportPdf()
{
    $nilai = Nilai::all();

    $pdf = Pdf::loadView('nilai.pdf', compact('nilai'));

    return $pdf->download('data_nilai.pdf');
}

public function exportExcel()
{
    return Excel::download(new NilaiExport, 'data_nilai.xlsx');
}
}