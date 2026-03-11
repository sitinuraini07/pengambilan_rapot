<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::select(
            'nama',
            'nis',
            'jenis_kelamin',
            'alamat'
        )->get()->map(function($siswa){
            $siswa->nis = "'".$siswa->nis;
            return $siswa;
        });
    }

    public function headings():array
    {
        return [
            'Nama Siswa',
            'NIS',
            'Jenis Kelamin',
            'Alamat'
        ];
    }
}