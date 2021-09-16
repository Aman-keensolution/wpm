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
                         <h3 class="card-title">Update stock</h3>
                     </div>
                     <form action="{{route('update_stock',$Stockdata['stock_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label for="role">Item</label>
                                     <select name="item_id" id="item_id" class="form-control">
                                         @foreach( $all_item as $item)
                                         <option @if($Stockdata->item_id == $item->item_id) selected @endif value="{{$item->item_id}}">{{$item->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="role">Plant</label>
                                     <select name="plant_id" id="plant_id" class="form-control">
                                         @foreach( $all_plant as $plant)
                                         <option @if($Stockdata->plant_id == $plant->plant_id) selected @endif value="{{$plant->plant_id}}">{{$plant->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="role">Bin</label>
                                     <select name="bin_id" id="bin_id" class="form-control">
                                         @foreach( $all_bin as $bin)
                                         <option @if($Stockdata->bin_id == $bin->bin_id) selected @endif value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="role">Weighing machine</label>
                                     <select name="weight_scale_id" id="weight_scale_id" class="form-control">
                                         @foreach( $all_WeightScale as $WeightScale)
                                         <option @if($Stockdata->weight_scale_id == $WeightScale->weight_scale_id) selected @endif value="{{$WeightScale->weight_scale_id}}">{{$WeightScale->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="exampleInputEmail1">Batch ID</label>
                                     <input type="text" name="batch_id" value="{{$Stockdata['batch_id']}}" class="form-control" placeholder="Enter Batch ID">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="exampleInputEmail1">Gross Weight</label>
                                     <input type="text" name="gross_weight" value="{{$Stockdata['gross_weight']}}" class="form-control" placeholder="Enter Total Weight">
                                 </div>
                                 <div class="form-group col-md-6""><?php $u_arr = arrayUnit(); ?>
                                <label for=" unit_id">Gross Weight Unit</label>
                                     <select name="unit_id" class="form-control" placeholder="Enter Unit">
                                         @foreach( $u_arr as $unit)
                                         <option value="{{$unit['unit_id']}}">{{$unit['name']}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="exampleInputEmail1">Bin Weight</label>
                                     <input type="text" readonly name="bin_weight" value="{{$Stockdata['bin_weight']}}" class="form-control" placeholder="Calculate Bin Weight">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="exampleInputEmail1">Net Weight</label>
                                     <input type="text" readonly name="net_weight" value="{{$Stockdata['net_weight']}}" class="form-control" placeholder="Calculate Net Weigh">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="exampleInputEmail1">Quantity</label>
                                     <input type="text" readonly name="counted_quantity" value="{{$Stockdata['counted_quantity']}}" class="form-control" placeholder="Calculate Quantity">
                                 </div>
                             </div>
                             <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>
 @stop