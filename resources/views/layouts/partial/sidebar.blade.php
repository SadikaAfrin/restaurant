<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('slider.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('slider.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('slider.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('item.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Item
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('item.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('item.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('specialmanu.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Specialmanu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('specialmanu.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Specialmanu All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('specialmanu.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Specialmanu Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('reservation.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Reservation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reservation.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reservation All</p>
                </a>
              </li>
            </ul>
          </li>
             
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
              </li>
            </ul>
          </li>
              
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>