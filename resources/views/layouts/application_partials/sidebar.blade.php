<li class="header">MENU UTAMA</li>
<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active(['ruanganPoadcast','ruanganPoadcast.create']) }}">
    <a href="{{ route('ruanganPoadcast') }}">
        <i class="fa fa-briefcase"></i>
        <span>Ruangan Poadcast</span>
    </a>
</li>

<li class="{{ set_active(['programStudi']) }}">
    <a href="{{ route('programStudi') }}">
        <i class="fa fa-graduation-cap"></i>
        <span>Program Studi</span>
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
