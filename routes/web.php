<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RapotController;
use App\Http\Controllers\NilaiController;

use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('kelas.index');
});


Route::resource('rapot', RapotController::class);
Route::resource('nilai', NilaiController::class);
/*
|--------------------------------------------------------------------------
| ROUTE KELAS (CRUD LENGKAP)
|--------------------------------------------------------------------------
*/
Route::resource('kelas', KelasController::class);
//guru
Route::resource('guru', GuruController::class);

Route::resource('siswa', SiswaController::class);
