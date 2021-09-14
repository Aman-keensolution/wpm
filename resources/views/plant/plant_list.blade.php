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
                         <h3 class="card-title">Plant list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_plant">Add New Plant</a>
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
                                     <th>ID</th>
                                     <th>Plant Name</th>
                                     <th>Plant address</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>

                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-body -->
                     <?php
                        $rurl = route('plant.plant_list');
                        $columns =  "{data: null, name: 'plant_id'},
                                {data: 'plant_id', name: 'plant_id'},
                                {data: 'name', name: 'name'},
                                {data: 'plant_address', name: 'plant_address'},
                                {data: 'action', name: 'action', orderable: true, searchable: true}";
                        echo setDataTable($rurl, $columns);
                        ?>

                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop
