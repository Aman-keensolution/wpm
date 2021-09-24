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
                         <h3 class="card-title">Update Weighing Scale</h3>
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

                     <form action="{{route('update_weighing',$WeightScaledata['weight_scale_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="{{$WeightScaledata['name']}}" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="weight_scale_no">Weighing Scale No.</label>
                                 <input type="text" name="weight_scale_no" id="weight_scale_no" class="form-control" value="{{$WeightScaledata['weight_scale_no']}}" placeholder="Enter Weighing Scale No.">
                             </div>
                             <div class="form-group">
                                 <label for="short_code">Short Code</label>
                                 <input type="short_code" name="short_code" id="short_code" class="form-control" value="{{$WeightScaledata['short_code']}}" placeholder="Enter short_code">
                             </div>
                             <div class="form-group">
                                 <label for="capicity">Capicity</label>
                                 <input type="text" name="capicity" id="capicity" class="form-control" value="{{$WeightScaledata['capicity']}}">
                             </div>
                             <div class="form-group">
                                 <label for="unit_id">Unit</label>
                                 <select name="unit_id" id="unit_id" class="form-control">
                                     @foreach( $all_unit as $unit)
                                     <option @if($WeightScaledata->unit_id == $unit->unit_id) selected @endif value="{{$unit->unit_id}}">{{$unit->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="plant_id">Plant name</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option @if($WeightScaledata->plant_id == $plant->plant_id) selected @endif value="{{$plant->plant_id}}">{{$plant->name}}/{{$plant->location}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="user_id">Assign User Name</label>
                                 <select name="user_id" id="user_id" class="form-control">
                                     @foreach( $all_user as $user)
                                     <option @if($WeightScaledata->user_id == $user->user_id) selected @endif value="{{$user->user_id}}">{{$user->name}}</option>
                                     @endforeach
                                 </select>
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