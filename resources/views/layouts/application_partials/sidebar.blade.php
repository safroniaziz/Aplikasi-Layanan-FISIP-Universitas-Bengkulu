@if (auth()->user()->can('dashboard'))
<li class="header">MENU UTAMA</li>
<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-desktop"></i>
        <span>Dashboard</span>
    </a>
</li>
@endif
@if (auth()->user()->can('programStudi'))

<li class="{{ set_active(['programStudi']) }}">
    <a href="{{ route('programStudi') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Program Studi</span>
    </a>
</li>
@endif
@if (auth()->user()->can('mahasiswa') || auth()->user()->can('dosen') || auth()->user()->can('pegawai'))
<li class="treeview {{ set_active([
    'mahasiswa','mahasiswa.detail',
    'dosen','dosen.detail',
    'pegawai',
]) }}">
    <a href="#">
        <i class="fa fa-user-cog"></i> <span>Civitas Akademika</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('dashboard'))
        <li class="{{ set_active(['mahasiswa','mahasiswa.detail']) }}"><a href="{{ route('mahasiswa') }}"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
        @endif
        @if (auth()->user()->can('dosen'))
        <li class="{{ set_active(['dosen','dosen.detail']) }}"><a href="{{ route('dosen') }}"><i class="fa fa-circle-o"></i> Dosen</a></li>
        @endif
        @if (auth()->user()->can('pegawai'))
        <li class="{{ set_active(['pegawai']) }}"><a href="{{ route('pegawai') }}"><i class="fa fa-circle-o"></i> Pegawai</a></li>
        @endif
    </ul>
</li>
@endif
@if (auth()->user()->can('ruanganPoadcast') || auth()->user()->can('alatPoadcast') || auth()->user()->can('sewaRuangan'))
<li class="header">FITUR UTAMA</li>
<li class="treeview {{ set_active([
    'ruanganPoadcast','ruanganPoadcast.create','ruanganPoadcast.edit',
    'alatPoadcast','alatPoadcast.create','alatPoadcast.edit',
    'sewaRuangan',
]) }}">
    <a href="#">
        <i class="fa fa-microphone"></i> <span>Sewa Alat Poadcast</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('ruanganPoadcast'))
        <li class="{{ set_active(['ruanganPoadcast','ruanganPoadcast.create','ruanganPoadcast.edit']) }}"><a href="{{ route('ruanganPoadcast') }}"><i class="fa fa-circle-o"></i> Ruangan Poadcast</a></li>
        @endif
        @if (auth()->user()->can('alatPoadcast'))
        <li class="{{ set_active(['alatPoadcast','alatPoadcast.create','alatPoadcast.edit']) }}"><a href="{{ route('alatPoadcast') }}"><i class="fa fa-circle-o"></i> Alat Poadcast</a></li>
        @endif
        @if (auth()->user()->can('sewaRuangan'))
        <li class="{{ set_active(['sewaRuangan']) }}"><a href="{{ route('sewaRuangan') }}"><i class="fa fa-circle-o"></i> list Sewa Ruangan </a></li>
        @endif
    </ul>
</li>
@endif

@if (auth()->user()->can('mataKuliah') || auth()->user()->can('pengampu') || auth()->user()->can('ruanganKelas') ||auth()->user()->can('jadwalPerkuliahan') || auth()->user()->can('perubahanJadwal') || auth()->user()->can('jadwal_settings'))
<li class="treeview {{ set_active([
    'mataKuliah','mataKuliah.detail',
    'pengampu',
    'ruanganKelas',
    'jadwalPerkuliahan',
    'perubahanJadwal',
    'jadwalPerkuliahan.semuaJadwal',
    'jadwal_settings',
]) }}">
    <a href="#">
        <i class="fa fa-calendar"></i> <span>Jadwal Mata Kuliah</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('mataKuliah'))
        <li class="{{ set_active(['mataKuliah','mataKuliah.detail']) }}"><a href="{{ route('mataKuliah') }}"><i class="fa fa-circle-o"></i> Mata Kuliah</a></li>
        @endif
        @if (auth()->user()->can('pengampu'))
        <li class="{{ set_active(['pengampu']) }}"><a href="{{ route('pengampu') }}"><i class="fa fa-circle-o"></i> Pengampu</a></li>
        @endif
        @if (auth()->user()->can('ruanganKelas'))
        <li class="{{ set_active(['ruanganKelas']) }}"><a href="{{ route('ruanganKelas') }}"><i class="fa fa-circle-o"></i> Ruang Kelas</a></li>
        @endif
        @if (auth()->user()->can('jadwalPerkuliahan'))
        <li class="{{ set_active(['jadwalPerkuliahan','jadwalPerkuliahan.semuaJadwal']) }}"><a href="{{ route('jadwalPerkuliahan') }}"><i class="fa fa-circle-o"></i> Jadwal Perkuliahan</a></li>
        @endif
        @if (auth()->user()->can('perubahanJadwal'))
        <li class="{{ set_active(['perubahanJadwal']) }}"><a href="{{ route('perubahanJadwal') }}"><i class="fa fa-circle-o"></i> Perubahan Jadwal</a></li>
        <li class="{{ set_active(['jadwal_settings']) }}"><a href="{{ route('jadwal_settings') }}"><i class="fa fa-circle-o"></i> Video Youtube</a></li>
        @endif
    </ul>
