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
                         <h3 class="card-title">Item list</h3>
                         <div class="card-tools">
                             <div class="input-group input-group-sm" style="width: 150px;">
                                 <button type="button" class="btn btn-block btn-warning">
                                     <a href="add_item">Add New</a>
                                 </button>
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
                         <div class="card-tools">
                             <form method="get" action="{{route('item.select_item_list')}}">
                                 <div class="input-group input-group-sm" style="width: 200px;">
                                     <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Search">
                                     <input type="hidden" name="item_id" id="item_id">
                                     <div class="input-group-append">
                                         <button type="submit" class="btn btn-secondary">
                                             <i class="fas fa-search"></i>
                                         </button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th style="width: 10px">Sn.</th>
                                         <th>ERP Material No.</th>
                                         <th>Name</th>
                                         <th>Price</th>
                                         <th>Item wt.(Kg)</th>
                                         <th>Part-no</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody class="replacetbody">
                                     @php($i=0)
                                     @foreach($data as $item)
                                     @php($i++)
                                     <tr>
                                         <td>{{$i}}</td>
                                         <td>{{$item['item_no']}} </td>
                                         <td>{{$item['name']}} </td>
                                         <td>{{$item['price']}} </td>
                                         <td>{{$item['item_avg_weight']}} </td>
                                         <td>{{$item['part_no']}} </td>
                                         <td>
                                             <a href=" {{ route('item.edit_item', $item->item_id)}}"><span class="badge bg-primary">Edit</span>|
                                                 @if($item['is_active']==1)
                                                 <a href="{{ route('item.block_item', $item->item_id)}}"><span class="badge bg-danger">Block</span></a>
                                                 @else
                                                 <a href="{{ route('item.unblock_item', $item->item_id)}}"><span class="badge bg-success">Unblock</span></a>
                                                 @endif
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center">
                         {!! $data->links() !!}
                     </div>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
     <script>
         $(document).ready(function() {

             $("#table_search").autocomplete({
                 source: function(request, response) {
                     // Fetch data
                     $.ajax({
                         url: "{{route('stock.get_items')}}",
                         type: 'get',
                         dataType: "json",
                         data: {
                             search: request.term
                         },
                         success: function(data) {
                             response(data);
                         }
                     });
                 },
                 select: function(event, ui) {
                     console.log(ui.item);
                     $('#item_id').val(ui.item.value);
                     $('#table_search').val(ui.item.label);
                     return false;
                 }
             });

         });
     </script>
 </section>

 @stop