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
                                 <div class="col-md-10">
                                     <div class="row">
                                         <div class="form-group col-md-6">
                                             <label for="date">Start - Date</label>
                                             <input type="date" id="min" name="min" class="form-control min datepicker hasDatepicker">
                                             <input type="hidden" value="22-07-2021" name="assign_date" id="assign_date">
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="date">End - Date </label>
                                             <input type="date" id="max" name="max" class="form-control max datepicker hasDatepicker">
                                             <input type="hidden" value="22-07-2021" name="assign_date" id="assign_date">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="button1 col-md-2">
                                     <span data-href="{{route('stock.stock_list')}}" id="export" class="btn btn-secondary" onclick="filter(event.target);">Filter</span>
                                     <!-- <input type="submit" id="filter" name="filter" class="btn btn-secondary" value="Filter"> -->
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
                                             <th>Date</th>
                                             <th>Code</th>
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
                                         @php($i=0)
                                         @foreach($data as $list)
                                         @php($i++)
                                         <?php $assign_date1 = $list['assign_date'];

                                            $code = @$list->plant->short_code . @$list->weightScale->short_code . @$list->plant->location_short_code . "S" . @$list->stock_id; ?>
                                         <tr>
                                             <td>{{$i}} </td>
                                             <td>{{getCreatedAtAttribute($assign_date1,'d-m-Y h:i A')}} </td>
                                             <td>{{$code}} </td>
                                             <td> <input type="checkbox" name="select_entry[]" id="select_entry_<?php echo @$list->stock_id ?>" class="select_entry" value="<?php echo @$list->stock_id ?>"></td>
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
             var min = document.getElementById('min').value;
             var max = document.getElementById('max').value;
             let _url = $(_this).data('href') + "?&min=" + min + "&max=" + max;
             window.location.href = _url;
         }
     </script>
 </section>
 @stop