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
                                 <label for="exampleInputEmail1">Plant Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Plant name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Plant address</label>
                                 <input type="text" name="plant_address" class="form-control" placeholder="Enter plant address">
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