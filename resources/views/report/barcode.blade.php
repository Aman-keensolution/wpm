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

                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="row">
                                     <div class="form-group col-md-8">
                                         <input type="text" name="id" id="id" placeholder="Scan Barcode here" class="form-control float-right">
                                     </div>{{ csrf_field()}}
                                     <div class="form-group col-md-4">
                                         <input type="submit" id="searchbtn" name="searchbtn" class="btn btn-secondary" value="Submit">
                                     </div>

                                     <div class="form-group col-md-4">
                                         <label for="date">Inventory Count Date</label>
                                         <input type="text" id="assign_date" readonly placeholder="Inventory Count Date" class="form-control">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="item_name">Item Name</label>
                                         <input type="text" name="item_name" readonly id="item_name" class="form-control float-right" placeholder="Item Name">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="item_code">ERP Code</label>
                                         <input type="text" name="item_code" readonly id="item_code" class="form-control float-right" placeholder="ERP Code">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="bin_name">Bin Number/Name </label>
                                         <input type="text" name="bin_name" readonly id="bin_name" class="form-control float-right" placeholder="Bin Number/Name">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="plant_name">Plant Name </label>
                                         <input type="text" name="plant_name" readonly id="plant_name" class="form-control float-right" placeholder="Plant Name ">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="location">Plant Location</label>
                                         <input type="text" name="location" readonly id="location" class="form-control float-right" placeholder="Plant Location">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="batch_id">Batch Id </label>
                                         <input type="text" name="batch_id" readonly id="batch_id" class="form-control float-right" placeholder="Batch Id">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="user_name">User Name </label>
                                         <input type="text" name="user_name" readonly id="user_name" class="form-control float-right" placeholder="User Name">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="weight_scale_id">Weighing Machine Id / Name</label>
                                         <input type="text" name="weight_scale_id" readonly id="weight_scale_id" class="form-control float-right" placeholder="Weighing Machine Id / Name">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="gross_weight">Gross Weight</label>
                                         <input type="text" name="gross_weight" readonly id="gross_weight" class="form-control float-right" placeholder="Gross Weight">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="bin_weight">Bin Weight </label>
                                         <input type="text" name="bin_weight" readonly id="bin_weight" class="form-control float-right" placeholder="Bin Weight ">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="net_weight">Net Weight</label>
                                         <input type="text" name="net_weight" readonly id="net_weight" class="form-control float-right" placeholder="Net Weight">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="counted_quantity">Total Quantity</label>
                                         <input type="text" name="counted_quantity" readonly id="counted_quantity" class="form-control float-right" placeholder="Total Quantity">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="price">Per Item Price </label>
                                         <input type="text" name="price" id="price" readonly class="form-control float-right" placeholder="Per Item Price ">
                                     </div>
                                     <div class="form-group col-md-4">
                                         <label for="price">Total Price</label>
                                         <input type="text" name="price" id="price" readonly class="form-control float-right" placeholder="Total Price">
                                     </div>

                                 </div>
                             </div>
                         </div>

                     </div>


                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
     <script type="text/javascript">
         $(document).ready(function() {
             $('#searchbtn').click(function(e) {
                 e.preventDefault();
                 var id = $('input[name=id]').val();
                 id = id.split("S");
                 id1 = id.slice(-1)[0];

                 $.ajax({
                     type: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     url: "{{route('report.barcodedata')}}",
                     data: {
                         _token: $('meta[name="csrf-token"]').attr('content'),
                         'id1': id1
                     },
                     dataType: "json",
                     success: function(data) {
                         $("#assign_date").val(data.assign_date);
                         $("#item_name").val(data.item['name']);
                         $("#item_code").val(data.item['item_no']);
                         $("#bin_name").val(data.bin['name']);
                         $("#plant_name").val(data.cityplant['name']);
                         $("#location").val(data.cityplant['location']);
                         $("#batch_id").val(data.batch_id);
                         $("#user_name").val(data.user['name']);
                         $("#weight_scale_id").val(data.weight_scale['name']);
                         $("#gross_weight").val(data.gross_weight);
                         $("#bin_weight").val(data.bin['bin_weight']);
                         $("#net_weight").val(data.net_weight);
                         $("#counted_quantity").val(data.counted_quantity);
                         $("#price").val(data.item['price']);
                         $("#price").val(data.item['price']);
                     }
                 });
             });
         });
     </script>
 </section>
 @stop