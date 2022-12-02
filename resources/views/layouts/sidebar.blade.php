<ul class="sidebar-menu">
    <li class="menu-header">MASTER</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i><span>Master Data</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('mbrg') }}">Master Data Item</a></li>
            <li><a class="nav-link" href="{{ route('msatuan') }}">Master Satuan</a></li>
            <li><a class="nav-link" href="{{ route('mgrup') }}">Master Data Group</a></li>
            {{-- <li><a class="nav-link" href="{{ route('mmerk') }}">Master Merk</a></li> --}}
            <li><a class="nav-link" href="{{ route('mbank') }}">Master Bank</a></li>
            {{-- <li><a class="nav-link" href="{{ route('mcabang') }}">Master Cabang</a></li> --}}
            {{-- <li><a class="nav-link" href="{{ route('muser') }}">Master User</a></li> --}}
            <li><a class="nav-link" href="{{ route('mcust') }}">Master Data Customer</a></li>
            <li><a class="nav-link" href="{{ route('msupp') }}">Master Data Supplier</a></li>
            <li><a class="nav-link" href="{{ route('mwhse') }}">Master Data Lokasi</a></li>
        </ul>
    </li>
    <li class="menu-header">Transaction</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-exchange-alt"></i>
            <span>Transaction</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('transbelibrg') }}">Pembelian Barang</a></li>
            <li><a class="nav-link" href="{{ route('tbelibrglist') }}">Pembelian Barang List</a></li>
            {{-- <li><a class="nav-link" href="{{ route('tpengeluaranbrg') }}">Penjualan Barang</a></li>
            <li><a class="nav-link" href="{{ route('tpengeluaranbrglist') }}">Penjualan Barang List</a></li> --}}
            <li><a class="nav-link" href="{{ route('tpos') }}">Point of Sales</a></li>
            <li><a class="nav-link" href="{{ route('tposlist') }}">Point of Sales List</a></li>
            <li><a class="nav-link" href="{{ route('tbayaroperasional') }}">Pembayaran Operasional</a></li>
        </ul>
    </li>
    <li class="menu-header">Reports</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i>
            <span>Reports</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Laporan Penjualan</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Laporan Pembelian</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Laporan Stock</a></li>
        </ul>
    </li>
    {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
            <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
            <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
            <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
            <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
            <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
            <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
            <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
            <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
            <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
            <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
            <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
            <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
            <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
            <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
            <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
            <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
            <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
            <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
            <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
        </ul>
    </li> --}}
    {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
</ul> --}}

{{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
    </a>
</div> --}}