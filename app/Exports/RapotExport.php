<?php

namespace App\Exports;

use App\Models\Rapot;
use Maatwebsite\Excel\Concerns\FromCollection;

class RapotExport implements FromCollection
{
    public function collection()
    {
        return Rapot::all();
    }
}