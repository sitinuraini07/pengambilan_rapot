<?php

namespace App\Exports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kelas::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Kelas',
            'Jurusan',
            'Wali Kelas'
        ];
    }
}