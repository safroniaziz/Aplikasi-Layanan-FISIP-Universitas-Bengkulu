<?php

use App\Livewire\JadwalPerkuliahan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\CariDataController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AlatPoadcastController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RuanganKelasController;
use App\Http\Controllers\RuanganPoadcastController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\PemesananRuanganController;
use App\Http\Controllers\JadwalPerkuliahanController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\MahasiswaMataKuliahController;
use App\Http\Controllers\ManajemenBukuTamuController;
use App\Http\Controllers\PendaftaranKonselingController;
use App\Livewire\JadwalPerkuliahanLivewire;

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
    return view('frontend.home');
})->name('user');

Route::controller(CariDataController::class)->group(function(){
    Route::get('/cari_mata_kuliah_by_prodi', 'cariMataKuliahByProdi')->name('cariMataKuliahByProdi');
});


Route::controller(BukuTamuController::class)->prefix('/buku_tamu')->group(function(){
    Route::get('/', 'index')->name('bukuTamu');
    Route::post('/', 'store')->name('bukuTamu.store');
});

Route::controller(KonselingController::class)->middleware('auth','verified')->prefix('/e_konseling')->group(function () {
    Route::get('/e-konseling', 'index')->name('e-konseling');
    Route::post('/e-konseling', 'store')->name('e-konseling.store');

});

Route::get('/tampil-Jadwal', JadwalPerkuliahanLivewire::class)->name('tampilJadwalLivewire');

// Route::controller(JadwalController::class)->prefix('/jadwal')->group(function () {
//     Route::get('/tampil-Jadwal', 'index')->name('tampilJadwal');
// });

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
    Route::get('/{prodi:kode}/detail', 'detail')->name('mahasiswa.detail');
    Route::post('/', 'store')->name('mahasiswa.store');
    Route::get('/{mahasiswa:npm}/edit', 'edit')->name('mahasiswa.edit');
    Route::patch('/update', 'update')->name('mahasiswa.update');
    Route::delete('/{mahasiswa:npm}/delete', 'delete')->name('mahasiswa.delete');
});

Route::controller(MataKuliahController::class)->middleware('auth','verified')->prefix('/mata_kuliah')->group(function(){
    Route::get('/', 'index')->name('mataKuliah');
    Route::get('/{prodi:kode}/detail', 'detail')->name('mataKuliah.detail');
    Route::post('/', 'store')->name('mataKuliah.store');
    Route::get('/{mataKuliah}/edit', 'edit')->name('mataKuliah.edit');
    Route::patch('/update', 'update')->name('mataKuliah.update');
    Route::delete('/{mataKuliah}/delete', 'delete')->name('mataKuliah.delete');
});

Route::controller(DosenController::class)->middleware('auth','verified')->prefix('/dosen')->group(function(){
    Route::get('/', 'index')->name('dosen');
    Route::get('/{prodi:kode}/detail', 'detail')->name('dosen.detail');
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

Route::controller(ManajemenBukuTamuController::class)->middleware('auth','verified')->prefix('/manajemen_buku_tamu')->group(function(){
    Route::get('/', 'index')->name('manajemenBukuTamu');
    Route::post('/', 'store')->name('manajemenBukuTamu.store');
    Route::get('/{bukuTamu}/download', 'download')->name('manajemenBukuTamu.download');
});

Route::controller(OperatorController::class)->middleware('auth','verified')->prefix('/operator')->group(function(){
    Route::get('/', 'index')->name('operator');
    Route::post('/', 'store')->name('operator.store');
    Route::get('/{operator}/edit', 'edit')->name('operator.edit');
    Route::patch('/update', 'update')->name('operator.update');
    Route::delete('/{operator}/delete', 'delete')->name('operator.delete');
    Route::patch('/ubah_password', 'ubahPassword')->name('operator.ubahPassword');
});

Route::controller(PermissionController::class)->middleware('auth','verified')->prefix('/permission')->group(function(){
    Route::get('/', 'index')->name('permission');
    Route::post('/', 'store')->name('permission.store');
    Route::get('/{permission}/edit', 'edit')->name('permission.edit');
    Route::patch('/update', 'update')->name('permission.update');
    Route::delete('/{permission}/delete', 'delete')->name('permission.delete');
});

Route::controller(RoleController::class)->middleware('auth','verified')->prefix('/role')->group(function(){
    Route::get('/', 'index')->name('role');
    Route::post('/', 'store')->name('role.store');
    Route::get('/{role}/edit', 'edit')->name('role.edit');
    Route::patch('/update', 'update')->name('role.update');
    Route::delete('/{role}/delete', 'delete')->name('role.delete');
    Route::get('/role/{role}/detail', 'detail')->name('role.detail');
    Route::delete('/role/{role}/revoke/{permission}', 'revoke')->name('role.revoke');
    Route::post('/role/{role}/assign/', 'assign')->name('role.assign');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
