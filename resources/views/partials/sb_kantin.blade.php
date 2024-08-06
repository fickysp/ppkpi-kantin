<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #113f67;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kantin')}}">
        <div class="sidebar-brand-text mx-5">Kantin Digital</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('kantin') }}">
            <i class="fa-solid fa-bag-shopping"></i>
            <span>Dashboard Kantin</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('laporan.kantin') }}">
            <i class="fa-solid fa-file"></i>
            <span>Laporan Pembelian</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Barang
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-bars"></i>
            <span>Daftar Menu</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">lampiran :</h6>
                <a class="collapse-item" href="{{ route('menu.index') }}">Daftar Menu</a>
                <a class="collapse-item" href="{{ route('menu.create') }}">Tambah Menu</a>
            </div>
        </div>
    </li>

    <!-- Divider -->

    <!-- Heading -->

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>