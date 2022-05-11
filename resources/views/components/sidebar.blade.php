<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-solid fa-mortar-pestle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Apotek Ara Farma</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('penjualan')">
        <a class="nav-link" href="{{ route('penjualan.index') }}">
            <i class="fas fa-fw fa-solid fa-circle-dollar-to-slot"></i>
            <span>Penjualan</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item @yield('pembelian')">
        <a class="nav-link" href="{{ route('pembelian.index') }}">
            <i class="fas fa-fw fa-solid fa-money-check-dollar"></i>
            <span>Pembelian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item @yield('obat')">
        <a class="nav-link" href="{{ route('obat.serverSide') }}">
            <i class="fas fa-fw fa-solid fa-pills"></i>
            <span>Data Obat</span></a>
    </li>

    @if (Auth::user()->is_admin)
    <li class="nav-item @yield('user')">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-solid fa-user"></i>
            <span>Data User</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Kontak
    </div>

    <li class="nav-item">
        <a class="nav-link" href="https://wa.me/6285217438182?text=Assalamualaikum bang">
            <i class="fas fa-fw fa-solid fa-mobile-screen-button"></i>
            <span>Hubungi Apoteker</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="https://wa.me/6281374501051?text=Assalamualaikum kak">
            <i class="fas fa-fw fa-solid fa-phone"></i>
            <span>Hubungi Dokter</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Others
     </div>

     <li class="nav-item">
        <a class="nav-link" href="{{ route('404') }}">
            <i class="fas fa-fw fa-solid fa-file-lines"></i>
            <span>Patch Notes</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
