<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{url('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="ion-android-home"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href=# class="nav-link {{ Request::is('record') || Request::is('role') ? 'active' : '' }}">
                <i class="ion-grid"></i>
                <p>
                    Account Management
                    <i class="right ion-android-arrow-dropleft"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class=" nav-item ">
                    <a href="{{url('record')}}" class="nav-link {{ Request::is('record') ? 'active' : '' }}">
                        <i class="ion-android-person"></i>
                        <p>User</p>
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
    </ul>
</nav>