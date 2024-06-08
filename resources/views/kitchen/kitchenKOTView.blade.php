@extends('operator.operator_layouts.index')
@section('inerHead')
    <script type="text/javascript" src="../assets/dist/js/jquery.printPage.js"></script>

    <script type="text/javascript">
        

        function printContent(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection 

@section('main_section')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">KOT View</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">KOT View</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">

                <div class="card mx-auto">
                    <div class="card-header">
                        <h3 class="card-title">Order details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table ">
                            <tr>
                                <td><strong>Bill No :</strong></td><td> {{$billNo}} </td>
                                <td><strong>Table No. :</strong></td><td> {{$tableNo}} </td>
                                <td><strong>Room No. :</strong></td><td> {{$roomNo}} </td>
                            </tr>
                            <tr>
                                <td><strong>Terminal :</strong></td><td> {{$terminal}} </td>
                                <td><strong>Serve Time :</strong></td><td> {{$serveTime}} </td>
                                <td><strong>PAX :</strong></td><td> {{$pax}} </td>
                            </tr>
                            <tr>
                                <td><strong>Water Name :</strong></td><td> {{$waterName}} </td>
                                <td><strong>Gust Name :</strong></td><td  colspan="3"> {{$gustName}} </td>
                            </tr>
                            <tr>
                                <td><strong>Company Name :</strong></td><td> {{$companyName}} </td>
                                <td><strong>E-mail :</strong></td><td> {{$email}} </td>
                                <td><strong>Contact No. :</strong></td><td> {{$contactNo}} </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->

                    @if(!empty($allMenuItems))
                        <div class="card-header">
                            <h3 class="card-title">Item details</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th style="width: 40px">Price(s)</th>
                                        <th style="width: 40px">Qty</th>
                                        <th style="width: 40px">Kitchen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allMenuItems as $allMenuItem)
                                        <tr>
                                            <td>{{$itencount++}}</td>
                                            <td>{{$allMenuItem['repID']}}</td>
                                            <td>{{$allMenuItem['repname']}}</td>
                                            <td>{{$allMenuItem['price']}}</td>
                                            <td>{{$allMenuItem['qty']}}</td>
                                            <td>{{$allMenuItem['kitchen']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    @endif

                    @if(!empty($allMenuItems_new))
                        <div class="card-header">
                            <h3 class="card-title">Add Item</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th style="width: 40px">Price(s)</th>
                                        <th style="width: 40px">Qty</th>
                                        <th style="width: 40px">Kitchen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allMenuItems_new as $allMenuItem_new)
                                        <tr>
                                            <td>{{$itencount_new++}}</td>
                                            <td>{{$allMenuItem_new['repID']}}</td>
                                            <td>{{$allMenuItem_new['repname']}}</td>
                                            <td>{{$allMenuItem_new['price']}}</td>
                                            <td>{{$allMenuItem_new['qty']}}</td>
                                            <td>{{$allMenuItem_new['kitchen']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    @endif

                    
                    @if(!empty($cancel_allMenuItems))
                        <div class="card-header">
                            <h3 class="card-title">Cancelled Item</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th style="width: 40px">Price(s)</th>
                                        <th style="width: 40px">Qty</th>
                                        <th style="width: 40px">Kitchen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cancel_allMenuItems as $cancel_allMenuItem)
                                        <tr>
                                            <td>{{$cancel_itencount++}}</td>
                                            <td>{{$cancel_allMenuItem['repID']}}</td>
                                            <td>{{$cancel_allMenuItem['repname']}}</td>
                                            <td>{{$cancel_allMenuItem['price']}}</td>
                                            <td>{{$cancel_allMenuItem['qty']}}</td>
                                            <td>{{$cancel_allMenuItem['kitchen']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    @endif

                </div>
                <!-- /.card -->
                
                
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
@endsection
@section('inserJs')
@endsection