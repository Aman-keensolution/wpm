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
                         <h3 class="card-title">Bin list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-warning">
                                     <a href="add_bin">Add New</a>
                                 </button>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif

                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>
                                        <th style="width: 10px">Sn.</th>
                                         <th>Bin Name</th>
                                      
                                         <th>Bin Tare Weight</th>
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
                            $rurl = route('bin.bin_list');
                            $columns =  "{data: null, name: 'bin_id'},
                                {data: 'name', name: 'name'},
                            
                                {data: 'bin_weight', name: 'bin_weight'},
                                {data: 'action', name: 'action', orderable: true, searchable: true}";
                            echo setDataTable($rurl, $columns);
                            ?>

                     </div>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
 </section>

 @stop