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
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif

                     <form action="{{route('update_item',$itemdata['item_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Item Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="{{$itemdata['name']}}">
                             </div>
                             <div class="form-group">
                                 <label for="item_no">ERP Material No.</label>
                                 <input type="text" name="ERP Material No." id="item_no" class="form-control" value="{{$itemdata['item_no']}}">
                             </div>

                             <div class="form-group">
                                 <label for="price">Item Price</label>
                                 <input type="number" name="price" id="price" class="form-control" value="{{$itemdata['price']}}">
                             </div>

                             <div class="form-group">
                                 <label for="cat_id">Category</label>
                                 <select name="cat_id" id="cat_id" class="form-control">
                                     @foreach( $all_category as $category)
                                     <option @if($itemdata->cat_id == $category->cat_id) selected @endif
                                         value="{{$category->cat_id}}">{{$category->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="item_avg_weight">Item Weight</label>
                                 <input type="text" name="item_avg_weight" id="item_avg_weight" class="form-control" value="{{$itemdata['item_avg_weight']}}">
                             </div>
                             <div class="form-group"><?php $u_arr = arrayUnit(); ?>
                                 <label for="unit_id">Item Weight Unit</label>
                                 <select name="unit_id" class="form-control" placeholder="Enter Unit">
                                     @foreach( $u_arr as $unit)
                                     <option value="{{$unit['unit_id']}}" <?php if ($unit['unit_id'] == $itemdata['unit_id']) {
                                                                                echo "selected";
                                                                            } ?>>
                                         {{$unit['name']}}
                                     </option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="batch_no">Batch Number</label>
                                 <input type="text" name="batch_no" id="batch_no" class="form-control" value="{{$itemdata['batch_no']}}">
                             </div>
                             <div class="form-group">
                                 <label for="cityplant_id">Plant name</label>
                                 <select name="cityplant_id" id="cityplant_id" class="form-control">
                                     @foreach( $all_cityplant as $cityplant)
                                     <option @if($itemdata->cityplant_id == $cityplant->cityplant_id) selected @endif
                                         value="{{$cityplant->cityplant_id}}">{{$cityplant->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="manfactring_date">Manfactring Date</label>
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