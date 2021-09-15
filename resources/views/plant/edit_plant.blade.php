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
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Update Plant</h3>
                     </div>
                     <form action="{{route('update_plant',$plant_data['plant_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Plant Name</label>
                                 <input type="text" name="name" class="form-control" value="{{$plant_data['name']}}" placeholder="Enter Plant name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Plant address</label>
                                 <input type="text" name="plant_address" class="form-control" value="{{$plant_data['plant_address']}}" placeholder="Enter Plant address">
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