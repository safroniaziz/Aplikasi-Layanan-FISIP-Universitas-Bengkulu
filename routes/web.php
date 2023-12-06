<?php

use Livewire\Livewire;
use App\Livewire\SewaPodcast;
use App\Livewire\ChatOperator;
use App\Livewire\PermohonanSurat;
use App\Livewire\JadwalPerkuliahan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DaftarSewaRuangan;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Livewire\JadwalPerkuliahanLivewire;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\CariDataController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\PoadcastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\SewaPodcastController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AlatPoadcastController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RuanganKelasController;
use App\Http\Controllers\SettingJadwalController;
use App\Http\Controllers\JadwalKonselingController;
use App\Http\Controllers\PermohonanSuratController;
use App\Http\Controllers\PerubahanJadwalController;
use App\Http\Controllers\RuanganPoadcastController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\KonselingOfflineController;
use App\Http\Controllers\LayananPengaduanController;
use App\Http\Controllers\PemesananRuanganController;
use App\Http\Controllers\JadwalPerkuliahanController;
use App\Http\Controllers\ManajemenBukuTamuController;
use App\Http\Controllers\MahasiswaMataKuliahController;
use App\Http\Controllers\PendaftaranKonselingController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PermohonanSuratMasukController;
use App\Http\Controllers\UnitController;

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

Route::get('/cari_nomor_tiket', [App\Http\Controllers\LayananPengaduanController::class, 'cariNomorTiket'])->name('cari_nomor_tiket');


Route::controller(CariDataController::class)->group(function(){
    Route::get('/wa','wa')->name('wa');
    Route::get('/cari_mata_kuliah_by_prodi', 'cariMataKuliahByProdi')->name('cariMataKuliahByProdi');
});

Route::controller(BukuTamuController::class)->prefix('/buku_tamu')->group(function(){
    Route::get('/', 'index')->name('bukuTamu');
    Route::post('/', 'store')->name('bukuTamu.store');
});

Route::controller(UserProfileController::class)->middleware('auth','verified')->prefix('/user_profile')->group(function () {
    Route::get('/', 'index')->name('userProfile');
});

Route::controller(KonselingController::class)->middleware('auth','verified')->prefix('/e_konseling')->group(function () {
    Route::get('/', 'index')->name('e-konseling');
    Route::post('/', 'store')->name('e-konseling.store');
});

Route::controller(PermohonanSuratController::class)->middleware('auth','verified')->prefix('/permohonan_surat')->group(function () {
    Route::get('/', 'index')->name('permohonanSurat');
    Route::post('/', 'store')->name('permohonanSurat.store');
});

// Route::controller(PoadcastController::class)->middleware('auth','verified')->prefix('/sewa_poadcast')->group(function () {
//     Route::get('/', 'index')->name('poadcast');
//     Route::post('/', 'store')->name('poadcast.store');
// });


Route::get('/jadwal_kuliah', JadwalPerkuliahanLivewire::class)->name('tampilJadwalLivewire');
Route::get('/massage', ChatOperator::class)->name('massage');


Route::get( '/permohonan_surat_user', PermohonanSurat::class)->middleware('auth','verified')->name('permohonan_surat_livewire');
// Route::controller(JadwalController::class)->prefix('/jadwal')->group(function () {
//     Route::get('/_', 'index')->name('tampilJadwal');
// });

