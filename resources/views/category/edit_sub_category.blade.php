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
                         <h3 class="card-title">Update Parent Category</h3>
                     </div>
                     <form action="{{route('update_sub_category',$category_list['cat_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Parent Category Name</label>
                                 <input type="text" name="name" class="form-control" value="{{$category_list['name']}}">
                             </div>
                             <div class="form-group">
                                 <label for="role">Parent Category</label>
                                 <select name="p_id" id="p_id" class="form-control">
                                     @foreach( $all_category as $category)
                                     <option @if($category_list->p_id == $category->cat_id) selected @endif value="{{$category->cat_id}}">{{$category->name}}</option>
                                     @endforeach
                                 </select>
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