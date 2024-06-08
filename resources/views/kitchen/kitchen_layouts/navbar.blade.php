<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item">
            <a href="{{ route('kitchen.dashboard') }}" class="brand-link">
                <img src="{{ asset('../assets/dist/img/NICELogo.png') }}" alt="Nice Logo" class="brand-image-xl img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bolder font-logo">NICE</span>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Profile Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('kitchen.profile') }}" class="dropdown-item">
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

                
                <a href="{{ route('kitchen.changePassword') }}" class="dropdown-item">
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