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
                         <h3 class="card-title">Barcode</h3>
                     </div>
                     <!-- /.card-header -->
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif
                     <form action="" method="Post">
                         @csrf
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="row">
                                         <div class="form-group col-md-8">
                                             <input type="text" name="item_name" id="min" placeholder="Scan Barcode here" class="form-control float-right">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <input type="submit" id="submit" name="submit" class="btn btn-secondary" value="Submit">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="date">Inventory Count Date</label>
                                             <input type="text" id="text" placeholder="Inventory Count Date" class="form-control">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="item_name">Item Name</label>
                                             <input type="text" name="item_name" id="item_name" class="form-control float-right" placeholder="Item Name">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="item_code">ERP Code</label>
                                             <input type="text" name="item_code" id="item_code" class="form-control float-right" placeholder="ERP Code">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="bin_name">Bin Number/Name </label>
                                             <input type="text" name="bin_name" id="bin_name" class="form-control float-right" placeholder="Bin Number/Name">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="plant_name">Plant Name </label>
                                             <input type="text" name="plant_name" id="plant_name" class="form-control float-right" placeholder="Plant Name ">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="location">Plant Location</label>
                                             <input type="text" name="location" id="location" class="form-control float-right" placeholder="Plant Location">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="batch_id">Batch Id </label>
                                             <input type="text" name="batch_id" id="batch_id" class="form-control float-right" placeholder="Batch Id">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="user_name">User Name </label>
                                             <input type="text" name="user_name" id="user_name" class="form-control float-right" placeholder="User Name">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="weight_scale_id">Weighing Machine Id / Name</label>
                                             <input type="text" name="weight_scale_id" id="weight_scale_id" class="form-control float-right" placeholder="Weighing Machine Id / Name">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="gross_weight">Gross Weight</label>
                                             <input type="text" name="gross_weight" id="gross_weight" class="form-control float-right" placeholder="Gross Weight">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="bin_weight">Bin Weight </label>
                                             <input type="text" name="bin_weight" id="bin_weight" class="form-control float-right" placeholder="Bin Weight ">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="net_weight">Net Weight</label>
                                             <input type="text" name="net_weight" id="net_weight" class="form-control float-right" placeholder="Net Weight">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="counted_quantity">Total Quantity</label>
                                             <input type="text" name="counted_quantity" id="counted_quantity" class="form-control float-right" placeholder="Total Quantity">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="price">Per Item Price </label>
                                             <input type="text" name="price" id="price" class="form-control float-right" placeholder="Per Item Price ">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="price">Total Price</label>
                                             <input type="text" name="price" id="price" class="form-control float-right" placeholder="Total Price">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- <div class="card-footer">
                                 <input type="submit" id="submit" name="submit" class="btn btn-success" value="Submit">
                             </div> -->
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->

 </section>
 @stop