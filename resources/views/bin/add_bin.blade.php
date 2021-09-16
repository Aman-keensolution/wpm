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
                         <h3 class="card-title">Add New bin</h3>
                     </div>
                     <form action="{{route('bin.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Bin Name</label>
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Bin name">
                             </div>
                             <div class="form-group">
                                 <label for="plant_id">Plant name</label>
                                 <?php $p_arr = arrayPlant(); ?>
                                 <select name="plant_id" id="plant_id" class="form-control">
                                     @foreach( $p_arr as $plant)
                                     <option value="{{$plant['plant_id']}}">{{$plant['name']}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="bin_weight">Bin Weight</label>
                                 <input type="number" name="bin_weight" id="bin_weight" class="form-control" placeholder="Bin Weight">
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