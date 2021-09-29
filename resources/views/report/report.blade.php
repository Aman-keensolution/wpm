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
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif

                     <!-- /.card-header -->
                     <!-- <form action="{{route('report.report_list')}}" method="get"> -->
                     @csrf
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-10">
                                 <div class="row">

                                     <div class="form-group col-md-2">
                                         <label for="date">Start - Date</label>
                                         <input type="date" id="min" class="form-control min datepicker hasDatepicker" value="">
                                     </div>
                                     <div class="form-group col-md-2">
                                         <label for="date">End - Date </label>
                                         <input type="date" id="max" value="" class="form-control max datepicker hasDatepicker">
                                     </div>
                                     <div class="form-group col-md-2">
                                         <label for="item_id">Item</label>
                                         <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Item">
                                         <input type="hidden" name="item_id" id="item_id">
                                         <!--<div class="input-group mb-3">
                                                 <select name="item_id" id="item_id" class="form-control select2">
                                                     <option value="">Select</option>
                                                     @foreach( $all_item as $item)
                                                     <option value="{{$item->item_id}}">{{$item->name}}</option>
                                                     @endforeach
                                                 </select>
                                            </div> -->
                                     </div>
                                     <div class="form-group col-md-2">
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
                                     <div class="form-group col-md-2">
                                         <label for="bin_id">Bin</label>
                                         <div class="input-group mb-3">
                                             <select name="bin_id" id="bin_id" class="form-control select2">
                                                 <option value="">Select</option>
                                                 @foreach( $all_bin as $bin)
                                                 <option value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group col-md-2">
                                         <label for="weight_scale_id">W. Scale</label>
                                         <div class="input-group mb-3">
                                             <select name="weight_scale_id" id="weight_scale_id" class="form-control select2">
                                                 <option value="">Select</option>
                                                 @foreach( $all_WeightScale as $WeightScale)
                                                 <option value="{{$WeightScale->weight_scale_id}}">
                                                     {{$WeightScale->name}}
                                                 </option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="button1 col-md-1">
                                 <!-- <input type="submit" id="filter" name="filter" class="btn btn-secondary" value="Filter"> -->
                                 <span data-href="{{route('report.report_list')}}" id="export" class="btn btn-secondary" onclick="filter(event.target);">Filter</span>
                             </div>
                             <div class="button1 col-md-1">
                                 <span data-href="{{route('export-tasks')}}" id="export" class="btn btn-success " onclick="exportTasks(event.target);">CSV</span>
                             </div>
                         </div>
                     </div>
                     <!-- </form> -->
                     <hr>
                     <div class="card-body">

                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>
                                         <th>Item</th>
                                         <th>ERP M. Code</th>
                                         <th>Bin</th>
                                         <th>Weighing machine</th>
                                         <th>Plant/Location</th>
                                         <th>LOCATION CODE</th>
                                         <th>User</th>
                                         <th>Assign Date</th>
                                         <th>Gross Weight</th>
                                         <th>Bin Weight</th>
                                         <th>Net Weight</th>
                                         <th>Quantity</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($data as $report)
                                     <?php @$assign_date1 = $report['assign_date']; ?>
                                     <tr>
                                         <td>{{@$report->item['name']}}</td>
                                         <td>{{@$report->item['item_no']}} </td>
                                         <td>{{@$report->bin['name']}} </td>
                                         <td>{{@$report->weightScale['name']}} </td>
                                         <td>{{@$report->plant['name']}} </td>
                                         <td>{{@$report->plant['location_short_code']}} </td>
                                         <td>{{@$report->user['name']}} </td>
                                         <td>{{@getCreatedAtAttribute($assign_date1)}} </td>
                                         <td>{{@$report['gross_weight']}} </td>
                                         <td>{{@$report['bin_weight']}} </td>
                                         <td>{{@$report['net_weight']}} </td>
                                         <td>{{@$report['counted_quantity']}} </td>
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
             var weight_scale_id = document.getElementById('weight_scale_id').value;
             var bin_id = document.getElementById('bin_id').value;
             var item_id = document.getElementById('item_id').value;
             var cityplant_id = document.getElementById('cityplant_id').value;
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?item_id=" + item_id + "&cityplant_id=" + cityplant_id + "&min=" + min + "&max=" + max + "&bin_id=" + bin_id + "&weight_scale_id=" + weight_scale_id;
             window.location.href = _url;
         }

         function exportTasks(_this) {
             var weight_scale_id = document.getElementById('weight_scale_id').value;
             var bin_id = document.getElementById('bin_id').value;
             var item_id = document.getElementById('item_id').value;
             var cityplant_id = document.getElementById('cityplant_id').value;
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?item_id=" + item_id + "&cityplant_id=" + cityplant_id + "&min=" + min + "&max=" + max + "&bin_id=" + bin_id + "&weight_scale_id=" + weight_scale_id;
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