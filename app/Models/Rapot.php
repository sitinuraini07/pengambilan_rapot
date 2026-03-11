<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapot extends Model
{
    use HasFactory;

protected $fillable = [
    'user_id',
    'email',
    'nama_siswa',
    'nis',
    'kelas',
    'semester',
    'matematika',
    'b_indonesia',
    'b_inggris',
    'produktif'
];

}