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
                         <h3 class="card-title">Update Plant</h3>
                     </div>
                     <form action="{{route('update_plant',$plant_data['plant_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Plant Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="{{$plant_data['name']}}">
                             </div>
                             <div class="form-group">
                                 <label for="plant_address">Plant address</label>
                                 <input type="text" name="plant_address" id="plant_address" class="form-control" value="{{$plant_data['plant_address']}}">
                             </div>
                             <div class="form-group">
                                 <label for="short_code">Short Code</label>
                                 <input type="text" name="short_code" id="short_code" maxlength="6" class="form-control" value="{{$plant_data['short_code']}}">
                             </div>
                             <div class="form-group">
                                 <label for="location">Location</label>
                                 <input type="text" name="location" id="location" class="form-control" value="{{$plant_data['location']}}">
                             </div>
                             <div class="form-group">
                                 <label for="location_short_code">Location Code</label>
                                 <input type="text" name="location_short_code" id="location_short_code" class="form-control" value="{{$plant_data['location_short_code']}}">
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