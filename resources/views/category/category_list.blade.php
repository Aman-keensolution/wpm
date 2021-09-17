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
                         <h3 class="card-title">Category list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-warning">
                                     <a href="add_category">Add New</a>
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
                                         <th>Category Name</th>
                                         <th>Parent Category</th>
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
                            $rurl = route('category.category_list');
                            $columns =  "{data: null, name: 'user_id'},
                                 {data: 'name', name: 'name'},
                                 {data: 'pcategory_name', name: 'pcategory_name'},
                                 {data: 'action', name: 'action', orderable: true, searchable: true}";
                            echo setDataTable($rurl, $columns);
                            ?>

                     </div>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
 </section>

 @stop