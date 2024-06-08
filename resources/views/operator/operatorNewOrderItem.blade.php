@extends('operator.operator_layouts.index')
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

    /* Hide the spinners for all number inputs */
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield; /* Firefox */
    }

    /* Make buttons and input field the same height */
    .input-custom-group .btn {
        height: 36px;
        margin-top: .2vh; /* Same height for input and buttons */
    }

    /* Center the number vertically in the input field */
    .input-group .form-control {
        display: flex;
        align-items: center;
        text-align: center;
        padding: 0; /* Reset padding */
    }

    .input-group .form-control::placeholder {
        text-align: center;
    }
  </style>
@endsection
@section('main_section')

    <!-- Content Header (Page header) -->
    <div class="content-header">
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
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Screen 1 -->
                <div class="col-lg-6" id="outlate_select">
                  <div class="card">
                    <div class="tabs">
                      <button class="tablinks active" onclick="openCity(event, 'ALL')">ALL</button>
                      @foreach($kitchen as $kitchen_type)
                        <button class="tablinks" onclick="openCity(event, '{{str_replace(' ', '_', $kitchen_type)}}')">{{$kitchen_type}}</button>

                      @endforeach
                    </div>
                    <div id="ALL" class="tabcontent" style="display: block;">
                      <div class="card-header">
                        <button type="outlate_next" class="btn btn-danger foodTablinks" onclick="foodType(event, 'ALL_FOOD')">ALL</button>
                        <button type="outlate_next" class="btn btn-default foodTablinks" onclick="foodType(event, 'FOOD')">FOOD</button>
                        <button type="outlate_next" class="btn btn-default foodTablinks" onclick="foodType(event, 'BEVERAGE')">BEVERAGE</button>
                      </div>
                      <!-- /.card-header -->
                      <div id="ALL_FOOD" class="card-body foodTabcontent">
                        <table id="ALL_F" class="table table-bordered table-striped">
                          <thead>
                            <tr>
{{--                              <th>ID</th>--}}
                              <th>Name</th>
                              <th>Price(s)</th>
                              <th>Kitchen</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($tblMenu_data as $tblMenu)
                                <tr>
{{--                                  <td>{{$tblMenu->repid}}</td>--}}
                                  <td>{{$tblMenu->repname}}</td>
                                  <td>{{ number_format((float)($tblMenu->price), 2)}}</td>
                                  <td>{{$tblMenu->kitchen}}</td>
                                  <td><button id="add-{{$tblMenu->repid}}" type="outlate_next" class="btn btn-info btn-block" onclick="addItem('{{$tblMenu->repid}}','{{$tblMenu->repname}}','{{number_format((float)($tblMenu->price), 2)}}','{{number_format((float)($tblMenu->itemcost), 2)}}','{{$tblMenu->kitchen}}')" >Add</button></td>

                                </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                      <!-- /.ALL card-body -->

                      <!-- /.FOOD card-header -->
                      <div id="FOOD" class="card-body foodTabcontent dispay">
                        <table id="ALL_F_F" class="table table-bordered table-striped">
                          <thead>
                            <tr>
{{--                              <th>ID</th>--}}
                              <th>Name</th>
                              <th>Price(s)</th>
                              <th>Kitchen</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($tblMenu_data as $tblMenu)
                              @if($tblMenu->foodtype=="FOOD")
                                <tr>
{{--                                  <td>{{$tblMenu->repid}}</td>--}}
                                  <td>{{$tblMenu->repname}}</td>
                                  <td>{{$tblMenu->price}}</td>
                                  <td>{{$tblMenu->kitchen}}</td>
                                  <td><button id="add-{{$tblMenu->repid}}" type="outlate_next" class="btn btn-info btn-block" onclick="addItem('{{$tblMenu->repid}}','{{$tblMenu->repname}}','{{number_format((float)($tblMenu->price), 2)}}','{{number_format((float)($tblMenu->itemcost), 2)}}','{{$tblMenu->kitchen}}')" >Add</button></td>

                                </tr>
                              @endif
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                      <!-- /.FOOD card-body -->

                      <!-- /.BEVERAGE card-header -->
                      <div  id="BEVERAGE" class="card-body foodTabcontent dispay">
                        <table id="ALL_F_B" class="table table-bordered table-striped">
                          <thead>
                            <tr>
{{--                              <th>ID</th>--}}
                              <th>Name</th>
                              <th>Price(s)</th>
                              <th>Kitchen</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($tblMenu_data as $tblMenu)
                              @if($tblMenu->foodtype=="BEVERAGE")
                                <tr>
{{--                                  <td>{{$tblMenu->repid}}</td>--}}
                                  <td>{{$tblMenu->repname}}</td>
                                  <td>{{$tblMenu->price}}</td>
                                  <td>{{$tblMenu->kitchen}}</td>
                                  <td><button id="add-{{$tblMenu->repid}}" type="outlate_next" class="btn btn-info btn-block" onclick="addItem('{{$tblMenu->repid}}','{{$tblMenu->repname}}','{{number_format((float)($tblMenu->price), 2)}}','{{number_format((float)($tblMenu->itemcost), 2)}}','{{$tblMenu->kitchen}}')" >Add</button></td>
                                </tr>
                              @endif
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                      <!-- /.BEVERAGE card-body -->
                    </div>


                    @foreach($kitchen as $kitchen_type)
                      <div id="{{str_replace(' ', '_', $kitchen_type)}}" class="tabcontent">
                        {{-- <div class="card-header">
                          <button type="outlate_next" class="btn btn-danger " >ALL</button>
                          <button type="outlate_next" class="btn btn-default" >FOOD</button>
                          <button type="outlate_next" class="btn btn-default" >BEVERAGE</button>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="{{str_replace(' ', '_', $kitchen_type).'_1'}}" class="table table-bordered table-striped">
                            <thead>
                              <tr>
{{--                                <th>ID</th>--}}
                                <th>Name</th>
                                <th>Price(s)</th>
                                <th>Kitchen</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($tblMenu_data as $tblMenu)
                                @if($tblMenu->kitchen==$kitchen_type)
                                  <tr>
{{--                                    <td>{{$tblMenu->repid}}</td>--}}
                                    <td>{{$tblMenu->repname}}</td>
                                    <td>{{$tblMenu->price}}</td>
                                    <td>{{$tblMenu->kitchen}}</td>
                                    <td><button id="add-{{$tblMenu->repid}}" type="outlate_next" class="btn btn-info btn-block" onclick="addItem('{{$tblMenu->repid}}','{{$tblMenu->repname}}','{{number_format((float)($tblMenu->price), 2)}}','{{number_format((float)($tblMenu->itemcost), 2)}}','{{$tblMenu->kitchen}}')" >Add</button></td>
                                  </tr>
                                @endif
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>

                    @endforeach
                  </div>
                </div>
                <!-- /. Screen 1 -->
                <!-- Screen2 -->
                <div class="col-lg-6  mx-auto" id="outlate_Screen2" aria-labelledby="headingThree">

                        <form method="POST" action="{{ route('operator.newOrderItemSave') }}">
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
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Bill No.</label>
                                                  <input type="text" name="billNo" class="form-control bg-dark select2bs4" value="{{$billNo}}" required readonly>
                                                </div>
                                                <!-- /.form-group -->
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Table No.</label>
                                                  <input type="text" name="tableNo" class="form-control bg-dark select2bs4" value="{{$tableNo}}" readonly>
                                                </div>
                                                <!-- /.form-group -->
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Room No.</label>
                                                  <input type="text" name="room" class="form-control bg-dark select2bs4" value="{{$room}}" readonly>
                                                </div>
                                                <!-- /.form-group -->
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Terminal</label>
                                                  <input type="text" class="form-control bg-dark select2bs4" name="terminal" value="{{$terminal}}" required readonly>
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
                                                  <input type="text" class="form-control bg-dark select2bs4" name="serveTime" value="{{$serveTime}}"  required readonly>
                                                </div>
                                                <!-- /.form-group -->
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>PAX</label>
                                                  <input type="text" class="form-control bg-dark select2bs4" name="pax" value="{{$pax}}" required readonly>
                                                </div>
                                                <!-- /.form-group -->
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Water Name</label>
                                                  <input type="text" class="form-control bg-dark select2bs4" name="waterName" value="{{$waterName}}" required readonly>
                                                </div>
                                                <!-- /.form-group -->
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Gust Name</label>
                                                  <input type="text" class="form-control bg-dark select2bs4" name="gustName" value="{{$gustName}}" required readonly>
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
                                                        <select class="form-control bg-dark select2bs4" name="companyName" value="{{$companyName}}" required readonly>
                                                            <option selected="selected">Nice Softwer</option>
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control bg-dark select2bs4" name="email" value="{{$email}}" readonly>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contact No.</label>
                                                        <input type="text" class="form-control bg-dark select2bs4"  name="contactNo" value="{{$contactNo}}" required readonly>
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
                                <div class="card-body">
                                  <input type="hidden" id="itemCount" name="itemCount" value="0">
                                      <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr>
                                            <th style="display: none">ID</th>
                                            <th>Name</th>
                                            <th>Price(s)</th>
                                            <th>Qty</th>
                                            <th>Kitchen</th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody id="itemTable">

                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <td colspan="6">
                                              <div class="form-group row">
                                                <label for="total" class="col-sm-2 col-form-label">Totel :</label>
                                                <div class="col-sm-10">
                                                  <input type="text" readonly class="form-control-plaintext" id="total" value="0">
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                        </tfoot>
                                      </table>
                                </div>
                                <!-- /.card-header for itemTable-->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                          <a href="{{ route('operator.dashboard') }}" onclick="return confirm('Are you sure to cancel?')">
                                            <button type="button" class="btn btn-danger btn-block" >Exit</button>
                                          </a>
                                        </div>
                                        <div class="col-md-6 ">
                                          <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Are you sure to complete your order?')">KOT Submit</button>
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
                <!-- /.outlate_Screen2 -->
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
        // $("#example1").DataTable({
        //   "responsive": true, "lengthChange": false, "autoWidth": false,
        //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#ALL_F").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ALL_F_wrapper .col-md-6:eq(0)');

        $("#ALL_F_F").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ALL_F_F_wrapper .col-md-6:eq(0)');

        $("#ALL_F_B").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ALL_F_B_wrapper .col-md-6:eq(0)');

        @foreach($kitchen as $kitchen_type)
          $("#{{str_replace(' ', '_', $kitchen_type).'_1'}}").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#{{str_replace(' ', '_', $kitchen_type).'_1'}}_wrapper .col-md-6:eq(0)');
        @endforeach

        document.getElementById("total").value = 0;

      });

      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      function foodType(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("foodTabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("foodTablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace("btn-danger", "btn-default");
          tablinks[i].className = tablinks[i].className.replace("dispay", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " btn-danger";
      }

      function increment(countID){
          let qty = document.getElementById("qty"+countID);
          qty.value = parseInt(qty.value) + 1;
          indItem(countID);
      }

      function decrement(countID){
          let qty = document.getElementById("qty"+countID);
          if(parseInt(qty.value) != 1){
              qty.value = parseInt(qty.value) - 1;
          }
          indItem(countID);

      }

      // var item = 0;
      function addItem(repid,repname,price,itemcost,kitchen){
        var itemCount = document.getElementById("itemCount").value;
        var total = document.getElementById("total").value;
        ++itemCount;
        document.getElementById("itemCount").value=itemCount;
        document.getElementById("total").value=parseFloat(total) + parseFloat(price.replace(",", ""),'2');
        document.getElementById('add-'+repid).style.display = 'none';
        let str = '<tr><td style="display: none">'+repid+'</td><td>'+repname+'</td>';
          str += '<td><span id="priceT'+[itemCount]+'">'+parseFloat(price.replace(",", ""),'2')+'</span><input type="hidden"  readonly id="price'+[itemCount]+'" name="price'+[itemCount]+'" class="form-control-plaintext" size="7" value="'+parseFloat(price.replace(",", ""),'2')+'"></td>';
          str += '<td><div class="input-group"><div class="input-group-prepend input-custom-group"><button class="btn btn-outline-secondary decrement" type="button" onclick="decrement('+[itemCount]+')">-</button></div> <input type="number" class="form-control quantity" id="qty'+[itemCount]+'" name="qty'+[itemCount]+'" min="1" size="2" value="1" onchange="indItem('+[itemCount]+')"><input type="hidden"  id="priviasQty'+[itemCount]+'" name="priviasQty'+[itemCount]+'" value="1""><div class="input-group-append  input-custom-group"><button class="btn btn-outline-secondary increment" type="button" onclick="increment('+[itemCount]+')">+</button></div></div></td>';
          str += '<td>'+kitchen+'</td>';
          str += '<td><button type="button" class="btn btn-danger btn-block remove-table-row"><i class="fas fa-trash"></i></button><input type="hidden" id="repid'+[itemCount]+'" name="repid'+[itemCount]+'" value="'+repid+'"></td> </tr>';

        $('#itemTable').append(str);
      };

      $(document).on('click','.remove-table-row', function(){

        var price = $(this).closest('tr').find('td:eq(2)').text();
        let productId = $(this).closest('tr').find('td:eq(0)').text();
        var total = document.getElementById("total").value;

        document.getElementById("total").value=parseFloat(total) == parseFloat(price.replace(",", ""),'2') ? 0 : parseFloat(total) - parseFloat(price.replace(",", ""),'2');
        // alert(price);
        document.getElementById('add-'+productId).style.display = 'block';
        $(this).parents('tr').remove();
      });

      function indItem(countID){
        var qty = document.getElementById("qty"+countID).value;
        var priviasQty = document.getElementById("priviasQty"+countID).value;
        console.log('qty = '+qty);
        console.log('priviasQty = '+priviasQty);
        if(qty!=priviasQty){
          var qtPrice = document.getElementById("price"+countID).value;
          var priceT = document.getElementById("priceT"+countID).value;
          var total = document.getElementById("total").value;
          var totalVal = "";

          var cPrice = parseFloat(qtPrice) - parseFloat(priceT);

          var qtyTotalPrice = (qty*qtPrice);

          if(qty>priviasQty){
            let incPrice = qty - priviasQty;
            let incToPrice = parseFloat(incPrice*qtPrice);
            totalVal = (parseFloat(total)+parseFloat(incToPrice));
          }else{
            let incPrice = priviasQty - qty;
            let incToPrice = parseFloat(incPrice*qtPrice);
            totalVal = (parseFloat(total)-parseFloat(incToPrice));
          }

          document.getElementById("priceT"+countID).innerText=qtyTotalPrice;
          document.getElementById("total").value = totalVal;
          // alert(qtyTotalPrice);
        }

        document.getElementById("priviasQty"+countID).value = qty;
      }

      // $('#addItem').click(function(){
      //   alert('Sam');
      // });

    </script>
@endsection
