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
                         <h3 class="card-title">Item list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-warning">
                                     <a href="add_item">Add New</a>
                                 </button>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>
                                         <th style="width: 10px">#</th>
                                         <th>Name</th>
                                         <th>Item No.</th>
                                         <th>Price</th>
                                         <th>Category</th>
                                         <th>Item wt.(Kg)</th>
                                         <th>Batch No.</th>
                                         <th>Plant</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                         </div>

                         <?php
                            $rurl = route('item.item_list');
                            $columns =  "{data: null, name: 'item_id'},
                                {data: 'name', name: 'name'},
                                {data: 'item_no', name: 'item_no'},
                                {data: 'price', name: 'price'},
                                {data: 'category_name', name: 'category_name'},
                                {data: 'item_avg_weight', name: 'item_avg_weight'},
                                {data: 'batch_no', name: 'batch_no'},
                                {data: 'plant_name', name: 'plant_name'},
                              
                                {data: 'action', name: 'action', orderable: true, searchable: true}";
                            echo setDataTable($rurl, $columns);
                            ?>


                     </div>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
 </section>

 @stop