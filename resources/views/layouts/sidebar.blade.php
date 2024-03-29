 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/cc.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIP2B</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">NAVIGATION</li>
          <li class="nav-item menu-open">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth()->user()->type == '0')
          <li class="nav-item">
            <a href="/admin/user" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Management User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/supplier" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Supplier
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/barang" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master Barang
              </p>
            </a>
          </li>
          @endif

          @if (auth()->user()->type == '0' || auth()->user()->type == '1')
          <li class="nav-item">
            <a href="/admin/mintabrg" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pemesanan Barang
              </p>
            </a>
          </li>
          @endif

          @if (auth()->user()->type == '0' || auth()->user()->type == '2')
          <li class="nav-item">
            <a href="/admin/barangmasuk" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Pengambilan Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/suratjalan" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Surat Jalan
              </p>
            </a>
          </li>
          @endif

          @if (auth()->user()->type == '0')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/lapstok" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/lapbarangmasuk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemesanan Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/lapbarangkeluar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengambilan Barang</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
