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
                         <h3 class="card-title">Bin-list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_bin">Add New Bin</a>
                                 </button>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Name</th>
                                     <th>email</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 0; ?>
                                 @foreach($user_list as $userlist)
                                 <?php $i++; ?>
                                 <tr>
                                     <td> {{$i}} </td>
                                     <td>{{$userlist['name']}} </td>
                                     <td>{{$userlist['email']}} </td>
                                     <td>
                                         <a href="edit_bin/{{$userlist['id']}}"><span class="badge bg-danger">Edit</span></a>|
                                         @if($userlist['is_active']==1)
                                         <a href="block_user/{{$userlist['id']}}"><span class="badge bg-danger">Block</span></a>
                                         @else
                                         <a href="unblock_user/{{$userlist['id']}}"><span class="badge bg-success">Unblock</span></a>
                                         @endif
                                         <!-- <a href="Block_user/{{$userlist['id']}}"><span class="badge bg-danger">Block</span></a> -->
                                     </td>
                                 </tr>
                                 @endforeach

                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer clearfix">
                         <ul class="pagination pagination-sm m-0 float-right">
                             <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                             <li class="page-item"><a class="page-link" href="#">1</a></li>
                             <li class="page-item"><a class="page-link" href="#">2</a></li>
                             <li class="page-item"><a class="page-link" href="#">3</a></li>
                             <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop