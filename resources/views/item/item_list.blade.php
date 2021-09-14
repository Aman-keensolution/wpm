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
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Item list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_item">Add New Item</a>
                                 </button>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable"  cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Id</th>
                                     <th>Name</th>
                                     <th>Item number</th>
                                     <th>Category</th>
                                     <th>Item weight</th>
                                     <th>Batch number</th>
                                     <th>Plant</th>
                                     <th>Manfactring date</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>

                             </tbody>
                         </table>
                     </div>

                     <?php
                        $rurl = route('item.item_list');
                        $columns =  "{data: null, name: 'item_id'},
                                {data: 'item_id', name: 'item_id'},
                                {data: 'item_name', name: 'item_name'},
                                {data: 'item_no', name: 'item_no'},
                                {data: 'category_name', name: 'category_name'},
                                {data: 'item_avg_weight', name: 'item_avg_weight'},
                                {data: 'batch_no', name: 'batch_no'},
                                {data: 'plant_name', name: 'plant_name'},
                                {data: 'manfactring_date', name: 'manfactring_date'},
                                {data: 'action', name: 'action', orderable: true, searchable: true}";
                        echo setDataTable($rurl, $columns);
                        ?>


                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop