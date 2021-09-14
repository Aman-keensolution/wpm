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
                         <h3 class="card-title">Add New Weighing</h3>
                     </div>
                     <form action="{{route('weighing.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="role">Plant</label>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $all_plant as $plant)
                                     <option value="{{$plant->plant_id}}">{{$plant->name}}</option>
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