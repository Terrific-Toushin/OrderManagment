<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('admin.profile') }}" class="dropdown-item">
            <!-- Profile Details Start -->
            <div class="media">
              <img src="{{ (!empty($profileData->photo)) ? url('uploads/profile/'.$profileData->photo) :  url('uploads/profile/avatar.png') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ (!empty($profileData->name)) ? $profileData->name : 'Name Of Admin' }}
                  {{-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> --}}
                </h3>
                <p class="text-sm">{{ (!empty($profileData->role)) ? $profileData->role : ' ' }}</p>
                <p class="text-sm">Satting</p>
              </div>
            </div>
            <!-- Profile Details End -->
          </a>
          <div class="dropdown-divider"></div>

          <a href="{{ route('admin.changePassword') }}" class="dropdown-item">
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