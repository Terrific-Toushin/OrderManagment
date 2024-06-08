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
                    @php
                    $showVoid = true;
                    @endphp

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
                                        <th style="width: 40px">Status</th>
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
                                            <td>{{$allMenuItem['complete'] == 'Y' ? 'Completed' : 'Pending'}}</td>
                                            @php
                                                if ($allMenuItem['complete'] == 'Y' )
                                                $showVoid = false;
                                            @endphp
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
                                        <th style="width: 40px">Status</th>
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
                                            <td class="{{$allMenuItem_new['complete'] == 'Y' ? 'btn btn-success' : ''}}">{{$allMenuItem_new['complete'] == 'Y' ? 'Completed' : 'Pending'}}</td>
                                            @php
                                                if ($allMenuItem_new['complete'] == 'Y' )
                                                $showVoid = false;
                                            @endphp
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

                    <div class="card-body" id="printButton">
                        <div class="row">
                            @if($cancel == 'N' and $status!='2')
                                <div class="col-md-3">
                                    {{-- <a href="{{ route('operator.qtyPrintPriview', ['billNo' => $billNo]) }}" class="btnprn"> --}}
                                        <button type="button" class=" btn btn-info btn-block" onclick="printContent('printQTY')" >Print</button>
                                    {{-- </a> --}}
                                </div>
                                @if($showVoid)
                                    <div class="col-md-3">
                                        <a href="{{ route('operator.orderCancle', ['billNo' => $billNo]) }}" onclick="return confirm('Are you sure to cancel KOT?')">
                                            <button type="button" class="btn btn-danger btn-block" >KOT Void</button>
                                        </a>
                                    </div>
                                @endif
                                <div class="col-md-3">
                                    <a href="{{ route('operator.editOrderItem', ['billNo' => $billNo]) }}">
                                        <button type="submit" class="btn btn-primary btn-block" >Edit</button>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('operator.dashboard') }}" onclick="return confirm('Are you sure to cancel?')">
                                        <button type="button" class="btn btn-danger btn-block" >Exit</button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card mx-auto" id="printQTY" style="display: none">
                    <div class="card-header">
                        <center>
                            <h4>Kitchen Order Token</h4>
                            {{$terminal}}
                        </center>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table ">
                            <tr>
                                <td><strong>Date:</strong></td><td> {{$date}} </td>
                                <td><strong>Time:</strong></td><td> {{$time}} </td>
                            </tr>
                            <tr>
                                <td><strong>Bill No:</strong></td><td> {{$billNo}} </td>
                                <td><strong>T/R:</strong></td><td> {{$tableNo}}/{{$roomNo}} </td>
                            </tr>

                            @if(!empty($allMenuItems))
                                @foreach($allMenuItems as $allMenuItem)
                                    <tr>
                                        <td colspan="3"><strong>{{$allMenuItem['repname']}}</strong></td>
                                        <td>{{$allMenuItem['qty']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Remarks:</td>
                                        <td colspan="3"> </td>
                                    </tr>
                                @endforeach
                            @endif

                            @if(!empty($allMenuItems_new))
                                <tr>
                                    <td colspan="4">Add Item</td>
                                </tr>

                                @foreach($allMenuItems_new as $allMenuItem_new)
                                    <tr>
                                        <td colspan="3"><strong>{{$allMenuItem_new['repname']}}</strong></td>
                                        <td>{{$allMenuItem_new['qty']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Remarks:</td>
                                        <td colspan="3"> </td>
                                    </tr>
                                @endforeach
                            @endif

                            @if(!empty($cancel_allMenuItems))
                                <tr>
                                    <td colspan="4">Cancelled Item</td>
                                </tr>

                                @foreach($cancel_allMenuItems as $cancel_allMenuItem)
                                    <tr>
                                        <td colspan="3"><strong>{{$cancel_allMenuItem['repname']}}</strong></td>
                                        <td>{{$cancel_allMenuItem['qty']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Remarks:</td>
                                        <td colspan="3"> </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
@section('inserJs')
    <script type="text/javascript">
        // $(document).ready(function(){
        //     $('.btnprn').printPage();
        //     alert("Sam");
        // });


    </script>
@endsection
