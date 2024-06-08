@extends('admin.admin_layouts.index')
@section('main_section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-capitalize active"> Edit User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">

            <div class="col-md-9">
                <div class="card card-warning card-outline">
                    <div class="card-body ">
                        <div class="tab-pane" id="settings">
                            <form method="POST" action="{{ route('admin.userUpdate') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                                <spen id="msg">
                                    @if($msg=='userH')
                                        <div class="p-3 mb-2 bg-danger text-white">This username already exist.</div>
                                    @elseif($msg=='emailH')
                                        <div class="p-3 mb-2 bg-danger text-white">This email address already exist.</div>
                                    @elseif($msg=='success')
                                        <div class="p-3 mb-2 bg-success text-white">This user uodate successfully.</div>
                                    @endif

                                </spen>
                                <div class="form-group row">

                                    <input type="hidden" class="form-control" id="userEditID" name="userEditID" value="{{$userId}}" required>

                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{$name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="{{$username}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$email}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Phone" value="{{$phone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" name="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="role" id="role" required onchange="showOutlets()">
                                            <option value="admin"
                                                @if($role=='admin')
                                                    selected
                                                @endif
                                            >Admin</option>
                                            <option value="operator"
                                                @if($role=='operator')
                                                    selected
                                                @endif
                                            >Operator</option>
                                            <option value="kitchen"
                                                @if($role=='kitchen')
                                                    selected
                                                @endif
                                                >Kitchen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  id="outletsLabel" for="role" name="outlets" class="col-sm-2 col-form-label"  style="display: {{$role == 'operator' ? 'block' : 'none'}}">Outlets</label>
                                    <div id="outletsDiv" class="col-sm-10"  style="display: {{$role == 'operator' ? 'block' : 'none'}}">
                                        @foreach($outlets as $outlet)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="outlets[]" id="outlet-{{ $outlet->ResSL }}" value="{{ $outlet->ResSL }}" {{!empty($currentOutlets) && ($currentOutlets != "null") && array_search($outlet->ResSL, json_decode($currentOutlets,true)) !== false ? 'checked' : ''}}>
                                                <label class="form-check-label" for="outlet-{{ $outlet->ResSL }}">{{ $outlet->ResName }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  id="kitchenLabel" for="role" name="outlets" class="col-sm-2 col-form-label" style="display: {{$role == 'kitchen' ? 'block' : 'none'}}">Kitchen</label>
                                    <div id="kitchenDiv" class="col-sm-10" style="display: {{$role == 'kitchen' ? 'block' : 'none'}}">
                                        @foreach($kitchen as $kitchenOutlet)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="kitchens[]" id="outlet-{{ $kitchenOutlet }}" value="{{ $kitchenOutlet }}" {{!empty($currentOutlets) && ($currentOutlets != "null") && array_search($kitchenOutlet, json_decode($currentOutlets,true)) !== false ? 'checked' : ''}}>
                                                <label class="form-check-label" for="outlet-{{ $kitchenOutlet }}">{{ $kitchenOutlet }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agree" required> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info" onclick="return checkPassword()">Submit</button>
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
            var password=document.getElementById("password").value;
            var cpassword=document.getElementById("cpassword").value;
            if(password!=cpassword){
                document.getElementById("msg").innerHTML='<div class="p-3 mb-2 bg-danger text-white">Password and Confirm Password are not same. </div>';
                return false;
            }
        }
        function showOutlets(){
            let roleType = document.getElementById("role").value;
            if(roleType == 'operator' || roleType == 'kitchen'){
                document.getElementById('outletsDiv').style.display = 'block';
                document.getElementById('outletsLabel').style.display = 'block';
            }else {
                document.getElementById('outletsDiv').style.display = 'none';
                document.getElementById('outletsLabel').style.display = 'none';
            }
        }

    </script>

@endsection
