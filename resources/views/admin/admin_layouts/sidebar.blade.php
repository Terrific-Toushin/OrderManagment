<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('../assets/dist/img/NICELogo.png') }}" alt="Nice Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold  font-logo">NICE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (!empty($profileData->photo)) ? url('uploads/profile/'.$profileData->photo) :  url('uploads/profile/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ (!empty($profileData->name)) ? $profileData->name : 'Name Of Admin' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Uers
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.userList') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User Lists</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.createUser') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create New User</p>
                    </a>
                </li>
            </ul>
            </li>
            
            <li class="nav-header">Setting</li>

            <li class="nav-item">
                <a href="{{ route('admin.billAuto') }}" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>Bill No Auto</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    Profile
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('admin.changePassword') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
            {{-- <a href="#" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Log Out</p>
            </a> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"  class="nav-link" >
                <i class="nav-icon fas fa-power-off"></i>
                <p>Log Out</p>
                </button>
            </form>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>