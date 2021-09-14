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
                         <h3 class="card-title">Sub-Category-list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_sub_category">Add Sub-Category</a>
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
                                     <td>
                                         <a href="edit_sub_category/{{$categorylist['cat_id']}}"><span class="badge bg-danger">Edit</span></a>|
                                         @if($categorylist['is_active']==1)
                                         <a href="block_category/{{$categorylist['cat_id']}}"><span class="badge bg-danger">Block</span></a>
                                         @else
                                         <a href="unblock_category/{{$categorylist['cat_id']}}"><span class="badge bg-success">Unblock</span></a>
                                         @endif
                                     </td>
                                 </tr>
                                 @endforeach

                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-body -->
           
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop