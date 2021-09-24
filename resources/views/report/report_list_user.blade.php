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
                     <form action="{{route('report.report_list_user')}}" method="get">
                         @csrf
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-10">
                                     <div class="row">
                                         <div class="form-group col-md-4">
                                             <label for="date">Date - From</label>
                                             <input type="date" id="min" class="form-control min datepicker hasDatepicker" value="">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="date">Date - To</label>
                                             <input type="date" id="max" value="" class="form-control max datepicker hasDatepicker">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="plant_id">Plant</label>
                                             <div class="input-group mb-3">
                                                 <select name="plant_id" id="plant_id" class="form-control">
                                                     <option value="">Select</option>
                                                     @foreach( $all_plant as $plant)
                                                     <option value="{{$plant->cityplant_id}}">{{$plant->name}}
                                                     </option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="button1 col-md-1">
                                     <input type="button" id="filter" name="filter" class="btn btn-secondary" value="Filter">
                                 </div>
                                 <div class="button1 col-md-1">
                                     <button data-href="{{route('export-tasks_user')}}" id="export" class="btn btn-success" onclick="exportTasks(event.target);">CSV</button>
                                 </div>
                             </div>
                     </form>
                     <hr>
                     <div class="card-body">
                        
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>
                                         <th>Sn0.</th>
                                         <th>ERP M. Code</th>
                                         <th>Quantity</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php($i=0)
                                     @foreach($data as $report)
                                     @php($i++)
                                     <tr>
                                         <td>{{$i}}</td>
                                         <td>{{$report->item['item_no']}} </td>
                                         <td>{{$report['counted_quantity']}} </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
     <script>
         function exportTasks(_this) {
             var item_id = document.getElementById('item_id').value;
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?item_id=" + item_id + "&min=" + min + "&max=" + max;
             window.location.href = _url;
         }
     </script>
 </section>
 @stop