<?php

use App\Http\Controllers\AlatPoadcastController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalPerkuliahanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaMataKuliahController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PemesananRuanganController;
use App\Http\Controllers\PendaftaranKonselingController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RuanganKelasController;
use App\Http\Controllers\RuanganPoadcastController;
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
    return view('welcome');
});

Route::controller(DashboardController::class)->middleware('auth','verified')->prefix('/dashboard')->group(function(){
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(RuanganPoadcastController::class)->middleware('auth','verified')->prefix('/ruangan_poadcast')->group(function(){
    Route::get('/', 'index')->name('ruanganPoadcast');
    Route::get('/create', 'create')->name('ruanganPoadcast.create');
    Route::post('/', 'store')->name('ruanganPoadcast.store');
    Route::get('/{ruanganPoadcast}/edit', 'edit')->name('ruanganPoadcast.edit');
    Route::patch('/{ruanganPoadcast}/update', 'update')->name('ruanganPoadcast.update');
    Route::delete('/{ruanganPoadcast}/delete', 'delete')->name('ruanganPoadcast.delete');
});

Route::controller(AlatPoadcastController::class)->middleware('auth','verified')->prefix('/alat_poadcast')->group(function(){
    Route::get('/', 'index')->name('alatPoadcast');
    Route::get('/create', 'create')->name('alatPoadcast.create');
    Route::post('/', 'store')->name('alatPoadcast.store');
    Route::get('/{alatPoadcast}/edit', 'edit')->name('alatPoadcast.edit');
    Route::patch('/{alatPoadcast}/update', 'update')->name('alatPoadcast.update');
    Route::delete('/{alatPoadcast}/delete', 'delete')->name('alatPoadcast.delete');
});

Route::controller(ProgramStudiController::class)->middleware('auth','verified')->prefix('/program_studi')->group(function(){
    Route::get('/', 'index')->name('programStudi');
    Route::post('/', 'store')->name('programStudi.store');
    Route::get('/{programStudi:kode}/edit', 'edit')->name('programStudi.edit');
    Route::patch('/update', 'update')->name('programStudi.update');
    Route::delete('/{programStudi:kode}/delete', 'delete')->name('programStudi.delete');
});

Route::controller(MahasiswaController::class)->middleware('auth','verified')->prefix('/mahasiswa')->group(function(){
    Route::get('/', 'index')->name('mahasiswa');
    Route::post('/', 'store')->name('mahasiswa.store');
    Route::get('/{mahasiswa:npm}/edit', 'edit')->name('mahasiswa.edit');
    Route::patch('/update', 'update')->name('mahasiswa.update');
    Route::delete('/{mahasiswa:npm}/delete', 'delete')->name('mahasiswa.delete');
});

Route::controller(MataKuliahController::class)->middleware('auth','verified')->prefix('/mata_kuliah')->group(function(){
    Route::get('/', 'index')->name('mataKuliah');
    Route::post('/', 'store')->name('mataKuliah.store');
    Route::get('/{mataKuliah}/edit', 'edit')->name('mataKuliah.edit');
    Route::patch('/update', 'update')->name('mataKuliah.update');
    Route::delete('/{mataKuliah}/delete', 'delete')->name('mataKuliah.delete');
});

Route::controller(DosenController::class)->middleware('auth','verified')->prefix('/dosen')->group(function(){
    Route::get('/', 'index')->name('dosen');
    Route::post('/', 'store')->name('dosen.store');
    Route::get('/{dosen:nip}/edit', 'edit')->name('dosen.edit');
    Route::patch('/update', 'update')->name('dosen.update');
    Route::delete('/{dosen:nip}/delete', 'delete')->name('dosen.delete');
});

Route::controller(PengampuController::class)->middleware('auth','verified')->prefix('/pengampu')->group(function(){
    Route::get('/', 'index')->name('pengampu');
    Route::post('/', 'store')->name('pengampu.store');
    Route::get('/{pengampu}/edit', 'edit')->name('pengampu.edit');
    Route::patch('/update', 'update')->name('pengampu.update');
    Route::delete('/{pengampu}/delete', 'delete')->name('pengampu.delete');
});

Route::controller(RuanganKelasController::class)->middleware('auth','verified')->prefix('/ruangan_kelas')->group(function(){
    Route::get('/', 'index')->name('ruanganKelas');
    Route::post('/', 'store')->name('ruanganKelas.store');
    Route::get('/{ruanganKelas}/edit', 'edit')->name('ruanganKelas.edit');
    Route::patch('/update', 'update')->name('ruanganKelas.update');
    Route::delete('/{ruanganKelas}/delete', 'delete')->name('ruanganKelas.delete');
});

Route::controller(JadwalPerkuliahanController::class)->middleware('auth','verified')->prefix('/jadwal_perkuliahan')->group(function(){
    Route::get('/', 'index')->name('jadwalPerkuliahan');
    Route::post('/', 'store')->name('jadwalPerkuliahan.store');
    Route::get('/{jadwalPerkuliahan:id}/edit', 'edit')->name('jadwalPerkuliahan.edit');
    Route::patch('/update', 'update')->name('jadwalPerkuliahan.update');
    Route::delete('/{jadwalPerkuliahan:id}/delete', 'delete')->name('jadwalPerkuliahan.delete');
});

Route::controller(MahasiswaMataKuliahController::class)->middleware('auth','verified')->prefix('/mahasiswa_mata_kuliah')->group(function(){
    Route::get('/', 'index')->name('mahasiswaMataKuliah');
    Route::post('/', 'store')->name('mahasiswaMataKuliah.store');
    Route::get('/{mahasiswaMataKuliah:id}/edit', 'edit')->name('mahasiswaMataKuliah.edit');
    Route::patch('/update', 'update')->name('mahasiswaMataKuliah.update');
    Route::delete('/{mahasiswaMataKuliah:id}/delete', 'delete')->name('mahasiswaMataKuliah.delete');
});

Route::controller(BasisPengetahuanController::class)->middleware('auth','verified')->prefix('/basis_pengetahuan')->group(function(){
    Route::get('/', 'index')->name('basisPengetahuan');
    Route::post('/', 'store')->name('basisPengetahuan.store');
    Route::get('/{basisPengetahuan:id}/edit', 'edit')->name('basisPengetahuan.edit');
    Route::patch('/update', 'update')->name('basisPengetahuan.update');
    Route::delete('/{basisPengetahuan:id}/delete', 'delete')->name('basisPengetahuan.delete');
});

Route::controller(OperatorController::class)->middleware('auth','verified')->prefix('/operator')->group(function(){
    Route::get('/', 'index')->name('operator');
});

Route::controller(PermissionController::class)->middleware('auth','verified')->prefix('/permission')->group(function(){
    Route::get('/', 'index')->name('permission');
    Route::post('/', 'store')->name('permission.store');
    Route::get('/{permission}/edit', 'edit')->name('permission.edit');
    Route::patch('/update', 'update')->name('permission.update');
    Route::delete('/{permission}/delete', 'delete')->name('permission.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
