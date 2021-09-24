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
                         <h3 class="card-title">Add New User</h3>
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

                     <form action="{{route('admin.store')}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                             </div>
                             <div class="form-group">
                                 <label for="email">Email address</label>
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                             </div>
                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                             </div>
                             <div class="form-group">
                                 <label for="number">Mobile</label>
                                 <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile no">
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