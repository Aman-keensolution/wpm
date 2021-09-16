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
                     <form action="{{route('update_weighing',$WeightScaledata['weight_scale_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" name="name" class="form-control" value="{{$WeightScaledata['name']}}" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Weighing Scale No.</label>
                                <input type="text" name="weight_scale_no" class="form-control"  value="{{$WeightScaledata['weight_scale_no']}}"  placeholder="Enter Weighing Scale No.">
                            </div>
                             <div class="form-group">
                                 <label for="role">Plant name</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option @if($WeightScaledata->plant_id == $plant->plant_id) selected @endif value="{{$plant->plant_id}}">{{$plant->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                <label for="role">Assign User Name</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach( $all_user as $user)
                                    <option @if($WeightScaledata->user_id == $user->user_id) selected @endif  value="{{$user->user_id}}">{{$user->name}}</option>
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