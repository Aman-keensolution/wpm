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
                                     <th>Bin-Name</th>
                                     <th>Plant-Name</th>
                                     <th>Bin-weight</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 0; ?>
                                 @foreach($bin_list as $binlist)
                                 <?php $i++; ?>
                                 <tr>
                                     <td> {{$i}} </td>
                                     <td>{{$binlist['name']}} </td>
                                     <td>{{$binlist->plant['name']}} </td>
                                     <td>{{$binlist['bin_weight']}} </td>
                                     <td>
                                         <a href="edit_bin/{{$binlist['bin_id']}}"><span class="badge bg-danger">Edit</span></a>|
                                         @if($binlist['is_active']==1)
                                         <a href="block_bin/{{$binlist['bin_id']}}"><span class="badge bg-danger">Block</span></a>
                                         @else
                                         <a href="unblock_bin/{{$binlist['bin_id']}}"><span class="badge bg-success">Unblock</span></a>
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