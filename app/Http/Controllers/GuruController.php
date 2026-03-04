<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $gurus = Guru::orderBy('id', 'desc')->paginate(5);
    return view('guru.index', compact('gurus'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required|unique:gurus',
            'mapel'     => 'required',
            'email'     => 'required|email|unique:gurus',
            'no_hp'     => 'nullable'
        ]);

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip,' . $guru->id,
            'mapel'     => 'required',
            'email'     => 'required|email|unique:gurus,email,' . $guru->id,
            'no_hp'     => 'nullable'
        ]);

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}