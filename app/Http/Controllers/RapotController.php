<?php

namespace App\Http\Controllers;

use App\Models\Rapot;
use App\Models\Siswa;
use App\Exports\RapotExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\RapotNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapotController extends Controller
{

    // ================= INDEX =================
    public function index()
    {
        $rapots = Rapot::latest()->paginate(10);

        return view('rapot.index', compact('rapots'));
    }

    // ================= CREATE =================
    public function create()
    {
        $siswas = Siswa::all();

        return view('rapot.create', compact('siswas'));
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'matematika' => 'required|numeric',
            'b_indonesia' => 'required|numeric',
            'b_inggris' => 'required|numeric',
            'produktif' => 'required|numeric',
        ]);

        $rapot = Rapot::create([
            'user_id' => Auth::id(),
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
            'matematika' => $request->matematika,
            'b_indonesia' => $request->b_indonesia,
            'b_inggris' => $request->b_inggris,
            'produktif' => $request->produktif,
        ]);



        return redirect()
            ->route('rapot.index')
            ->with('success','Data rapot berhasil ditambahkan');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $rapot = Rapot::findOrFail($id);

        $rata = (
            $rapot->matematika +
            $rapot->b_indonesia +
            $rapot->b_inggris +
            $rapot->produktif
        ) / 4;

        return view('rapot.show', compact('rapot','rata'));
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $rapot = Rapot::findOrFail($id);

        return view('rapot.edit', compact('rapot'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $rapot = Rapot::findOrFail($id);

        $rapot->update($request->all());

        return redirect()
            ->route('rapot.index')
            ->with('success','Data berhasil diupdate');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        Rapot::destroy($id);

        return redirect()
            ->route('rapot.index')
            ->with('success','Data berhasil dihapus');
    }

    // ================= CETAK RAPOT =================
    public function cetak($id)
    {
        $rapot = Rapot::findOrFail($id);

        $rata = (
            $rapot->matematika +
            $rapot->b_indonesia +
            $rapot->b_inggris +
            $rapot->produktif
        ) / 4;

        return view('rapot.cetak', compact('rapot','rata'));
    }

    // ================= EXPORT PDF =================
    public function exportPdf()
    {
        $rapots = Rapot::all();

        $pdf = Pdf::loadView('rapot.pdf', compact('rapots'));

        return $pdf->download('data_rapot.pdf');
    }

    // ================= EXPORT EXCEL =================
    public function exportExcel()
    {
        return Excel::download(new RapotExport, 'data_rapots.xlsx');
    }

}