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
                         <form action="print_stock" method="POST">
                            @csrf
                         <div class="card-header">
                             <h3 class="card-title">Inventory Count list</h3>
                                
                             <div class="card-tools">
                                <div >
                                    <?php if (session()->get('role') == 2) { ?><a class="btn btn-warning" href="add_stock/0/0">Add New</a><?php } ?>
                                
                                    <button name="print_stock" id="print_stock" type="submit" class="btn btn-warning">Print Stock Labels</button>
                                 </div>
                             </div>
                               
                         </div>
                         @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
 
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">Sn.</th>
                                             <th>Date</th><th>Code</th>
                                             <th><input name="select_entry_all" id="select_entry_all" class="select_entry_all" value="" type="checkbox"></th>
                                             <th>Item</th>
                                             <th>ERP M. Code</th>
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
                         </form>
                         <!-- /.card-body -->
                         <?php
                            $rurl = route('stock.stock_list');
                            $columns =  "{data: null, name: 'stock_id'},
                                {data: 'assign_date1', name: 'assign_date1'},
                                {data: 'code', name: 'code'},
                                {data: 'checkbox1', name: 'checkbox1', orderable: false, searchable: false},
                                {data: 'item_name', name: 'item_name'},
                                {data: 'item_no', name: 'item_no'},
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
         <script>
            $(document).ready(function () {

                
                
            });
         </script>
     </section>
 @stop