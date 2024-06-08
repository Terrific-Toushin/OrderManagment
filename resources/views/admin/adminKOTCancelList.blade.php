@extends('admin.admin_layouts.index')
@section('main_section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-capitalize active">User List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body card-warning card-outline foodTabcontent ">

                    <table id="ALL"  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bill No.</th>
                                <th>T/R</th>
                                <th>Terminal</th>
                                <th>Serve Time</th>
                                <th>PAX</th>
                                <th>Water Name</th>
                                <th>Gust Name</th>
                                <th>Company Name</th>
                                <th>E-mail</th>
                                <th>Contact No</th>
                                {{-- <th></th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kot_Cancel_List as $kots)
                                <tr>
                                    <td>{{$kots->billNo}}</td>
                                    <td>{{$kots->tableNo}}{{$kots->roomNo}}</td>
                                    <td>{{$kots->terminal}}</td>
                                    <td>{{$kots->serveTime}}</td>
                                    <td>{{$kots->pax}}</td>
                                    <td>{{$kots->waterName}}</td>
                                    <td>{{$kots->gustName}}</td>
                                    <td>{{$kots->companyName}}</td>
                                    <td>{{$kots->email}}</td>
                                    <td>{{$kots->contactNo}}</td>
                                    {{-- <td>
                                        <a href="{{ route('operator.sendToKOT', ['billNo' => $kots->billNo]) }}" class="btnprn">
                                            <button type="button" class=" btn btn-info" >Send To Cash</button>
                                        </a>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('admin.kotCancelRevers', ['billNo' => $kots->billNo]) }}" class="btnprn" onclick="return confirm('Are you sure to cancel?')">
                                            <button type="button" class=" btn btn-info" >Revers Cancel</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div> 
                <!-- /.col -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
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