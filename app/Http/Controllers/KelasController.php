<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // gunakan pagination supaya total(), links(), dll bisa dipakai
        $kelas = Kelas::paginate(10);

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nama_kelas' => 'required',
        'wali_kelas' => 'required'
    ]);

    Kelas::create([
        'nama_kelas' => $request->nama_kelas,
        'wali_kelas' => $request->wali_kelas
    ]);

    return redirect()->route('kelas.index')->with('success','Data kelas berhasil ditambahkan');
}

    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

public function edit($id)
{
    $kelas = Kelas::findOrFail($id);
    return view('kelas.edit', compact('kelas'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'nama_kelas' => 'required',
        'wali_kelas' => 'required'
    ]);

    $kelas = Kelas::findOrFail($id);

    $kelas->update([
        'nama_kelas' => $request->nama_kelas,
        'wali_kelas' => $request->wali_kelas,
    ]);

    return redirect()->route('kelas.index')
        ->with('success','Data kelas berhasil diupdate');
}

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success','Data kelas berhasil dihapus');
    }

public function exportPdf()
{
    $kelas = Kelas::all();

    $pdf = Pdf::loadView('kelas.pdf', compact('kelas'));

    return $pdf->download('data_kelas.pdf');
}

public function exportExcel()
{
    return Excel::download(new KelasExport, 'data_kelas.xlsx');
}
}