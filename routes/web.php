<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('kelas.index');
});

/*
|--------------------------------------------------------------------------
| ROUTE KELAS (CRUD LENGKAP)
|--------------------------------------------------------------------------
*/
Route::resource('kelas', KelasController::class);