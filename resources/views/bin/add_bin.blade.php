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
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif

                     <form action="{{route('bin.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Bin Name</label>
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Bin name">
                             </div>
                             <div class="form-group">
                                 <label for="cityplant_id">plant name</label>
                                 <?php $p_arr = arrayCityPlant(); ?>
                                 <select name="cityplant_id[]" id="cityplant_id" multiple class="form-control select2 ">
                                     @foreach( $p_arr as $cityplant)
                                     <option value="{{$cityplant['cityplant_id']}}">{{$cityplant['name']}}}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="bin_weight">Bin Tare Weight</label>
                                 <div class="input-group mb-3">
                                     <input type="text" name="bin_weight" id="bin_weight" class="form-control" placeholder="Bin Weight" aria-label="Bin Weight">
                                     <div class="input-group-append">
                                         <span class="input-group-text" id="basic-addon2">Kg</span>
                                         <input type="hidden" name="bin_weight_g" id="bin_weight_g">
                                     </div>
                                 </div>
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