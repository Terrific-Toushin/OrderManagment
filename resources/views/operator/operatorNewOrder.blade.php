@extends('operator.operator_layouts.index')
@section('main_section')

    <!-- Content Header (Page header) -->
    <div class="content-header"  style="margin-bottom:20px;">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Order</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">New Order</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content"  style="display:inline-block;margin-bottom:20px;">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Screen2 -->
                <div class="col-lg-6  mx-auto" id="outlate_Screen2" aria-labelledby="headingThree">
                    <div class="outlate">
                        
                        <form method="POST" id="newOrderForm" action="{{ route('operator.newOrderItem') }}">
                            @csrf
                            <!-- Screen2 -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="far fa-plus-square"></i>  New Order</h3>
                        
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#outlate_select,#outlate_select2" aria-expanded="true" aria-controls="outlate_select">
                                            <i class="fas fa-back"><</i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button> --}}
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 form-group" id='errMsg'>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Bill No</label> 
                                                            (<spen id="pbill">{{$bill_No}}</spen>)
                                                        <input type="text" id="billNo" name="billNo" class=form-control  select2bs4" 
                                                        @if($billauto=="Y")
                                                            value="{{$bill_No+1}}"
                                                        @endif
                                                        required>
                                            
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Table No.</label>
                                                        <input type="text" id="tableNo" name="tableNo" class="form-control select2bs4" onkeypress="onTableNo()" >
                                                      
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Room No.</label>
                                                        
                                                        <input type="text" id="roomNo" name="room" list="roomname" class="form-control select2bs4" onkeypress="onRoomNo()" onclick="onRoomNo()" >
                                                        <datalist id="roomname">
                                                            @foreach($tblGuestInfo_data as $tblGuestInfo)
                                                                <option value="{{$tblGuestInfo->fldRoom}}">
                                                            @endforeach
                                                        </datalist>


                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Terminal</label>
                                                        <select class="form-control select2bs4" name="terminal" required>
                                                            <option selected="selected" value="Restaurant">Restaurant</option>
                                                            <option value="Restaurant">Restaurant</option>
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Serve Time</label>
                                                        <select class="form-control select2bs4" name="serveTime" required>
                                                            <option selected="selected" value="Breakfast">Breakfast</option>
                                                            <option value="Lunch">Lunch</option>
                                                            <option value="Dinner">Dinner</option> 
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>PAX</label>
                                                        <input type="number" class="form-control select2bs4" name="pax" value="1" min="1" required>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Water Name</label>
                                                        <input type="text" class="form-control select2bs4" name="waterName" value="{{$userOperator}}" list="waterName" required>
                                                        <datalist id="waterName">
                                                            @foreach($tblWaiter_data as $tblWaiter)
                                                                <option value="{{$tblWaiter->Name}}">
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Gust Name</label>
                                                        <input type="text" class="form-control select2bs4" name="gustName" list="gustName">
                                                        <datalist id="gustName">
                                                            @foreach($tblGuestInfo_data as $tblGuestInfo)
                                                                <option value="{{$tblGuestInfo->fldGuestName}}">
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control select2bs4" name="companyName" list="companyName">
                                                            <datalist id="companyName">
                                                                <option value="Nice Softwer">
                                                            </datalist>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control select2bs4"  name="email">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contact No.</label>
                                                        <input type="text" class="form-control select2bs4"  name="contactNo">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <a href="{{ route('operator.dashboard') }}">
                                                <button type="button" class="btn btn-danger btn-block" >Exit</button>
                                            </a>
                                        </div>
                                        <div class="col-md-6 ">
                                            <button type="submit" id="submit" class="btn btn-primary btn-block" onclick="return checkBillNo()">Next</button>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </form>
                        <!-- /.form -->
                    </div>
                    <!-- /.outlate_ -->
                </div>
                <!-- /.outlate_Screen2 -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('inserJs')
    <script>

        function checkBillNo(){
            var pbillNo=Number(document.getElementById("pbill").innerHTML);
            var billNo=Number(document.getElementById("billNo").value);  
            var tableNo=Number(document.getElementById("tableNo").value);  
            var roomNo=Number(document.getElementById("roomNo").value);  
            if(pbillNo>=billNo){
                alert('New bill No must be greater than previous bill no');
                return false;
            }
            
            if(roomNo!=""){
                //alert(roomNo);
            }
            
            if(tableNo!=""){
                $.ajax({
                    url:'{{ route('operator.tableExist') }}',
                    method:'GET',
                    data:{tableNo:tableNo},
                    success:function(res){
                        if(res=='true'){
                            alert('This Table No already occupied');
                            return false;
                        }
                    }
                });
            }
            
        }

        function onTableNo(){
            var roomNo = document.getElementById("roomNo")
            roomNo.value=""; 
            roomNo.required = false; 
            
            var tableNo = document.getElementById("tableNo")
            tableNo.required = true; 
        }

        function onRoomNo(){
            var tableNo = document.getElementById("tableNo")
            tableNo.value=""; 
            tableNo.required = false;

            
            var roomNo = document.getElementById("roomNo")
            roomNo.required = true; 
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('keyup','#tableNo',function(e){
            e.preventDefault();
            let tableNo_string = $('#tableNo').val();

            $.ajax({
                url:'{{ route('operator.tableExist') }}',
                method:'GET',
                data:{tableNo:tableNo_string},
                success:function(res){
                    if(res=='true'){
                        $('#errMsg').html('<div class="alert alert-danger" role="alert">This Table No already occupied</div>');
                    }else{
                        $('#errMsg').html('');
                    }
                }
            });
        });

        $(document).on('keyup','#roomNo',function(e){
            e.preventDefault();
            let roomNo_string = $('#roomNo').val();
            
            $.ajax({
                url:'{{ route('operator.roomExist') }}',
                method:'GET',
                data:{roomNo:roomNo_string},
                success:function(res){
                    if(res=='true'){
                        $('#errMsg').html('<div class="alert alert-danger" role="alert">This Room No already occupied</div>');
                    }else{
                        $('#errMsg').html('');
                    }
                }
            });
        });

        $(document).on('click','#roomNo',function(e){
            e.preventDefault();
            let roomNo_string = $('#roomNo').val();
            
            $.ajax({
                url:'{{ route('operator.roomExist') }}',
                method:'GET',
                data:{roomNo:roomNo_string},
                success:function(res){
                    if(res=='true'){
                        $('#errMsg').html('<div class="alert alert-danger" role="alert">This Room No already occupied</div>');
                    }else{
                        $('#errMsg').html('');
                    }
                }
            });
        });
    </script>

@endsection