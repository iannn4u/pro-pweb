<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data['title'] = 'Beranda';
    return view('index', $data);
});

Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
Route::resource('mapel', MapelController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('nilai', NilaiController::class);