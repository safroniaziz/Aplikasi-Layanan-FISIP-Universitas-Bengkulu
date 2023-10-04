<li class="header">MENU UTAMA</li>
<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active(['ruanganPoadcast','ruanganPoadcast.create','ruanganPoadcast.edit']) }}">
    <a href="{{ route('ruanganPoadcast') }}">
        <i class="fa fa-briefcase"></i>
        <span>Ruangan Poadcast</span>
    </a>
</li>

<li class="{{ set_active(['alatPoadcast','alatPoadcast.create','alatPoadcast.edit']) }}">
    <a href="{{ route('alatPoadcast') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Alat Poadcast</span>
    </a>
</li>

<li class="{{ set_active(['programStudi']) }}">
    <a href="{{ route('programStudi') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Program Studi</span>
    </a>
</li>

<li class="{{ set_active(['mahasiswa','mahasiswa.create','mahasiswa.edit']) }}">
    <a href="{{ route('mahasiswa') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Mahasiswa</span>
    </a>
</li>

<li class="{{ set_active(['mataKuliah','mataKuliah.create','mataKuliah.edit']) }}">
    <a href="{{ route('mataKuliah') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Mata Kuliah</span>
    </a>
</li>

<li class="{{ set_active(['dosen','dosen.create','dosen.edit']) }}">
    <a href="{{ route('dosen') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Dosen</span>
    </a>
</li>

<li class="{{ set_active(['pengampu','pengampu.create','pengampu.edit']) }}">
    <a href="{{ route('pengampu') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Pengampu</span>
    </a>
</li>

<li class="{{ set_active(['ruanganKelas','ruanganKelas.create','ruanganKelas.edit']) }}">
    <a href="{{ route('ruanganKelas') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Ruangan Kelas</span>
    </a>
</li>

<li class="{{ set_active(['jadwalPerkuliahan','jadwalPerkuliahan.create','jadwalPerkuliahan.edit']) }}">
    <a href="{{ route('jadwalPerkuliahan') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Jadwal Perkuliahan</span>
    </a>
</li>

<li class="{{ set_active(['mahasiswaMataKuliah','mahasiswaMataKuliah.create','mahasiswaMataKuliah.edit']) }}">
    <a href="{{ route('mahasiswaMataKuliah') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Mahasiswa Mata Kuliah</span>
    </a>
</li>

<li class="{{ set_active(['basisPengetahuan','basisPengetahuan.create','basisPengetahuan.edit']) }}">
    <a href="{{ route('basisPengetahuan') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Basis Pengetahuan</span>
    </a>
</li>

<li class="header">PENGATURAN</li>

<li class="treeview {{ set_active([
    'permission',
    'manajemen_role',
    'manajemen_role.detail',
    'manajemen_data_verifikator',
    'manajemen_data_administrator',
]) }}">
    <a href="#">
        <i class="fa fa-user-cog"></i> <span>Pengaturan Pengguna</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('permission') }}"><i class="fa fa-circle-o"></i> Permission</a></li>
        <li><a href="{{ route('operator') }}"><i class="fa fa-circle-o"></i> Operator</a></li>
    </ul>
</li>

<!-- Authentication -->
<li>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out text-danger"></i>
        <span>{{__('Logout') }}</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
