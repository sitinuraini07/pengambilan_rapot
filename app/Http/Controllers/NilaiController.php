<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'));
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

        Nilai::create($request->all());

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
        $nilai->update($request->all());

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
}