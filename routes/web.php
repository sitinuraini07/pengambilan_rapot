<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RapotController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GoogleAuthController;


/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD (SEMUA USER LOGIN)
|--------------------------------------------------------------------------
*/


Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth-google');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth-google-callback');
Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', function () {

        $stats = [
            'siswa' => \App\Models\Siswa::count(),
            'guru' => \App\Models\Guru::count(),
            'kelas' => \App\Models\Kelas::count(),
            'nilai' => \App\Models\Nilai::count(),
            'rapot' => \App\Models\Rapot::count(),
        ];

        return view('dashboard', compact('stats'));

    })->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::resource('rapot', RapotController::class);

    Route::get('/rapot/{id}/cetak', [RapotController::class,'cetak'])->name('rapot.cetak');

});


/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:user'])->group(function(){

    Route::get('/user', function(){
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
    Route::resource('nilai', NilaiController::class);

    Route::get('/rapot-saya', [RapotController::class,'rapotSaya'])->name('rapot.saya');

});


require __DIR__.'/auth.php';


Route::get('/guru/export/pdf', [GuruController::class, 'exportPdf'])->name('guru.export.pdf');
Route::get('/guru/export/excel', [GuruController::class, 'exportExcel'])->name('guru.export.excel');

Route::get('/siswa/export/pdf', [SiswaController::class, 'exportPdf'])->name('siswa.export.pdf');
Route::get('/siswa/export/excel', [SiswaController::class, 'exportExcel'])->name('siswa.export.excel');

Route::get('/kelas/export/pdf', [KelasController::class, 'exportPdf'])->name('kelas.export.pdf');
Route::get('/kelas/export/excel', [KelasController::class, 'exportExcel'])->name('kelas.export.excel');

Route::get('/nilai/export/pdf', [NilaiController::class, 'exportPdf'])->name('nilai.export.pdf');
Route::get('/nilai/export/excel', [NilaiController::class, 'exportExcel'])->name('nilai.export.excel');

Route::get('/rapot/export/pdf', [RapotController::class, 'exportPdf'])->name('rapot.export.pdf');
Route::get('/rapot/export/excel', [RapotController::class, 'exportExcel'])->name('rapot.export.excel');