</li>
@endif

@if (auth()->user()->can('basisPengetahuan') || auth()->user()->can('basisPengetahuan') || auth()->user()->can('konselingOffline'))
<li class="treeview {{ set_active([
    'basisPengetahuan',
    'konselingOffline',
    'basisPengetahuan','jadwalKonseling','massage',
]) }}">
    <a href="#">
        <i class="fa fa-comments"></i> <span>Layanan Konseling</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('basisPengetahuan'))
        <li class="{{ set_active(['basisPengetahuan']) }}"><a href="{{ route('basisPengetahuan') }}"><i class="fa fa-circle-o"></i> Basis Pengetahuan</a></li>
        @endif
        @if (auth()->user()->can('basisPengetahuan'))
        <li class="{{ set_active(['massage']) }}"><a href="{{ route('massage') }}"><i class="fa fa-circle-o"></i> E-Konsling (Live Chat)</a></li>
        @endif
        @if (auth()->user()->can('konselingOffline'))
        <li class="{{ set_active(['konselingOffline']) }}"><a href="{{ route('konselingOffline') }}"><i class="fa fa-circle-o"></i> Konseling Offline</a></li>
        @endif
    </ul>
</li>
@endif

@if (auth()->user()->can('bukuTamu'))
<li class="{{ set_active(['manajemenBukuTamu']) }}">
    <a href="{{ route('manajemenBukuTamu') }}">
        <i class="fa fa-book-open"></i>
        <span>Buku Tamu</span>
    </a>
</li>
@endif

@if (auth()->user()->can('unit') || auth()->user()->can('pengaduan'))
<li class="treeview {{ set_active([
    'pengaduan',
    'unit',
]) }}">
    <a href="#">
        <i class="fa fa-exclamation-circle"></i> <span>Laporan Pengaduan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('unit'))
        <li class="{{ set_active(['unit']) }}"><a href="{{ route('unit') }}"><i class="fa fa-circle-o"></i> Data Unit</a></li>
        @endif
        @if (auth()->user()->can('pengaduan'))
        <li class="{{ set_active(['pengaduan']) }}"><a href="{{ route('pengaduan') }}"><i class="fa fa-circle-o"></i> Data Pengaduan</a></li>
        @endif
    </ul>
</li>
@endif

@if (auth()->user()->can('permohonan') || auth()->user()->can('permohonan'))

<li class="treeview {{ set_active([
        'jenisSurat','jenisSurat.kelengkapan',
        'permohonan',
        // 'daftarSurat'
    ]) }}">
    <a href="#">
        <i class="fa fa-envelope"></i> <span>Permohonan Surat </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('permohonan'))
        <li class="{{ set_active(['jenisSurat','jenisSurat.kelengkapan']) }}"><a href="{{ route('jenisSurat') }}"><i class="fa fa-circle-o"></i> Jenis Surat</a></li>
        <li class="{{ set_active(['permohonan','permohonan']) }}"><a href="{{ route('permohonan') }}"><i class="fa fa-circle-o"></i>Permohonan Surat Diterima</a></li>
        {{-- <li class="{{ set_active(['daftarSurat']) }}"><a href="{{ route('daftarSurat') }}"><i class="fa fa-check-circle"></i> Daftar Permohonan Surat</a></li> --}}
        @endif
    </ul>
</li>
@endif

@if (auth()->user()->can('permission') || auth()->user()->can('role') || auth()->user()->can('operator'))
<li class="treeview {{ set_active([
    'permission',
    'role','role.detail',
    'operator'
]) }}">
    <a href="#">
        <i class="fa fa-user-cog"></i> <span>Pengaturan Pengguna</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @if (auth()->user()->can('permission'))
        <li class="{{ set_active(['permission']) }}"><a href="{{ route('permission') }}"><i class="fa fa-circle-o"></i> Permission</a></li>
        @endif
        @if (auth()->user()->can('role'))
        <li class="{{ set_active(['role','role.detail']) }}"><a href="{{ route('role') }}"><i class="fa fa-circle-o"></i> Role</a></li>
        @endif
        @if (auth()->user()->can('operator'))
        <li class="{{ set_active('operator') }}"><a href="{{ route('operator') }}"><i class="fa fa-circle-o"></i> Operator</a></li>
        @endif
    </ul>
</li>
@endif
@if (auth()->check() && auth()->user()->hasRole('admin'))
<li class="{{ set_active(['tampilJadwalLivewire']) }}">
    <a href="{{ route('tampilJadwalLivewire') }}">
        <i class="fa fa-book-open"></i>
        <span>Jadwal Perkuliahan</span>
    </a>
</li>
@endif
@if (auth()->check() && auth()->user()->hasRole('admin'))
<li class="{{ set_active(['bukuTamu']) }}">
    <a href="{{ route('bukuTamu') }}">
        <i class="fa fa-book"></i>
        <span>Buku Tamu</span>
    </a>
</li>
@endif
<!-- Authentication -->
<li>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out text-danger"></i>
        <span>{{__('Logout') }}</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
@endif
