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
         <div class="card card-secondary">
             <div class="card-header">
                 <h3 class="card-title">Add New Stock</h3>
             </div>
             <form action="{{route('stock.store')}}" method="post">
                 @csrf
                 <div class="card-body">
                     <div class="row">
                         <div class="form-group col-md-6">
                             <label for="role">Item</label>
                             <select name="item_id" id="item_id" class="form-control">
                                 @foreach( $all_item as $item)
                                 <option value="{{$item->item_id}}">{{$item->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group col-md-6"><!--Auto file-->
                             <label for="role">Plant</label><!--Auto file-->
                             <select name="plant_id" id="plant_id" class="form-control"><!--Auto file-->
                                 @foreach( $all_plant as $plant)
                                 <option 
                                 <?php if ($plant->plant_id == $all_bin[0]->plant_id) { echo "selected";} ?>
                                 value="{{$plant->plant_id}}">
                                    {{$plant->name}}
                                </option><!--Auto file-->
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group col-md-6">
                             <label for="role">Bin</label>
                             <select name="bin_id" id="bin_id" class="form-control">
                                 @foreach( $all_bin as $bin)
                                 <option value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group col-md-6"><!--Auto file-->
                             <label for="role">Weighing machine</label><!--Auto file-->
                             <select name="weight_scale_id" id="weight_scale_id" class="form-control"><!--Auto file-->
                                 @foreach( $all_WeightScale as $WeightScale)
                                 <option value="{{$WeightScale->weight_scale_id}}">{{$WeightScale->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group col-md-6">
                             <label for="exampleInputEmail1">Batch ID</label>
                             <input type="text" name="batch_id" class="form-control" placeholder="Enter Batch ID">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="exampleInputEmail1">Gross Weight</label>
                             <input type="text" name="gross_weight" class="form-control" placeholder="Enter Total Weight">
                         </div>
                         <div class="form-group col-md-6"">
                                <label for=" unit_id">Gross Weight Unit</label>
                             <select name="unit_id" class="form-control" placeholder="Enter Unit">
                                 @foreach( $all_unit as $unit)
                                 <option value="{{$unit['unit_id']}}">{{$unit['name']}}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group col-md-6">
                             <label for="exampleInputEmail1">Bin Weight</label>
                             <input type="text" readonly name="bin_weight" class="form-control" placeholder="Calculate Bin Weight">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="exampleInputEmail1">Net Weight</label>
                             <input type="text" readonly name="net_weight" class="form-control" placeholder="Calculate Net Weigh">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="exampleInputEmail1">Quantity</label>
                             <input type="text" readonly name="counted_quantity" class="form-control" placeholder="Calculate Quantity">
                         </div>
                     </div>
                     <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                 </div>
             </form>

         </div>
     </div>
 </section>
 @stop