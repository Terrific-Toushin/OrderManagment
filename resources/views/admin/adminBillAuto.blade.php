@extends('admin.admin_layouts.index')
@section('main_section')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bill No Auto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-capitalize active">Auto</li>
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
                                <th>Auto</th>
                                {{-- <th></th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billAuto as $billAutos)
                                <tr>
                                    <td>{{$billAutos->auto}}</td>
                                    <td>
                                        @php
                                            $billAuto='Y'
                                        @endphp
                                        @if($billAutos->auto=='Y')
                                            @php
                                                $billAuto='N' 
                                            @endphp
                                        @endif
                                        <a href="{{ route('admin.billAutoUpdate', ['billNoAuto' => $billAuto])}}" class="btnprn" onclick="return confirm('Are you sure to cancel?')">
                                            <button type="button" class=" btn btn-info" >
                                                @if($billAutos->auto=='Y')
                                                    Turn Off
                                                @else
                                                    Turn On
                                                @endif
                                            </button>
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
@endsection