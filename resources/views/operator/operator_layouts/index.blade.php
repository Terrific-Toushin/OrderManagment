<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Head -->
        @include('operator.operator_layouts.head')
        
        @yield('inerHead')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('../assets/dist/img/NICELogo.png') }}" alt="NICE Logo" height="60" width="60">
            </div>

            <!-- Navbar -->
            @include('operator.operator_layouts.navbar')
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('main_section')
            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
            @include('operator.operator_layouts.footer')
            <!-- /.Footer -->
            
        </div>
        <!-- ./wrapper -->

        <!-- Inside Js -->
        @include('operator.operator_layouts.insidejs')
        
        @yield('inserJs')
        <!-- /.Inside Js -->
    </body>
</html>
