<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
    @include('admin.admin_layouts.head')
</head>
  <body class="hold-transition sidebar-mini layout-fixed">
      <!-- wrapper -->
      <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="{{ asset('../assets/dist/img/NICELogo.png') }}" alt="NICELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('admin.admin_layouts.navbar')
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        @include('admin.admin_layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          @yield('main_section')
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('admin.admin_layouts.footer')
        <!-- /.Footer -->

          
      </div>
      <!-- ./wrapper -->
      
      <!-- Inside js -->
      @include('admin.admin_layouts.insidejs')

      @yield('inserJs')
      <!-- /.Inside Js -->
  </body>
</html>
