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
                                 <div>
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
                         <!-- <form action="{{route('stock.stock_list')}}" method="get"> -->
                         @csrf
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-11">
                                     <div class="row">

                                         <div class="form-group col-md-2">
                                             <label for="date">Start - Date</label>
                                             <input type="date" id="min" class="form-control min datepicker hasDatepicker" value="">
                                         </div>
                                         <div class="form-group col-md-2">
                                             <label for="date">End - Date </label>
                                             <input type="date" id="max" value="" class="form-control max datepicker hasDatepicker">
                                         </div>
                                         <div class="form-group col-md-2">
                                             <label for="item_id">Item</label>
                                             <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Item">
                                             <input type="hidden" name="item_id" id="item_id">

                                         </div>
                                         <div class="form-group col-md-2">
                                             <label for="cityplant_id">Plant</label>
                                             <div class="8-group mb-3">
                                                 <select name="cityplant_id" id="cityplant_id" class="form-control">
                                                     <option value="">Select</option>
                                                     @foreach( $all_plant as $plant)
                                                     <option value="{{$plant->cityplant_id}}">{{$plant->name}}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-group col-md-2">
                                             <label for="bin_id">Bin</label>
                                             <div class="input-group mb-3">
                                                 <select name="bin_id" id="bin_id" class="form-control select2">
                                                     <option value="">Select</option>
                                                     @foreach( $all_bin as $bin)
                                                     <option value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>

                                         <div class="form-group col-md-2">
                                             <label for="weight_scale_id">W. Scale</label>
                                             <div class="input-group mb-3">
                                                 <select name="weight_scale_id" id="weight_scale_id" class="form-control select2">
                                                     <option value="">Select</option>
                                                     @foreach( $all_WeightScale as $WeightScale)
                                                     <option value="{{$WeightScale->weight_scale_id}}">
                                                         {{$WeightScale->name}}
                                                     </option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="button1 col-md-1">
                                     <!-- <input type="submit" id="filter" name="filter" class="btn btn-secondary" value="Filter"> -->
                                     <span data-href="{{route('stock.stock_list')}}" id="export" class="btn btn-secondary" onclick="filter(event.target);">Filter</span>
                                 </div>
                             </div>
                         </div>
                         <!-- </form> -->
                         <hr>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-striped table-bordered dt-responsive nowrap data-table dataTable display compact" cellspacing="0" width="100%">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">Sn.</th>
                                             <th><input name="select_entry_all" id="select_entry_all" class="select_entry_all" value="" type="checkbox"></th>
                                             <th>Date</th>
                                             <th>Code</th>
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
                                         @php($i=0)
                                         @foreach($data as $list)
                                         @php($i++)
                                         <?php $assign_date1 = $list['assign_date'];

                                            $code = @$list->plant->short_code . @$list->weightScale->short_code . @$list->plant->location_short_code . "S" . @$list->stock_id; ?>
                                         <tr>
                                             <td>{{$i}} </td>
                                             <td> <input type="checkbox" name="select_entry[]" id="select_entry_<?php echo @$list->stock_id ?>" class="select_entry" value="<?php echo @$list->stock_id ?>"></td>
                                             <td>{{getCreatedAtAttribute($assign_date1,'d-m-Y h:i A')}} </td>
                                             <td>{{$code}} </td>
                                             <td>{{@$list->item['name']}}</td>
                                             <td>{{@$list->item['item_no']}}</td>
                                             <td>{{@$list->bin['name']}} </td>
                                             <td>{{@$list->weightScale['name']}} </td>
                                             <td>{{@$list->plant['name']}} </td>
                                             <td>{{@$list->user['name']}} </td>
                                             <td>{{@$list['gross_weight']}} </td>
                                             <td>{{@$list['batch_id']}} </td>
                                             <td>{{@$list->unit['name']}} </td>
                                             <td>
                                                 {{-- <?php if (session()->get('role') == 2) { ?> <a href="{{route('stock.edit_stock', $list->stock_id)}}"><span class="badge bg-primary">Edit</span></a>|<?php } ?> --}}
                                                 @if($list['is_active']==1)
                                                 <a href="{{ route('stock.block_stock', $list->stock_id)}}"><span class="badge bg-danger">Delete</span></a>
                                                 @else
                                                 <span class="badge bg-success">Deleted</span>
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
                     </form>
                     <!-- /.card-body -->

                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
     <script>
         function filter(_this) {
             var weight_scale_id = document.getElementById('weight_scale_id').value;
             var bin_id = document.getElementById('bin_id').value;
             var item_id = document.getElementById('item_id').value;
             var cityplant_id = document.getElementById('cityplant_id').value;
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?item_id=" + item_id + "&cityplant_id=" + cityplant_id + "&min=" + min + "&max=" + max + "&bin_id=" + bin_id + "&weight_scale_id=" + weight_scale_id;
             window.location.href = _url;
         }
         $(document).ready(function() {
             $("#select_entry_all").click(function() {
                 $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

             });
         });
     </script>
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