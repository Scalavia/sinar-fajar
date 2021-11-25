<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light ml-5"><b> SINAR</b> FAJAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{ asset('vendor/AdminLTE-3.1.0') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info ml-2">
          <a href="{{ url('/profile/'.Auth::user()->id) }}" class="d-block"><b> {{ Auth::user()->name }}</b> <br> {{ strtoupper(Auth::user()->role) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MAIN NAVIGATION</li>
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
              <i class="nav-icon fab fa-dashcube"></i>
              <p>
                Dashboard
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @if (Auth::check() && Auth::user()->role == "admin")
            <li class="nav-header">BARANG NAVIGATION</li>
            <li class="nav-item">
              <a href="{{ url('/barang') }}" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Barang
                  {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/kategori') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Kategori Barang
                </p>
              </a>
            </li>
            <li class="nav-header">TRANSAKSI NAVIGATION</li>
            <li class="nav-item">
              <a href="{{ url('/transaksi') }}" class="nav-link">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>
                  Transaksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/riwayat_transaksi') }}" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                  Riwayat Transaksi
                </p>
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a href="{{ url('/laporan') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            <li class="nav-header">AKUN NAVIGATION</li>
            <li class="nav-item">
              <a href="{{ url('/akun') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Akun
                </p>
              </a>
            </li>
          @else
          <li class="nav-header">BARANG NAVIGATION</li>
          <li class="nav-item">
            <a href="{{ url('/stok') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stok
              </p>
            </a>
          </li>
          <li class="nav-header">TRANSAKSI NAVIGATION</li>
          <li class="nav-item">
            <a href="{{ url('/transaksi') }}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/riwayat_transaksi') }}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Riwayat Transaksi
              </p>
            </a>
          </li>
          @endif
          {{-- <li class="nav-item">
            <a href="{{ url('/supplier') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Supplier
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
