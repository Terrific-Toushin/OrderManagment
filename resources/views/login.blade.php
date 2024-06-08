<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NICE | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('../assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../assets/dist/css/adminlte.min.css') }}">
  <!-- NICE Theme style for Login -->
  <link rel="stylesheet" href="{{ asset('../assets/dist/css/login_nice.css') }}">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="operator/dashboard" class="brand-link">
          <img src="{{ asset('../assets/dist/img/NICELogo.png') }}" alt="Nice Logo" class="brand-image-xl img-circle elevation-3" style="opacity: .8">
          <br>
          <span class="brand-text font-weight-bolder font-logo">NICE</span>
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" name="email" required autofocus autocomplete="username" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
{{--          <div class="form-group mb-3">--}}
{{--              <label>Please select an uotlet</label>--}}
{{--              <select class="form-control select2bs4" required  name="uotlet" >--}}
{{--                  <option selected="selected" value="">Select an uotlet</option>--}}
{{--                  @foreach($tblRestName_data as $tblRestName)--}}
{{--                      <option value="{{$tblRestName->ResSL}}">{{$tblRestName->ResName}}</option>--}}
{{--                  @endforeach--}}
{{--              </select>--}}
{{--          </div>--}}
          <!-- /.form-group -->
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('../assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('../assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('../assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
