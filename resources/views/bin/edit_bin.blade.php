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
                         <h3 class="card-title">Update bin</h3>
                     </div>
                     <form action="{{route('update_bin',$bindata['bin_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Bin-Name</label>
                                 <input type="text" name="name" class="form-control" value="{{$bindata['name']}}" placeholder="Enter Bin name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Plant-Name</label>
                                 <input type="text" name="email" class="form-control" value="{{$bindata['name']}}" placeholder="Enter Plant-Name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Bin-Weight</label>
                                 <input type="number" name="number" class="form-control" value="{{$bindata['weight']}}" placeholder="Enter Bin-Weight">
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