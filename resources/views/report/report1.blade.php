 <!-- for user view -->
 @extends('layout.dashboard')
 @section('content')
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-12">

         </div>
     </div>
 </div>

 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card card-secondary">

                     <div class="card-header">
                         <h3 class="card-title">Report</h3>
                     </div>
                     <!-- /.card-header -->
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif
                     <form action="{{route('report.report_list1')}}" method="get">
                         @csrf
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-10">
                                     <div class="row">

                                         <div class="form-group col-md-3">
                                             <label for="date">Start - Date</label>
                                             <input type="date" id="min" class="form-control min datepicker hasDatepicker" value="min">
                                         </div>
                                         <div class="form-group col-md-3">
                                             <label for="date">End - Date </label>
                                             <input type="date" id="max" value="max" class="form-control max datepicker hasDatepicker">
                                         </div>
                                         <div class="form-group col-md-3">
                                             <label for="item_id">Item</label>
                                             <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Item">
                                             <input type="hidden" name="item_id" id="item_id">
                                         </div>
                                         <div class="form-group col-md-3">
                                             <label for="cityplant_id">Plant</label>
                                             <div class="8-group mb-3">
                                                 <select name="cityplant_id" id="cityplant_id" class="form-control">
                                                     <option value="">Select</option>
                                                     @foreach( $all_plant as $plant)
                                                     <option value="{{$plant->cityplant_id}}">{{$plant->name}}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>

                                     </div>
                                 </div>
                                 <div class="button1 col-md-1">
                                     <!-- <input type="submit" id="filter" name="filter" class="btn btn-secondary" value="Filter"> -->
                                     <span data-href="{{route('report.report_list1')}}" id="export" class="btn btn-secondary" onclick="filter(event.target);">Filter</span>
                                 </div>
                                 <div class="button1 col-md-1">
                                     <span data-href="{{route('export-tasks1')}}" id="export" class="btn btn-success" onclick="exportTasks(event.target);">CSV</span>
                                 </div>
                             </div>
                         </div>
                     </form>
                     <hr>
                     <div class="card-body">

                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>

                                         <th>ERP M. Code</th>
                                         <th>ITEM DESCRIPTION</th>
                                         <th>PLANT</th>
                                         <th>LOCATION</th>
                                         <th>QTY</th>
                                         <th>AMOUNT</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($data as $report)
                                     <tr>
                                         <td>{{$report->item['item_no']}} </td>
                                         <td>{{$report->item['name']}}</td>
                                         <td>{{$report->plant['name']}} </td>
                                         <td>{{$report->plant['location']}} </td>
                                         <td>{{$report['counted_quantity']}} </td>
                                         <td>{{$report->item['price']}}</td>
                                     </tr>
                                     @endforeach
                                 </tbody>

                             </table>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center">
                         {!! $data->links() !!}
                     </div>
                     <!-- /.card-body -->

                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
     <script>
         function filter(_this) {
             var item_id = document.getElementById('item_id').value;
             var cityplant_id = document.getElementById('cityplant_id').value;
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?item_id=" + item_id + "&cityplant_id=" + cityplant_id + "&min=" + min + "&max=" + max;
             window.location.href = _url;
         }

         function exportTasks(_this) {
             var item_id = document.getElementById('item_id').value;
             var cityplant_id = document.getElementById('cityplant_id').value;
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?item_id=" + item_id + "&cityplant_id=" + cityplant_id + "&min=" + min + "&max=" + max;
             window.location.href = _url;
         }
     </script>
     <script>
         $(document).ready(function() {

             $("#table_search").autocomplete({
                 source: function(request, response) {
                     // Fetch data
                     $.ajax({
                         url: "{{route('stock.get_items')}}",
                         type: 'get',
                         dataType: "json",
                         data: {
                             search: request.term
                         },
                         success: function(data) {
                             response(data);
                         }
                     });
                 },
                 select: function(event, ui) {
                     console.log(ui.item);
                     $('#item_id').val(ui.item.value);
                     $('#table_search').val(ui.item.label);
                     return false;
                 }
             });

         });
     </script>
 </section>
 @stop