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
                         <h3 class="card-title">Add New Item</h3>
                     </div>
                     <form action="{{route('item.store')}}" method="post">
                         @csrf  
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Item Name</label>
                                 <input type="text" name="item_name" class="form-control" placeholder="Enter Item name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Item Number</label>
                                 <input type="number" name="item_no" class="form-control" placeholder="Enter Item number">
                             </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Item Avg Weight</label>
                                <input type="number" name="item_avg_weight" class="form-control" placeholder="Enter Weight">
                            </div>
                            <div class="form-group"><?php $u_arr=arrayUnit();?>
                                <label for="exampleInputPassword1">Item Weight Unit</label>
                                <select name="unit" class="form-control" placeholder="Enter Unit">
                                    @foreach( $u_arr as $unit)
                                    <option value="{{$unit['unit_id']}}">{{$unit['name']}}</option>
                                 @endforeach
                            </select>
                            </div> 
                           <div class="form-group">
                                 <label for="exampleInputPassword1">Batch Number</label>
                                 <input type="number" name="batch_no" class="form-control" placeholder="Enter Batch number">
                             </div>
                             <div class="form-group">
                                 <label for="role">Category</label>
                                 <select name="cat_id" id="cat_id" class="form-control">
                                     @foreach( $all_category as $category)
                                     <option value="{{$category->cat_id}}">{{$category->name}}</option>
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
                                 <label for="exampleInputPassword1">Manfactring Date</label>
                                 <input type="date" id="manfactring_date" name="manfactring_date" class="form-control">
                             </div>
                         </div>
                         <!-- /.card-body -->

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>

 @stop