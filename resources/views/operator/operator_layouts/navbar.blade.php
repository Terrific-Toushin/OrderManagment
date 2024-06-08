<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item">
            <a href="{{ route('operator.dashboard') }}" class="brand-link">
                <img src="{{ asset('../assets/dist/img/NICELogo.png') }}" alt="Nice Logo" class="brand-image-xl img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bolder font-logo">NICE</span>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- New Order Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('operator.newOrder') }}">
                <button  type="button" class="btn-xs btn-block btn-primary">
                    <i class="far fa-plus-square"></i>
                    New Order
                </button>
            </a>
        </li>
        <!-- Order Histry -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('operator.orderHistry') }}">
                <button  type="button" class="btn-xs btn-block btn-dark">
                    <!-- <i class="far fa-book-open'"></i> -->
                    <svg xmlns="book.svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                    Order History
                </button>
            </a>
        </li>
        <!-- Profile Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('operator.profile') }}" class="dropdown-item">
                    <!-- Profile Details Start -->
                    <div class="media">
                        <img src="{{ (!empty($profileData->photo)) ? url('uploads/profile/'.$profileData->photo) :  url('uploads/profile/avatar.png') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ (!empty($profileData->name)) ? $profileData->name : 'Name Of Admin' }}
                            </h3>
                            <p class="text-sm">{{ (!empty($profileData->role)) ? $profileData->role : ' ' }}</p>
                            <p class="text-sm">Satting</p>
                        </div>
                    </div>
                    <!-- Profile Details End -->
                </a>
                <div class="dropdown-divider"></div>

                
                <a href="{{ route('operator.changePassword') }}" class="dropdown-item">
                    <!-- Profile Details Start -->
                    <i class="nav-icon fas fa-gear"></i>
                    Change Password
                    <!-- Profile Details End -->
                </a>
                
                <div class="dropdown-divider"></div>
                {{-- <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer">
                    <i class="nav-icon fas fa-power-off"></i>
                    Log Out
                </a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"  class="dropdown-item dropdown-footer" >
                      <i class="nav-icon fas fa-power-off"></i>
                      Log Out
                    </button>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->