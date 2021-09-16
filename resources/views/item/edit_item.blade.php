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
                         <h3 class="card-title">Update Item</h3>
                     </div>
                     <form action="{{route('update_item',$itemdata['item_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Item Name</label>
                                 <input type="text" name="item_name" class="form-control" value="{{$itemdata['item_name']}}" >
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Item Number</label>
                                 <input type="text" name="item_no" class="form-control" value="{{$itemdata['item_no']}}">
                             </div>
                             <div class="form-group">
                                 <label for="role">Category</label>
                                 <select name="cat_id" id="cat_id" class="form-control">
                                     @foreach( $all_category as $category)
                                     <option @if($itemdata->cat_id == $category->cat_id) selected @endif value="{{$category->cat_id}}">{{$category->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Item Weight</label>
                                 <input type="text" name="item_avg_weight" class="form-control" value="{{$itemdata['item_avg_weight']}}">
                             </div>
                             <div class="form-group"><?php $u_arr=arrayUnit();?>
                                <label for="exampleInputPassword1">Item Weight Unit</label>
                                <select name="unit" class="form-control" placeholder="Enter Unit">
                                    @foreach( $u_arr as $unit)
                                    <option value="{{$unit['unit_id']}}" <?php if($unit['unit_id']==$itemdata['unit_id']){echo "selected";}?>>
                                        {{$unit['name']}}
                                    </option>
                                 @endforeach
                            </select>
                            </div> 
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Batch Number</label>
                                 <input type="text" name="batch_no" class="form-control" value="{{$itemdata['batch_no']}}">
                             </div>
                             <div class="form-group">
                                 <label for="role">Plant name</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option @if($itemdata->plant_id == $plant->plant_id) selected @endif value="{{$plant->plant_id}}">{{$plant->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Manfactring Date</label>
                                 <input type="date" name="manfactring_date" id="manfactring_date" class="form-control" value="{{$itemdata['manfactring_date']}}">
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
 </section>
 @stop