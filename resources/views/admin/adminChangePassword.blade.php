@extends('admin.admin_layouts.index')
@section('main_section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-capitalize active"> {{ (!empty($profileData->role)) ? $profileData->role : 'User' }} Change Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                {{-- src="{{ asset('../assets/dist/img/user4-128x128.jpg') }}" --}}
                                src="{{ (!empty($profileData->photo)) ? url('uploads/profile/'.$profileData->photo) :  url('uploads/profile/avatar.png') }}"
                                alt="profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ (!empty($profileData->name)) ? $profileData->name : 'Name Of Admin' }}</h3>

                        <p class="text-muted text-center">{{ (!empty($profileData->role)) ? $profileData->role : 'Name Of Admin' }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>User Name</b> <a class="float-right">{{ (!empty($profileData->username)) ? $profileData->username : '' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b> <a class="float-right">{{ (!empty($profileData->email)) ? $profileData->email : '' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">{{ (!empty($profileData->phone)) ? $profileData->phone : '' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Address</b> <a class="float-right">{{ (!empty($profileData->address)) ? $profileData->address : '' }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-warning card-outline">
                    <div class="card-body ">
                        <div class="tab-pane" id="settings">
                            
                            <form method="POST" action="{{ route('admin.changePasswordSave') }}" class="form-horizontal">
                            @csrf
                                
                                <spen id="msg">
                                    @if($msg!='')
                                        <div class="p-3 mb-2 bg-success text-white">Password change successfully</div>
                                    @endif
                                    
                                </spen>

                                {{-- <div class="form-group row">
                                    <label for="inputOldPassword" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputOldPassword" placeholder="Old Password">
                                    </div>
                                </div>  --}}

                                <div class="form-group row">
                                    <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="inputNewPassword" placeholder="New Password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                
                                {{-- <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                        <label>
                                            <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger" onclick="return checkPassword()">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('inserJs')
    <script>

        function checkPassword(){
            var password=document.getElementById("inputNewPassword").value;
            var cpassword=document.getElementById("inputConfirmPassword").value;  
            if(password!=cpassword){
                document.getElementById("msg").innerHTML='<div class="p-3 mb-2 bg-danger text-white">Password and Confirm Password are not same. </div>';
                return false;
            }
        }
  
    </script>

@endsection