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
                         <h3 class="card-title">Item-list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-outline-primary">
                                     <a href="add_item">Add New Item</a>
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
                                     <th>Item-number</th>
                                     <th>Category</th>
                                     <th>Item-weight</th>
                                     <th>Batch_number</th>
                                     <th>Plant</th>
                                     <th>Manfactring_date</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 0; ?>
                                 @foreach($item_list as $itemlist)
                                 <?php $i++; ?>
                                 <tr>
                                     <td> {{$i}} </td>
                                     <td>{{$itemlist['item_name']}} </td>
                                     <td>{{$itemlist['item_no']}} </td>
                                     <td>{{$itemlist->category['name']}} </td>
                                     <td>{{$itemlist['item_avg_weight']}} </td>
                                     <td>{{$itemlist['batch_no']}} </td>
                                     <td>{{$itemlist->plant['name']}} </td>
                                     <td>{{$itemlist['manfactring_date']}} </td>
                                     <td>
                                         <a href="edit_item/{{$itemlist['item_id']}}"><span class="badge bg-danger">Edit</span></a>|
                                         @if($itemlist['is_active']==1)
                                         <a href="block_item/{{$itemlist['item_id']}}"><span class="badge bg-danger">Block</span></a>
                                         @else
                                         <a href="unblock_item/{{$itemlist['item_id']}}"><span class="badge bg-success">Unblock</span></a>
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