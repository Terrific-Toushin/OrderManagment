@extends('kitchen.kitchen_layouts.index')
@section('inerHead')
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <style>

    /* Style the tab */
    .tabs {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tabs button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tabs button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tabs button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }

    /* Style the tab */
    .dispay {
      display: none;
    }
  </style>
@endsection
@section('main_section')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kitchen Pending KOT History</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kitchen Pending KOT History</li>
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
                        KOT History
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body foodTabcontent">
                        <table id="ALL"  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Bill No.</th>
                                    <th>Outlet</th>
                                    <th>Item Id</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Remark</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending_kots as $kots)
                                    <tr>
                                        <td>{{$kots->id}}</td>
                                        <td>{{$kots->billNo}}</td>
                                        <td>{{$kots->outlet}}</td>
                                        <td>{{$kots->repID}}</td>
                                        <td>{{$itemName[$kots->repID]}}</td>
                                        <td>{{$kots->qty}}</td>
                                        <td>{{$kots->remark}}</td>
                                        <td>{{$kots->date}}</td>
                                        <td>
                                            @if($kots->complete == 'N')
                                                <a href="{{ route('kitchen.kitchenCompleteKOT', ['id' => $kots->id]) }}" class="btnprn">
                                                    <button type="button" class=" btn btn-info" >Complete KOT</button>
                                                </a>
                                            @elseif($kots->complete == 'Y')
                                                <a href="#" class="btnprn">
                                                    <button type="button" class=" btn btn-success" >Completed</button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.ALL card-body -->
                </div>
                <!-- /. Card -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection



@section('inserJs')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('../assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->

    <script>
        $(function () {

            $("#ALL").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#ALL_wrapper .col-md-6:eq(0)');
        });

    </script>
@endsection
