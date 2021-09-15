 <!-- for user view -->
 @extends('layout.dashboard')
 @section('content')
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-12">

         </div>
     </div>
 </div>

 <!-- <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Add New Stock</h3>
                     </div>
                     <form action="{{route('stock.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="role">Item</label>
                                 <select name="item_id" id="item_id" class="form-control">
                                     @foreach( $all_item as $item)
                                     <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="role">Bin</label>
                                 <select name="bin_id" id="bin_id" class="form-control">
                                     @foreach( $all_bin as $bin)
                                     <option value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="role">Plant</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option value="{{$plant->plant_id}}">{{$plant->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="role">User</label>
                                 <select name="assigned_user_id" id="assigned_user_id" class="form-control">
                                     @foreach( $all_user as $admin)
                                     <option value="{{$admin->user_id}}">{{$admin->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Date</label>
                                 <input type="date" name="assign_date" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Batch ID</label>
                                 <input type="date" name="batch_id" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Total Weight</label>
                                 <input type="date" name="total_weight" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Net Weight</label>
                                 <input type="date" name="net_weight" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Bin Weight</label>
                                 <input type="date" name="bin_weight" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Quantity</label>
                                 <input type="date" name="counted_quantity" class="form-control" placeholder="Enter name">
                             </div>
                         </div>
                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section> -->
 <section class="content">
     <div class="container-fluid">
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title">Add New Stock</h3>
             </div>
             <form action="{{route('stock.store')}}" method="post">
                 @csrf
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="role">Item</label>
                                 <select name="item_id" id="item_id" class="form-control">
                                     @foreach( $all_item as $item)
                                     <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="role">Bin</label>
                                 <select name="bin_id" id="bin_id" class="form-control">
                                     @foreach( $all_bin as $bin)
                                     <option value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Date</label>
                                 <input type="date" name="assign_date" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Batch ID</label>
                                 <input type="text" name="batch_id" class="form-control" placeholder="Enter Batch ID">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Total Weight</label>
                                 <input type="text" name="total_weight" class="form-control" placeholder="Enter Total Weight">
                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="role">Plant</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option value="{{$plant->plant_id}}">{{$plant->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="role">User</label>
                                 <select name="assigned_user_id" id="assigned_user_id" class="form-control">
                                     @foreach( $all_user as $admin)
                                     <option value="{{$admin->user_id}}">{{$admin->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Net Weight</label>
                                 <input type="text" name="net_weight" class="form-control" placeholder="Enter Net Weigh">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Bin Weight</label>
                                 <input type="text" name="bin_weight" class="form-control" placeholder="Enter Bin Weight">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Quantity</label>
                                 <input type="text" name="counted_quantity" class="form-control" placeholder="Enter Quantity">
                             </div>
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