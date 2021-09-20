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
                         <h3 class="card-title">Add New Weighing Scale</h3>
                     </div>
                     <form action="{{route('weighing.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="weight_scale_no">Weighing Scale No.</label>
                                 <input type="text" name="weight_scale_no" class="form-control" placeholder="Enter Weighing Scale No.">
                             </div>
                             <div class="form-group">
                                 <label for="shot_code">Shot Code No.</label>
                                 <input type="text" name="shot_code" class="form-control" placeholder="Enter Shot Code No.">
                             </div>
                             <div class="form-group">
                                 <label for="capicity">Capicity</label>
                                 <input type="text" name="capicity" class="form-control" placeholder="Enter Capicity">
                             </div>
                             <div class="form-group">
                                 <label for="plant_id">Plant</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option value="{{$plant->plant_id}}">{{$plant->name}}/{{$plant->location}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="unit_id">Unit</label>
                                 <select name="unit_id" id="unit_id" class="form-control">
                                     @foreach( $all_unit as $unit)
                                     <option value="{{$unit->unit_id}}">{{$unit->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="user_id">Assign User Name</label>
                                 <select name="user_id" id="user_id" class="form-control">
                                     @foreach( $all_user as $user)
                                     <option value="{{$user->user_id}}">{{$user->name}}</option>
                                     @endforeach
                                 </select>
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