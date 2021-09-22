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
                         <h3 class="card-title">Weighing Scale list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-warning">
                                     <a href="add_weighing">Add New</a>
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
                                         <th style="width: 10px">Sn.</th>
                                         <th>Name</th>
                                         <th>Weighing Scale No.</th>
                                         <th>Plant/Location Name</th>
                                         <th>Short Code</th>
                                         <th>Capicity</th>
                                         <th>User Name</th>
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
                        $rurl = route('weighing.weighing_list');
                        $columns =  "{data: null, name: 'weight_scale_id'},
                                {data: 'name', name: 'name'},
                                {data: 'weight_scale_no', name: 'weight_scale_no'},
                                {data: 'plant_name', name: 'plant_name'},
                                {data: 'short_code', name: 'short_code'},
                                {data: 'capicity', name: 'capicity'},
                                {data: 'user_name', name: 'user_name'},
                                {data: 'action', name: 'action', orderable: true, searchable: true}";
                        echo setDataTable($rurl, $columns);
                        ?>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop