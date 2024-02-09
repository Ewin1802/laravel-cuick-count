<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">QUICK COUNT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Qc</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('modules-calendar') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('modules-calendar') }}">Kalender</a>
                    </li>
                    <li class="{{ Request::is('modules-chartjs') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-chartjs') }}">Grafik</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li >
                        <a class="nav-link"
                            href="{{ route('user.index')  }}">Semua Pengguna</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Data Umum</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fire"></i><span>Data Pemilihan</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('paslon.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('paslon.index') }}">Data Caleg</a>
                    </li>
                    <li >
                        <a class="nav-link"
                            href="{{ route('lokasi.index') }}">Data Dapil</a>
                    </li>

                </ul>
            </li>

            <div class="hide-sidebar-mini mt-4 mb-4 p-3">
                <a href="https://www.instagram.com/ewin.lntp/"
                    class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Tentang Saya
                </a>
            </div>

    </aside>
</div>
