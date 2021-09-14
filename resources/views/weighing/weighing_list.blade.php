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
                         <h3 class="card-title">Weighing-list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_weighing">Add Weighing</a>
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
                                     <th>Plant-Name</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 0; ?>
                                 @foreach($WeightScaledata as $weight_list)
                                 <?php $i++; ?>
                                 <tr>
                                     <td> {{$i}} </td>
                                     <td>{{$weight_list['name']}} </td>
                                     <td>{{$weight_list->plant['name']}} </td>
                                     <td>
                                         <a href="edit_weighing/{{$weight_list['weight_scale_id']}}"><span class="badge bg-danger">Edit</span></a>|
                                         @if($weight_list['is_active']==1)
                                         <a href="block_weighing/{{$weight_list['weight_scale_id']}}"><span class="badge bg-danger">Block</span></a>
                                         @else
                                         <a href="unblock_weighing/{{$weight_list['weight_scale_id']}}"><span class="badge bg-success">Unblock</span></a>
                                         @endif

                                     </td>
                                 </tr>
                                 @endforeach

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 @stop