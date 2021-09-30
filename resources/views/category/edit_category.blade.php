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
                         <h3 class="card-title">Update Category</h3>
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

                     <form action="{{route('update_category',$category_list['cat_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <?php if ($category_list['p_id'] == 0) : ?>
                                 <div class="form-group">
                                     <label for="name">Category Name</label>
                                     <input type="text" name="name" id="name" class="form-control" value="{{$category_list['name']}}">
                                 </div>
                             <?php else : ?>
                                 <div class="form-group">
                                     <label for="name">Parent Category Name</label>
                                     <input type="text" name="name" id="name" class="form-control" value="{{$category_list['name']}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="p_id">Parent Category</label>
                                     <select name="p_id" id="p_id" class="form-control select2">
                                         @foreach( $all_category as $category)
                                         <option @if($category_list->p_id == $category->cat_id) selected @endif value="{{$category->cat_id}}">{{$category->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             <?php endif; ?>
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