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
                         <h3 class="card-title">Category-list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_category">Add New Category</a>
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
                                     <th>Category-Name</th>
                                     <th>Sub-Category</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 0; ?>
                                 @foreach($category_list as $categorylist)
                                 <?php $i++; ?>
                                 <tr>
                                     <td> {{$i}} </td>
                                     <td>{{$categorylist['name']}} </td>
                                     <td>{{$categorylist['p_id']}} </td>
                                     <td>
                                         <a href="edit_category/{{$categorylist['id']}}"><span class="badge bg-danger">Edit</span></a>|
                                         @if($categorylist['is_active']==1)
                                         <a href="block_user/{{$categorylist['id']}}"><span class="badge bg-danger">Block</span></a>
                                         @else
                                         <a href="unblock_user/{{$categorylist['id']}}"><span class="badge bg-success">Unblock</span></a>
                                         @endif
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