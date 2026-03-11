<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $siswas = Siswa::paginate(10);
    return view('siswa.index', compact('siswas'));
}

public function create()
{
    return view('siswa.create');
}

public function store(Request $request)
{
    $request->validate([
        'nis'=>'required',
        'nama'=>'required',
        'jenis_kelamin'=>'required',
        'alamat'=>'required'
    ]);
    
Siswa::create([
    'nis'=>$request->nis,
    'nama'=>$request->nama,
    'jenis_kelamin'=>$request->jenis_kelamin,
    'alamat'=>$request->alamat,
    'kelas'=>$request->kelas,
    'status'=>$request->status
]);

    return redirect()->route('siswa.index')
    ->with('success','Data siswa berhasil ditambahkan');
}

public function show(Siswa $siswa)
{
    return view('siswa.show',compact('siswa'));
}

public function edit(Siswa $siswa)
{
    return view('siswa.edit',compact('siswa'));
}

public function update(Request $request, Siswa $siswa)
{
    $request->validate([
        'nis'=>'required',
        'nama'=>'required',
        'jenis_kelamin'=>'required',
        'alamat'=>'required'
    ]);

    $siswa->update($request->all());

    return redirect()->route('siswa.index')
    ->with('success','Data siswa berhasil diupdate');
}

public function destroy(Siswa $siswa)
{
    $siswa->delete();

    return redirect()->route('siswa.index')
    ->with('success','Data siswa berhasil dihapus');
}

public function exportPdf()
{
    $siswa = Siswa::all();

    $pdf = Pdf::loadView('siswa.pdf',compact('siswa'));

    return $pdf->download('data_siswa.pdf');
}

public function exportExcel()
{
    return Excel::download(new SiswaExport,'data_siswa.xlsx');
}

}