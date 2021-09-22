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
                     <form action="" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-4">
                                     <label for="date">Date - From</label>
                                     <input type="text" id="min" class="form-control min datepicker hasDatepicker"
                                         value="">
                                 </div>
                                 <div class="form-group col-md-4">
                                     <label for="date">Date - To</label>
                                     <input type="text" id="max" value=""
                                         class="form-control max datepicker hasDatepicker">
                                 </div>

                                 <div class="form-group col-md-4">
                                     <label for="plant_id">Plant</label>
                                     <div class="input-group mb-3">
                                         <select multiple name="plant_id[]" id="plant_id" class="form-control select2">
                                             <option value="">Select</option>
                                             @foreach( $all_plant as $plant)
                                             <option value="{{$plant->plant_id}}">{{$plant->name}}/{{$plant->location}}
                                             </option>
                                             @endforeach
                                         </select>
                                     </div>
                                 </div>
                             
                             </div>
                             <div class="card-footer">
                                 <span class="d-inline-block submit_group" tabindex="0" data-toggle="tooltip"
                                     title="Please Enter Valid Gross Weight.">
                                     <input type="button" id="filter" name="filter" class="btn btn-secondary"
                                         value="Filter">
                                     <input type="reset" id="reset" name="reset" class="btn btn-warning " value="Reset">
                                 </span>
                             </div>
                     </form>
                     <hr>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table
                                 class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact"
                                 cellspacing="0" width="100%">
                                 <thead>
                                     <tr>
                                        
                                         <th>ERP M. Code</th>
                                         <th>Quantity</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div>

                     <!-- /.card-body -->
                     <?php
                        $report_name ="Inventory Count";
                        $rurl = route('report.report_list_user');
                        $columns =  "
                                {data: 'item_no', name: 'item_no'},
                                {data: 'counted_quantity', name: 'counted_quantity'},
                               ";
                        echo setDataTable_repo2($rurl, $columns,$report_name);
                        ?>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>
 @stop
