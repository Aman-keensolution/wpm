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
                                 <div class="form-group col-md-6">
                                     <label for="date">Date - From</label>
                                     <input type="text" id="min" class="form-control min datepicker hasDatepicker"
                                         value="">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="date">Date - To</label>
                                     <input type="text" id="max" value=""
                                         class="form-control max datepicker hasDatepicker">
                                 </div>

                                 <div class="form-group col-md-3">
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
                                 <div class="form-group col-md-3">
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
                                 <div class="form-group col-md-3">
                                     <label for="item_id">Item</label>
                                     <div class="input-group mb-3">
                                         <select name="item_id" id="item_id" class="form-control select2">
                                             <option value="">Select</option>
                                             @foreach( $all_item as $item)
                                             <option value="{{$item->item_id}}">{{$item->name}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="weight_scale_id">Weighing Scale</label>
                                     <div class="input-group mb-3">
                                         <select name="weight_scale_id" id="weight_scale_id"
                                             class="form-control select2">
                                             <option value="">Select</option>
                                             @foreach( $all_WeightScale as $WeightScale)
                                             <option value="{{$WeightScale->weight_scale_id}}">{{$WeightScale->name}}
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
                                         <th>Item</th>
                                         <th>ERP M. Code</th>
                                         <th>Bin</th>
                                         <th>Weighing machine</th>
                                         <th>Plant/Location</th>
                                         <th>User</th>
                                         <th>Assign Date</th>
                                         <th>Gross Weight</th>
                                         <th>Bin Weight</th>
                                         <th>Net Weight</th>
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
                        $rurl = route('report.report_list');
                        $columns =  "{data: 'item_name', name: 'item_name'},
                                {data: 'item_no', name: 'item_no'},
                                {data: 'bin_name', name: 'bin_name'},
                                {data: 'weightScale_name', name: 'weightScale_name'},
                                {data: 'plant_name', name: 'plant_name'},
                                {data: 'user_name', name: 'user_name'},
                                {data: 'assign_date1', name: 'assign_date1'},
                                {data: 'gross_weightu', name: 'gross_weightu'},
                                {data: 'bin_weightu', name: 'bin_weightu'},
                                {data: 'net_weightu', name: 'net_weightu'},
                                {data: 'counted_quantity', name: 'counted_quantity'},
                              
                               ";
                        echo setDataTable_repo($rurl, $columns,$report_name);
                        ?>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>
 @stop