Route::controller(DashboardController::class)->middleware('auth','verified','operator')->prefix('/dashboard')->group(function(){
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(RuanganPoadcastController::class)->middleware('auth','verified','operator')->prefix('/ruangan_poadcast')->group(function(){
    Route::get('/', 'index')->name('ruanganPoadcast');
    Route::get('/create', 'create')->name('ruanganPoadcast.create');
    Route::post('/', 'store')->name('ruanganPoadcast.store');
    Route::get('/{ruanganPoadcast}/edit', 'edit')->name('ruanganPoadcast.edit');
    Route::patch('/{ruanganPoadcast}/update', 'update')->name('ruanganPoadcast.update');
    Route::delete('/{ruanganPoadcast}/delete', 'delete')->name('ruanganPoadcast.delete');
});

Route::controller(AlatPoadcastController::class)->middleware('auth','verified','operator')->prefix('/alat_poadcast')->group(function(){
    Route::get('/', 'index')->name('alatPoadcast');
    Route::get('/create', 'create')->name('alatPoadcast.create');
    Route::post('/', 'store')->name('alatPoadcast.store');
    Route::get('/{alatPoadcast}/edit', 'edit')->name('alatPoadcast.edit');
    Route::patch('/{alatPoadcast}/update', 'update')->name('alatPoadcast.update');
    Route::delete('/{alatPoadcast}/delete', 'delete')->name('alatPoadcast.delete');
});

Route::controller(ProgramStudiController::class)->middleware('auth','verified','operator')->prefix('/program_studi')->group(function(){
    Route::get('/', 'index')->name('programStudi');
    Route::post('/', 'store')->name('programStudi.store');
    Route::get('/{programStudi:kode}/edit', 'edit')->name('programStudi.edit');
    Route::patch('/update', 'update')->name('programStudi.update');
    Route::delete('/{programStudi:kode}/delete', 'delete')->name('programStudi.delete');
});

Route::controller(MahasiswaController::class)->middleware('auth','verified','operator')->prefix('/mahasiswa')->group(function(){
    Route::get('/', 'index')->name('mahasiswa');
    Route::get('/{prodi:kode}/detail', 'detail')->name('mahasiswa.detail');
    Route::post('/', 'store')->name('mahasiswa.store');
    Route::get('/{mahasiswa:npm}/edit', 'edit')->name('mahasiswa.edit');
    Route::patch('/update', 'update')->name('mahasiswa.update');
    Route::delete('/{mahasiswa:npm}/delete', 'delete')->name('mahasiswa.delete');
});

Route::controller(MataKuliahController::class)->middleware('auth','verified','operator')->prefix('/mata_kuliah')->group(function(){
    Route::get('/', 'index')->name('mataKuliah');
    Route::get('/{prodi:kode}/detail', 'detail')->name('mataKuliah.detail');
    Route::post('/', 'store')->name('mataKuliah.store');
    Route::get('/{mataKuliah}/edit', 'edit')->name('mataKuliah.edit');
    Route::patch('/update', 'update')->name('mataKuliah.update');
    Route::delete('/{mataKuliah}/delete', 'delete')->name('mataKuliah.delete');
});

Route::controller(DosenController::class)->middleware('auth','verified','operator')->prefix('/dosen')->group(function(){
    Route::get('/', 'index')->name('dosen');
    Route::get('/{prodi:kode}/detail', 'detail')->name('dosen.detail');
    Route::post('/', 'store')->name('dosen.store');
    Route::get('/{dosen:nip}/edit', 'edit')->name('dosen.edit');
    Route::patch('/update', 'update')->name('dosen.update');
    Route::delete('/{dosen:nip}/delete', 'delete')->name('dosen.delete');
});

Route::controller(PegawaiController::class)->middleware('auth','verified','operator')->prefix('/pegawai')->group(function(){
    Route::get('/', 'index')->name('pegawai');
    Route::post('/', 'store')->name('pegawai.store');
    Route::get('/{pegawai}/edit', 'edit')->name('pegawai.edit');
    Route::patch('/update', 'update')->name('pegawai.update');
    Route::delete('/{pegawai}/delete', 'delete')->name('pegawai.delete');
});

Route::controller(PengampuController::class)->middleware('auth','verified','operator')->prefix('/pengampu')->group(function(){
    Route::get('/', 'index')->name('pengampu');
    Route::post('/', 'store')->name('pengampu.store');
    Route::get('/{pengampu}/edit', 'edit')->name('pengampu.edit');
    Route::patch('/update', 'update')->name('pengampu.update');
    Route::delete('/{pengampu}/delete', 'delete')->name('pengampu.delete');
});

Route::controller(RuanganKelasController::class)->middleware('auth','verified','operator')->prefix('/ruangan_kelas')->group(function(){
    Route::get('/', 'index')->name('ruanganKelas');
    Route::post('/', 'store')->name('ruanganKelas.store');
    Route::get('/{ruanganKelas}/edit', 'edit')->name('ruanganKelas.edit');
    Route::patch('/update', 'update')->name('ruanganKelas.update');
    Route::delete('/{ruanganKelas}/delete', 'delete')->name('ruanganKelas.delete');
});

Route::controller(JadwalPerkuliahanController::class)->middleware('auth','verified','operator')->prefix('/jadwal_perkuliahan')->group(function(){
    Route::get('/', 'index')->name('jadwalPerkuliahan');
    Route::post('/', 'store')->name('jadwalPerkuliahan.store');
    Route::get('/{jadwalPerkuliahan}/edit', 'edit')->name('jadwalPerkuliahan.edit');
    Route::patch('/update', 'update')->name('jadwalPerkuliahan.update');
    Route::delete('/{jadwalPerkuliahan}/delete', 'delete')->name('jadwalPerkuliahan.delete');
    Route::patch('/{jadwalPerkuliahan}/batalkan', 'batalkan')->name('jadwalPerkuliahan.batalkan');
    Route::post('/alihkan', 'alihkan')->name('jadwalPerkuliahan.alihkan');
    Route::get('/semua_jadwal', 'semuaJadwal')->name('jadwalPerkuliahan.semuaJadwal');
    Route::get('/{id}/kehadiran', 'kehadiran')->name('jadwalPerkuliahan.kehadiran');
    Route::get('/scan-qr-code/{id}', [JadwalPerkuliahanController::class, 'scanQRCode'])->name('scan-qr-code');

});

Route::controller(PerubahanJadwalController::class)->middleware('auth','verified','operator')->prefix('/perubahan_jadwal')->group(function(){
    Route::get('/', 'index')->name('perubahanJadwal');
    Route::get('/{jadwal}/get_data', 'getData')->name('perubahanJadwal.getData');
    Route::patch('/update', 'update')->name('perubahanJadwal.update');
});

Route::controller(MahasiswaMataKuliahController::class)->middleware('auth','verified','operator')->prefix('/mahasiswa_mata_kuliah')->group(function(){
    Route::get('/', 'index')->name('mahasiswaMataKuliah');
    Route::post('/', 'store')->name('mahasiswaMataKuliah.store');
    Route::get('/{mahasiswaMataKuliah}/edit', 'edit')->name('mahasiswaMataKuliah.edit');
    Route::patch('/update', 'update')->name('mahasiswaMataKuliah.update');
    Route::delete('/{mahasiswaMataKuliah}/delete', 'delete')->name('mahasiswaMataKuliah.delete');
});

Route::controller(BasisPengetahuanController::class)->middleware('auth','verified','operator')->prefix('/basis_pengetahuan')->group(function(){
    Route::get('/', 'index')->name('basisPengetahuan');
    Route::post('/', 'store')->name('basisPengetahuan.store');
    Route::get('/{basisPengetahuan}/edit', 'edit')->name('basisPengetahuan.edit');
    Route::patch('/update', 'update')->name('basisPengetahuan.update');
    Route::delete('/{basisPengetahuan}/delete', 'delete')->name('basisPengetahuan.delete');
});

Route::controller(KonselingOfflineController::class)->middleware('auth','verified','operator')->prefix('/konseling_offline')->group(function () {
    Route::get('/', 'index')->name('konselingOffline');
    Route::patch('/verify', 'verify')->name('konselingOffline.verify');
});

// Route::controller(ManajemenBukuTamuController::class)->middleware('auth','verified','operator')->prefix('/manajemen_buku_tamu')->group(function(){


Route::controller(JadwalKonselingController::class)->middleware('auth', 'verified')->prefix('/jadwal_konseling')->group(function () {
    Route::get('/', 'index')->name('jadwalKonseling');
    Route::post('/jadwal_konseling/list', 'listPendaftaranKonseling')->name('jadwalKonseling.list');
});

Route::get('events/list', [JadwalKonselingController::class, 'listPendaftaranKonseling'])->name('events.list');
Route::resource('events', JadwalKonselingController::class);

Route::resource('jadwalKonseling', JadwalKonselingController::class);


Route::controller(ManajemenBukuTamuController::class)->middleware('auth','verified')->prefix('/manajemen_buku_tamu')->group(function(){
    Route::get('/', 'index')->name('manajemenBukuTamu');
    Route::post('/', 'store')->name('manajemenBukuTamu.store');
    Route::get('/{bukuTamu}/download', 'download')->name('manajemenBukuTamu.download');
});

Route::controller(JenisSuratController::class)->middleware('auth','verified','operator')->prefix('/jenis_surats')->group(function(){
    Route::get('/', 'index')->name('jenisSurat');
    Route::post('/', 'store')->name('jenisSurat.store');
    Route::get('/{jenisSurat}/edit', 'edit')->name('jenisSurat.edit');
    Route::patch('/update', 'update')->name('jenisSurat.update');
    Route::delete('/{jenisSurat}/delete', 'delete')->name('jenisSurat.delete');
});

Route::controller(PermohonanSuratMasukController::class)->middleware('auth','verified','operator')->prefix('/permohonan_surat_masuk')->group(function(){
    Route::get('/', 'index')->name('permohonan');
    Route::get('/{permohonan}/verifikasi', 'verifikasi')->name('permohonan.verifikasi');
    Route::patch('/verifikasi_post', 'verifikasiPost')->name('permohonan.verifikasiPost');
    Route::get('/{kelengkapan}/download', 'download')->name('kelengkapan.download');
});

Route::controller(UnitController::class)->middleware('auth','verified','operator')->prefix('/data_unit')->group(function(){
    Route::get('/', 'index')->name('unit');
    Route::post('/', 'store')->name('unit.store');
    Route::get('/{unit}/edit', 'edit')->name('unit.edit');
    Route::patch('/update', 'update')->name('unit.update');
    Route::delete('/{unit}/delete', 'delete')->name('unit.delete');
});

Route::controller(PengaduanController::class)->middleware('auth','verified','operator')->prefix('/laporan_pengaduan')->group(function(){
    Route::get('/', 'index')->name('pengaduan');
    Route::get('/{pengaduan}/respon', 'respon')->name('pengaduan.respon');
    Route::get('/{pengaduan}/download', 'download')->name('pengaduan.download');
    Route::patch('/respon', 'responPost')->name('pengaduan.responPost');
});

Route::controller(RequirementController::class)->middleware('auth','verified','operator')->prefix('/jenis_surats/')->group(function(){
    Route::get('/{jenisSurat}/kelengkapan', 'index')->name('jenisSurat.kelengkapan');
    Route::post('/{jenisSurat}/kelengkapan', 'store')->name('jenisSurat.kelengkapan.store');
    Route::get('/{kelengkapan}/kelengkapan_edit', 'edit')->name('jenisSurat.kelengkapan.edit');
    Route::patch('/{jenisSurat}/update', 'update')->name('jenisSurat.kelengkapan.update');
    Route::delete('/{jenisSurat}/{kelengkapan}/delete', 'delete')->name('jenisSurat.kelengkapan.delete');
});

Route::controller(OperatorController::class)->middleware('auth','verified','operator')->prefix('/operator')->group(function(){
    Route::get('/', 'index')->name('operator');
    Route::post('/', 'store')->name('operator.store');
    Route::get('/{operator}/edit', 'edit')->name('operator.edit');
    Route::patch('/update', 'update')->name('operator.update');
    Route::delete('/{operator}/delete', 'delete')->name('operator.delete');
    Route::patch('/ubah_password', 'ubahPassword')->name('operator.ubahPassword');
});

Route::controller(PermissionController::class)->middleware('auth','verified','operator')->prefix('/permission')->group(function(){
    Route::get('/', 'index')->name('permission');
    Route::post('/', 'store')->name('permission.store');
    Route::get('/{permission}/edit', 'edit')->name('permission.edit');
    Route::patch('/update', 'update')->name('permission.update');
    Route::delete('/{permission}/delete', 'delete')->name('permission.delete');
});

Route::controller(RoleController::class)->middleware('auth','verified','operator')->prefix('/role')->group(function(){
    Route::get('/', 'index')->name('role');
    Route::post('/', 'store')->name('role.store');
    Route::get('/{role}/edit', 'edit')->name('role.edit');
    Route::patch('/update', 'update')->name('role.update');
    Route::delete('/{role}/delete', 'delete')->name('role.delete');
    Route::get('/role/{role}/detail', 'detail')->name('role.detail');
    Route::delete('/role/{role}/revoke/{permission}', 'revoke')->name('role.revoke');
    Route::post('/role/{role}/assign/', 'assign')->name('role.assign');
});




Route::controller(SettingJadwalController::class)->middleware('auth', 'verified')->prefix('/jadwal_settings')->group(function () {
    Route::get('/', 'index')->name('jadwal_settings');
});

Route::controller(SewaPodcastController::class)->middleware('auth', 'verified')->prefix('/sewa_podcast')->group(function () {
    Route::get('/', 'index')->name('sewa_podcast');
    Route::post('/sewaruang', 'store')->name('sewaruang.store');

});

Route::controller(LayananPengaduanController::class)->middleware('auth', 'verified')->prefix('/layanan_pengaduan')->group(function () {
    Route::get('/', 'index')->name('layanan_pengaduan');
    Route::post('/', 'store')->name('layanan_pengaduan.store');

});

Route::get('/sewa-podcast', SewaPodcast::class)->name('sewa_podcast_livewire');


Route::controller(DaftarSewaRuangan::class)->middleware('auth', 'verified', 'operator')->prefix('/daftar_sewa_ruangan')->group(function () {
    Route::get('/', 'index')->name('sewaRuangan');
    Route::get('/create', 'create')->name('sewaRuangan.create');
    Route::get('/{sewaRuangan}/konfirmasi', 'konfirmasi')->name('sewaRuangan.konfirmasi');
    Route::delete('/{sewaRuangan}/delete', 'delete')->name('sewaRuangan.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// });


require __DIR__.'/auth.php';
