<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background-color: #113f67;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Kantin Digital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('account.show', ['id' => Auth::id()]) }}">
                    <i class="fa-solid fa-shop"></i>
                    <span>Kantin</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('trans', ['id' => Auth::id()]) }}">
                    <i class="fa-solid fa-credit-card"></i>
                    <span>Transaksi</span>
                </a>
            </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan Transaksi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-file"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan:</h6>
                        <a class="collapse-item" href="{{ route('laporanU.bank', ['id' => Auth::id()]) }}">Transaksi
                            Bank</a>
                        <a class="collapse-item" href="{{ route('laporanU.kantin', ['id' => Auth::id()]) }}">Transaksi
                            Kantin</a>
                    </div>
                </div>
            </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
