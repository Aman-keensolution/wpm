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
                             <h3 class="card-title">Inventory Count list</h3>
                                <?php if (session()->get('role') == 2) { ?>
                             <div class="card-tools">
                                 <div class="input-group input-group-sm" style="width: 150px;">
                                     <button type="button" class="btn btn-block btn-warning">
                                         <a href="add_stock">Add New</a>
                                     </button>
                                 </div>
                             </div>
                               <?php } ?>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">Sn.</th>
                                             <th>Date</th>
                                             <th>Item</th>
                                             <th>Bin</th>
                                             <th>Weighing machine</th>
                                             <th>Plant</th>
                                             <th>user</th>
                                             <th>Gross Weight</th>
                                             <th>Batch ID</th>
                                             <th>Unit</th>
                                             <th>Action</th>
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
                                {data: 'assign_date1', name: 'assign_date1'},
                                {data: 'item_name', name: 'item_name'},
                                {data: 'bin_name', name: 'bin_name'},
                                {data: 'weightScale_name', name: 'weightScale_name'},
                                {data: 'plant_name', name: 'plant_name'},
                                {data: 'user_name', name: 'user_name'},
                                {data: 'gross_weight', name: 'gross_weight'},
                                {data: 'batch_id', name: 'batch_id'},
                                {data: 'unit_name', name: 'unit_name'},
                                {data: 'action', name: 'action', orderable: true, searchable: true}";
                            echo setDataTable($rurl, $columns);
                            ?>
                     </div>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
 @stop