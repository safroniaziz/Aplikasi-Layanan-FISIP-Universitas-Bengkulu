<li class="header">MENU UTAMA</li>
<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-desktop"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active(['programStudi']) }}">
    <a href="{{ route('programStudi') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Program Studi</span>
    </a>
</li>

<li class="treeview {{ set_active([
    'mahasiswa','mahasiswa.detail',
    'dosen','dosen.detail',
]) }}">
    <a href="#">
        <i class="fa fa-user-cog"></i> <span>Civitas Akademika</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ set_active(['mahasiswa','mahasiswa.detail']) }}"><a href="{{ route('mahasiswa') }}"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
        <li class="{{ set_active(['dosen','dosen.detail']) }}"><a href="{{ route('dosen') }}"><i class="fa fa-circle-o"></i> Dosen</a></li>
    </ul>
</li>

<li class="header">FITUR UTAMA</li>
<li class="treeview {{ set_active([
    'ruanganPoadcast','ruanganPoadcast.create','ruanganPoadcast.edit',
    'alatPoadcast','alatPoadcast.creata','alatPoadcast.edit',
]) }}">
    <a href="#">
        <i class="fa fa-microphone"></i> <span>Sewa Alat Poadcast</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ set_active(['ruanganPoadcast']) }}"><a href="{{ route('ruanganPoadcast') }}"><i class="fa fa-circle-o"></i> Ruangan Poadcast</a></li>
        <li class="{{ set_active(['alatPoadcast']) }}"><a href="{{ route('alatPoadcast') }}"><i class="fa fa-circle-o"></i> Alat Poadcast</a></li>
    </ul>
</li>

<li class="treeview {{ set_active([
    'mataKuliah','mataKuliah.detail',
    'pengampu',
    'ruanganKelas',
    'jadwalPerkuliahan',
]) }}">
    <a href="#">
        <i class="fa fa-calendar"></i> <span>Jadwal Mata Kuliah</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ set_active(['mataKuliah','mataKuliah.detail']) }}"><a href="{{ route('mataKuliah') }}"><i class="fa fa-circle-o"></i> Mata Kuliah</a></li>
        <li class="{{ set_active(['pengampu']) }}"><a href="{{ route('pengampu') }}"><i class="fa fa-circle-o"></i> Pengampu</a></li>
        <li class="{{ set_active(['ruanganKelas']) }}"><a href="{{ route('ruanganKelas') }}"><i class="fa fa-circle-o"></i> Ruang Kelas</a></li>
        <li class="{{ set_active(['jadwalPerkuliahan']) }}"><a href="{{ route('jadwalPerkuliahan') }}"><i class="fa fa-circle-o"></i> Jadwal Perkuliahan</a></li>
        <li class="{{ set_active(['jadwal_settings']) }}"><a href="{{ route('jadwal_settings') }}"><i class="fa fa-circle-o"></i> Jadwal Setting View</a></li>
    </ul>
</li>

<li class="treeview {{ set_active([
    'basisPengetahuan',
]) }}">
    <a href="#">
        <i class="fa fa-comments"></i> <span>Layanan Konseling</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ set_active(['basisPengetahuan']) }}"><a href="{{ route('basisPengetahuan') }}"><i class="fa fa-circle-o"></i> Basis Pengetahuan</a></li>
        <li class="{{ set_active(['massage']) }}"><a href="{{ route('massage') }}"><i class="fa fa-circle-o"></i> Mesagge</a></li>
    </ul>
</li>

<li class="{{ set_active(['manajemenBukuTamu']) }}">
    <a href="{{ route('manajemenBukuTamu') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Buku Tamu</span>
    </a>
</li>

<li class="header">PENGATURAN</li>

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
        <li class="{{ set_active(['permission']) }}"><a href="{{ route('permission') }}"><i class="fa fa-circle-o"></i> Permission</a></li>
        <li class="{{ set_active(['role','role.detail']) }}"><a href="{{ route('role') }}"><i class="fa fa-circle-o"></i> Role</a></li>
        <li class="{{ set_active('operator') }}"><a href="{{ route('operator') }}"><i class="fa fa-circle-o"></i> Operator</a></li>
    </ul>
</li>



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
