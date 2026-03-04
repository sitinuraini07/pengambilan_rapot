<?php

namespace App\Http\Controllers;
use App\Models\Rapot;
use Illuminate\Http\Request;

class RapotController extends Controller
{
    
    
    // ================= INDEX =================
    public function index()
    {
        $data = Rapot::latest()->get();
        return view('rapot.index', compact('data'));
    }

    // ================= CREATE =================
    public function create()
    {
        return view('rapot.create');
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
        ]);

        Rapot::create($request->all());

        return redirect()->route('rapot.index')
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

        return redirect()->route('rapot.index')
            ->with('success','Data berhasil diupdate');
    }

    // ================= DELETE (opsional) =================
    public function destroy($id)
    {
        Rapot::destroy($id);

        return back()->with('success','Data dihapus');
    }
}

