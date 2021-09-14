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
                         <h3 class="card-title">Userlist</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_user">Add New User</a>
                                 </button>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <table class="table data-table dataTable display compact hover order-column stripe">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                         
                     </div>
                     <script type="text/javascript">
                        $(function () {
                          
                          var table = $('.data-table').DataTable({
                              processing: true,
                              serverSide: true,
                              "sDom": 'Rfrtlip',
                              ajax: "{{ route('admin.userlist') }}",
                              columns: [
                                  {data: 'user_id', name: 'user_id'},
                                  {data: 'name', name: 'name'},
                                  {data: 'email', name: 'email'},
                                  {data: 'action', name: 'action', orderable: true, searchable: true},
                              ]
                          });
                          
                        });
                      </script>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop