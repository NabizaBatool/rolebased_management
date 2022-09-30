<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset ('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{asset ('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
    </div>
</div>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{url('main')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="ion-android-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href=# class="nav-link {{ Request::is('users') || Request::is('customers') ? 'active' : '' }}">
                <i class="ion-grid"></i>
                <p>
                    Account Management
                    <i class="right ion-android-arrow-dropleft"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class=" nav-item ">
                    <a href="{{url('users')}}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                        <i class="ion-android-person"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a href="{{url('customers')}}" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                        <i class="ion-android-person"></i>
                        <p>Customer</p>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a href=# class="nav-link">
                        <i class="ion-ios-people-outline"></i>
                        <p>Role</p>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item menu-open">
            <a href=# class="nav-link {{ Request::is('api/stores') || Request::is('api/storeoutlets') ? 'active' : '' }}">
                <i class="ion-grid"></i>
                <p>
                    Stores Management
                    <i class="right ion-android-arrow-dropleft"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class=" nav-item ">
                    <a href="{{url('api/stores')}}" class="nav-link {{ Request::is('api/stores') ? 'active' : '' }}">
                        <i class="ion-ios-cart"></i>
                        <p>Stores</p>
                    </a>
                </li>
                <li class=" nav-item ">
                    <a href="{{url('api/storeoutlets')}}" class="nav-link {{ Request::is('api/storeoutlets') ? 'active' : '' }}">
                        <i class="ion-android-cart"></i>
                        <p>Store Outlet</p>
                    </a>
                </li>
                
            </ul>
        </li>
    </ul>
</nav>
  </div>
</aside>