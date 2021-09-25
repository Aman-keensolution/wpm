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
                         <h3 class="card-title">Update User</h3>
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

                     <form action="{{route('admin.update_user',$userinfo['user_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="{{$userinfo['name']}}" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                 <input type="email"  readonly id="email" class="form-control" value="{{$userinfo['email']}}" placeholder="Enter email">
                             </div>
                             <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Mobile</label>
                                 <input type="number" name="mobile" id="mobile" class="form-control" value="{{$userinfo['mobile']}}" placeholder="Enter mobile no">
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