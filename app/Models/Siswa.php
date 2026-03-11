<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'alamat',
        'kelas',
        'status'
    ];

        public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}