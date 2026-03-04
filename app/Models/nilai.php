<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'nama_siswa',
        'mata_pelajaran',
        'nilai'
    ];
}