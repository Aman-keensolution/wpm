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
                         <h3 class="card-title">Add New Plant</h3>
                     </div>
                     <form action="{{route('plant.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Plant Name</label>
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Enter Plant name">
                             </div>
                             <div class="form-group">
                                 <label for="plant_address">Plant address</label>
                                 <input type="text" name="plant_address" id="plant_address" class="form-control" placeholder="Enter plant Address">
                             </div>
                             <div class="form-group">
                                 <label for="short_code">Short Code</label>
                                 <input type="text" name="short_code" id="short_code" maxlength="6" class="form-control" placeholder="Enter Short Code">
                             </div>
                             <div class="form-group">
                                 <label for="location">Location</label>
                                 <input type="text" name="location" id="location" class="form-control" placeholder="Enter location">
                             </div>
                             <div class="form-group">
                                 <label for="location_short_code">Location Code</label>
                                 <input type="text" name="location_short_code" id="location_short_code" class="form-control" placeholder="Enter location short code">
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