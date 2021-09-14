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
                         <h3 class="card-title">Add New Category</h3>
                     </div>
                     <form action="{{route('category.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Category-Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Category-Name">
                             </div>
                             <div class="form-group">
                                 <label for="role">Sub-Category</label>
                                 <select name="p_id" id="p_id" class="form-control">
                                     @foreach( $all_category as $category)
                                     <option value="{{$category->cat_id}}">{{$category->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <!-- <div class="form-group">
                                 <label for="exampleInputEmail1">Sub-Category</label>
                                 <input type="text" name="p_id" class="form-control" placeholder="Enter Sub Category-Name">
                             </div> -->
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