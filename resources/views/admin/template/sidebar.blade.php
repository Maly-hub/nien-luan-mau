<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin-template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MALY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin-template') }}/dist/img/maly.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">THACH THI MALY</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('danh-sach-loai') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Loại sản phẩm
              </p>
            </a>

            <a href="{{ route('san-pham') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Sản phẩm
                </p>
            </a>

            <a href="{{ route('don-hang') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Đơn hàng
                </p>
            </a>

            <a href="{{ route('thong-ke') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Thống kê
                </p>
            </a>

            <a href="{{ route('khach-hang') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Khách hàng
                </p>
            </a>

            <a href="{{ route('logout') }}" class="nav-link">
                <i style="padding:2px" class="nav-icon fa fa-undo" aria-hidden="true"></i>
                <p>
                  Đăng xuất
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
