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
                                     <input type="date" id="item_no" class="form-control item_no" type="text" value="">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="date">Date - To</label>
                                     <input type="date" id="item_name" value="" class="form-control item_name">
                                 </div>

                                 <div class="form-group col-md-3">
                                     <label for="plant_id">Plant</label>
                                     <div class="input-group mb-3">
                                         <select name="plant_id" id="plant_id" class="form-control select2">
                                             <option value="">Select</option>
                                             @foreach( $all_plant as $plant)
                                             <option value="{{$plant->plant_id}}">{{$plant->name}}</option>
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
                                         <select name="weight_scale_id" id="weight_scale_id" class="form-control select2">
                                             <option value="">Select</option>
                                             @foreach( $all_WeightScale as $WeightScale)
                                             <option value="{{$WeightScale->weight_scale_id}}">{{$WeightScale->name}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="card-footer">
                                 <span class="d-inline-block submit_group" tabindex="0" data-toggle="tooltip" title="Please Enter Valid Gross Weight.">
                                     <input type="submit" id="submit" name="submit" class="btn btn-secondary" disabled style="pointer-events: none;" value="Filter">
                                     <input type="submit" id="submit" name="submit" class="btn btn-warning " disabled style="pointer-events: none;" value="Reset">
                                     <input type="submit" id="submit_p" name="submit" class="btn btn-success" disabled style="pointer-events: none;" value="Export CSV">
                                 </span>
                             </div>
                     </form>
                     <hr>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>
                                         <th style="width: 10px">Sn.</th>
                                         <th>Item</th>
                                         <th>ERP M. Code</th>
                                         <th>Bin</th>
                                         <th>Weighing machine</th>
                                         <th>Plant</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div>

                     <!-- /.card-body -->
                     <?php
                        $rurl = route('stock.stock_list');
                        $columns =  "{data: null, name: 'stock_id'},
                                {data: 'item_name', name: 'item_name'},
                                {data: 'item_no', name: 'item_no'},
                                {data: 'bin_name', name: 'bin_name'},
                                {data: 'weightScale_name', name: 'weightScale_name'},
                                {data: 'plant_name', name: 'plant_name'},
                               ";
                        echo setDataTable($rurl, $columns);
                        ?>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
     <script>
         $(document).ready(function() {
             $('#select_entry_all').click(function(event) {
                 if (this.checked) {
                     // Iterate each checkbox
                     $('.select_entry').each(function() {
                         this.checked = true;

                     });
                 } else {
                     $('.select_entry').each(function() {
                         this.checked = false;

                     });
                 }
             });
             $('input[type=checkbox]').on('change', function() {
                 if ($(this).is(':checked')) {
                     $('#print_stock').removeAttr('disabled');
                 } else {
                     $('#print_stock').attr('disabled', 'disabled');
                 }
             });
         });
     </script>
 </section>
 @stop