<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image "
         >
    <span class="brand-text font-weight-light"> Admin Bulog</span>
  </a>
 
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset ('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->fullname }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{route('admin')}}" class="nav-link {{ request()->is('admin*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
            </a>
          </li>
          
          <li class="nav-item">
          <a href="{{route('product.index')}}" class="nav-link {{ request()->is('product*') ? 'active' : '' }} ">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Produk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('category.index')}}" class="nav-link {{ request()->is('category*') ? 'active' : '' }}   ">
            <i class="nav-icon fas fa-th-large"></i>
            <p>
              Kategori
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('promo.index')}}" class="nav-link {{ request()->is('promo*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-gift"></i>
            <p>
              Promo
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}"  class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">

          
            <i class="nav-icon fas fa-power-off t"></i>
            <p>
              Logout
            </p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>