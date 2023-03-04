  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin-lte/dist/img/mampirme.png')}}" alt="AdminLTE Logo" class="brand-image "
            style="opacity: .8">
        <span class="brand-text font-weight-light">RB</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin-lte/dist/img/boxed-bg.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Administrator</a>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                {{-- href="{{ route('home') }}" --}}
            <li class="nav-item">
                <a href="" class="nav-link {{Request::path() == 'administrator/home' ? 'active' : ''}}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">MANAJEMEN PRODUK</li>
            
        
            <li class="nav-item">

                {{-- {{ route('product.index') }} --}}
                <a href="{{ route('product.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Produk</p>
                </a>
            </li>
            <li class="nav-item">
                {{-- {{ route('orders.index') }} --}}
                <a href="{{ route('donation.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Pesanan</p>
                </a>
            </li>

            <li class="nav-item">
                {{-- {{ route('orders.index') }} --}}
                <a href="{{ route('logout') }}" class="btn btn-danger">logout</a>
                
            </li>

           
            
           
            
           
        
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->