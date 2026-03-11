<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('id','desc')->paginate(5);
        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required|unique:gurus',
            'mapel' => 'required',
            'email' => 'required|email|unique:gurus',
            'no_hp' => 'nullable'
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')
        ->with('success','Data guru berhasil ditambahkan');
    }

    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required|unique:gurus,nip,'.$guru->id,
            'mapel' => 'required',
            'email' => 'required|email|unique:gurus,email,'.$guru->id,
            'no_hp' => 'nullable'
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')
        ->with('success','Data guru berhasil diupdate');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')
        ->with('success','Data guru berhasil dihapus');
    }

public function exportPdf()
{
    $gurus = Guru::all();

    $pdf = Pdf::loadView('guru.pdf', compact('gurus'));

    return $pdf->download('data_guru.pdf');
}

public function exportExcel()
{
    return Excel::download(new GuruExport, 'data_guru.xlsx');
}
}