<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat peran "operator" dan tambahkan ke database
        $roleOperator = Role::create(['name' => 'operator']);
        $roleUser = Role::create(['name' => 'user']);

        $permission = Permission::create(['name'  =>  'dashboard']);

        $permission = Permission::create(['name'  =>  'ruanganPoadcast']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.create']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.store']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.edit']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.update']);
        $permission = Permission::create(['name'  =>  'ruanganPoadcast.delete']);

        $permission = Permission::create(['name'  =>  'alatPoadcast']);
        $permission = Permission::create(['name'  =>  'alatPoadcast.create']);
        $permission = Permission::create(['name'  =>  'alatPoadcast.store']);
        $permission = Permission::create(['name'  =>  'alatPoadcast.edit']);
        $permission = Permission::create(['name'  =>  'alatPoadcast.update']);
        $permission = Permission::create(['name'  =>  'alatPoadcast.delete']);

        $permission = Permission::create(['name'  =>  'programStudi']);
        $permission = Permission::create(['name'  =>  'programStudi.store']);
        $permission = Permission::create(['name'  =>  'programStudi.edit']);
        $permission = Permission::create(['name'  =>  'programStudi.update']);
        $permission = Permission::create(['name'  =>  'programStudi.delete']);

        $permission = Permission::create(['name'  =>  'mahasiswa']);
        $permission = Permission::create(['name'  =>  'mahasiswa.detail']);
        $permission = Permission::create(['name'  =>  'mahasiswa.store']);
        $permission = Permission::create(['name'  =>  'mahasiswa.edit']);
        $permission = Permission::create(['name'  =>  'mahasiswa.update']);
        $permission = Permission::create(['name'  =>  'mahasiswa.delete']);

        $permission = Permission::create(['name'  =>  'mataKuliah']);
        $permission = Permission::create(['name'  =>  'mataKuliah.detail']);
        $permission = Permission::create(['name'  =>  'mataKuliah.store']);
        $permission = Permission::create(['name'  =>  'mataKuliah.edit']);
        $permission = Permission::create(['name'  =>  'mataKuliah.update']);
        $permission = Permission::create(['name'  =>  'mataKuliah.delete']);

        $permission = Permission::create(['name'  =>  'dosen']);
        $permission = Permission::create(['name'  =>  'dosen.detail']);
        $permission = Permission::create(['name'  =>  'dosen.store']);
        $permission = Permission::create(['name'  =>  'dosen.edit']);
        $permission = Permission::create(['name'  =>  'dosen.update']);
        $permission = Permission::create(['name'  =>  'dosen.delete']);

        $permission = Permission::create(['name'  =>  'pegawai']);
        $permission = Permission::create(['name'  =>  'pegawai.store']);
        $permission = Permission::create(['name'  =>  'pegawai.edit']);
        $permission = Permission::create(['name'  =>  'pegawai.update']);
        $permission = Permission::create(['name'  =>  'pegawai.delete']);

        $permission = Permission::create(['name'  =>  'pengampu']);
        $permission = Permission::create(['name'  =>  'pengampu.store']);
        $permission = Permission::create(['name'  =>  'pengampu.edit']);
        $permission = Permission::create(['name'  =>  'pengampu.update']);
        $permission = Permission::create(['name'  =>  'pengampu.delete']);

        $permission = Permission::create(['name'  =>  'ruanganKelas']);
        $permission = Permission::create(['name'  =>  'ruanganKelas.store']);
        $permission = Permission::create(['name'  =>  'ruanganKelas.edit']);
        $permission = Permission::create(['name'  =>  'ruanganKelas.update']);
        $permission = Permission::create(['name'  =>  'ruanganKelas.delete']);

        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.store']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.edit']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.update']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.delete']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.batalkan']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.alihkan']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.semuaJadwal']);
        $permission = Permission::create(['name'  =>  'jadwalPerkuliahan.kehadiran']);
        $permission = Permission::create(['name'  =>  'scan-qr-code']);

        $permission = Permission::create(['name'  =>  'perubahanJadwal']);
        $permission = Permission::create(['name'  =>  'perubahanJadwal.getData']);
        $permission = Permission::create(['name'  =>  'perubahanJadwal.update']);

        $permission = Permission::create(['name'  =>  'mahasiswaMataKuliah']);
        $permission = Permission::create(['name'  =>  'mahasiswaMataKuliah.store']);
        $permission = Permission::create(['name'  =>  'mahasiswaMataKuliah.edit']);
        $permission = Permission::create(['name'  =>  'mahasiswaMataKuliah.update']);
        $permission = Permission::create(['name'  =>  'mahasiswaMataKuliah.delete']);

        $permission = Permission::create(['name'  =>  'basisPengetahuan']);
        $permission = Permission::create(['name'  =>  'basisPengetahuan.store']);
        $permission = Permission::create(['name'  =>  'basisPengetahuan.edit']);
        $permission = Permission::create(['name'  =>  'basisPengetahuan.update']);
        $permission = Permission::create(['name'  =>  'basisPengetahuan.delete']);

        $permission = Permission::create(['name'  =>  'konselingOffline']);
        $permission = Permission::create(['name'  =>  'konselingOffline.verify']);

        $permission = Permission::create(['name'  =>  'permohonan']);
        $permission = Permission::create(['name'  =>  'permohonan.verifikasi']);
        $permission = Permission::create(['name'  =>  'permohonan.verifikasiPost']);
        $permission = Permission::create(['name'  =>  'kelengkapan.download']);

        $permission = Permission::create(['name'  =>  'unit']);
        $permission = Permission::create(['name'  =>  'unit.store']);
        $permission = Permission::create(['name'  =>  'unit.edit']);
        $permission = Permission::create(['name'  =>  'unit.update']);
        $permission = Permission::create(['name'  =>  'unit.delete']);

        $permission = Permission::create(['name'  =>  'pengaduan']);
        $permission = Permission::create(['name'  =>  'pengaduan.respon']);
        $permission = Permission::create(['name'  =>  'pengaduan.download']);
        $permission = Permission::create(['name'  =>  'pengaduan.responPost']);

        $permission = Permission::create(['name'  =>  'jenisSurat.kelengkapan']);
        $permission = Permission::create(['name'  =>  'jenisSurat.kelengkapan.store']);
        $permission = Permission::create(['name'  =>  'jenisSurat.kelengkapan.edit']);
        $permission = Permission::create(['name'  =>  'jenisSurat.kelengkapan.update']);
        $permission = Permission::create(['name'  =>  'jenisSurat.kelengkapan.delete']);

        $permission = Permission::create(['name'  =>  'operator']);
        $permission = Permission::create(['name'  =>  'operator.store']);
        $permission = Permission::create(['name'  =>  'operator.edit']);
        $permission = Permission::create(['name'  =>  'operator.update']);
        $permission = Permission::create(['name'  =>  'operator.delete']);
        $permission = Permission::create(['name'  =>  'operator.ubahPassword']);

        $permission = Permission::create(['name'  =>  'permission']);
        $permission = Permission::create(['name'  =>  'permission.store']);
        $permission = Permission::create(['name'  =>  'permission.edit']);
        $permission = Permission::create(['name'  =>  'permission.update']);
        $permission = Permission::create(['name'  =>  'permission.delete']);

        $permission = Permission::create(['name'  =>  'role']);
        $permission = Permission::create(['name'  =>  'role.store']);
        $permission = Permission::create(['name'  =>  'role.edit']);
        $permission = Permission::create(['name'  =>  'role.update']);
        $permission = Permission::create(['name'  =>  'role.delete']);
        $permission = Permission::create(['name'  =>  'role.detail']);
        $permission = Permission::create(['name'  =>  'role.revoke']);
        $permission = Permission::create(['name'  =>  'role.assign']);

        $permission = Permission::create(['name'  =>  'sewaRuangan']);
        $permission = Permission::create(['name'  =>  'sewaRuangan.create']);
        $permission = Permission::create(['name'  =>  'sewaRuangan.konfirmasi']);
        $permission = Permission::create(['name'  =>  'sewaRuangan.delete']);

        $user = User::create([
            'name' => 'Operator',
            'username' => 'operator',
            'email' => 'operator@mail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole($roleOperator);
    }
}
