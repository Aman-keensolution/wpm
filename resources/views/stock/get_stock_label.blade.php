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
         <div class="card card-secondary">
             <div class="card-header">
                 <h3 class="card-title">Update Stock</h3>
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

             <form action="{{route('update_stock',$Stockdata['stock_id'])}}" method="post">
                 @csrf
                 <div class="card-body">
                     <div class="row">
                         <div class="form-group col-md-6">
                             <label for="item_id">Item</label>
                                <select name="item_id" id="item_id" class="form-control">
                                    @foreach( $all_item as $item)
                                    <option @if($Stockdata->item_id == $item->item_id) selected @endif value="{{$item->item_id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                         </div>
                         <div class="form-group col-md-6">
                             <!--Auto file-->
                             <label for="plant_id">Plant</label>
                             <!--Auto file-->
                             <input type="hidden" value="{{$Stockdata->plant_id}}" name="plant_id" id="plant_id">
                             @foreach( $all_plant as $plant)
                             <?php if ($plant->plant_id == $Stockdata->plant_id) { ?>
                                <input name="" id="" readonly class="form-control"  value="{{$plant->name}}" class="form-control" >
                                <?php } ?>

                             @endforeach
                                 <!--Auto file-->
                         </div>
                         <div class="form-group col-md-6">
                            <label for="bin_id">Bin</label>
                            <select name="bin_id" id="bin_id" class="form-control">
                                @foreach( $all_bin as $bin)
                                <option @if($Stockdata->bin_id == $bin->bin_id) selected @endif value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                @endforeach
                            </select>
                         </div>
                         <div class="form-group col-md-6">
                             <!--Auto file-->
                             <label for="weight_scale_id">Weighing machine</label>
                             <!--Auto file-->
                             <input type="hidden" value="{{$Stockdata->weight_scale_id}}" name="weight_scale_id" id="weight_scale_id">
                             <input name="" id="" readonly class="form-control"  value="{{$all_WeightScale[0]->name}}" class="form-control" >
                         </div>
                         <div class="form-group col-md-6">
                             <label for="batch_id">Batch ID</label>
                             <input type="text" name="batch_id" id="batch_id" class="form-control" value="{{$Stockdata['batch_id']}}"
                                 placeholder="Enter Batch ID">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="gross_weight">Gross Weight</label>
                             <div class="input-group mb-3">
                                 <input type="text" id="gross_weight" name="gross_weight" class="form-control"
                                     placeholder="Enter Total Weight" aria-label="" aria-describedby="basic-addon1" value="{{$Stockdata['gross_weight']}}">
                                 <div class="input-group-append">
                                     <select name="unit_id" id="unit_id" class="custom-select" style="border-radius: 0;"
                                         placeholder="Enter Unit">
                                         @foreach( $all_unit as $unit)
                                         <option <?php if($unit['unit_id']==$Stockdata['unit_id']){echo  "selected";}?>
                                             value="{{$unit['unit_id']}}">{{$unit['name']}}</option>
                                         @endforeach
                                     </select>
                                     <button class="btn btn-outline-success" type="button" name="calculate"
                                         id="calculate"><b>Calculate</b></button>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group col-md-4">
                             <label for="bin_weight">Bin Weight</label>
                             <div class="input-group mb-3">
                                 <input value="{{$Stockdata['bin_weight']}} type="text" readonly name="bin_weight" id="bin_weight" class="form-control"
                                     placeholder="As per the Database Bin Weight" aria-label="Bin Weight">
                                 <div class="input-group-append">
                                     <span class="input-group-text" id="basic-addon2">Kg</span>
                                     <input type="hidden" name="bin_weight_g" id="bin_weight_g">
                                 </div>
                             </div>

                         </div>
                         <div class="form-group col-md-4">
                             <label for="net_weight">Net Weight</label>

                             <div class="input-group mb-3">
                                 <input type="text" readonly name="net_weight" id="net_weight" class="form-control"
                                 value="{{$Stockdata['net_weight']}}" placeholder="Calculate Net Weigh">
                                 <input type="hidden" name="net_weight_g" id="net_weight_g">
                                 <div class="input-group-append">
                                     <span class="input-group-text" id="basic-addon2">Kg</span>
                                     <input type="hidden" name="bin_weight_g" id="bin_weight_g">
                                 </div>
                             </div>


                         </div>
                         <div class="form-group col-md-4">
                             <label for="counted_quantity">Quantity</label>
                             <input type="text" readonly name="counted_quantity" id="counted_quantity"
                              value="{{$Stockdata['counted_quantity']}}"  class="form-control" placeholder="Calculate Quantity">
                         </div>
                     </div>
                     <div class="card-footer">
                        <span class="d-inline-block submit_group" tabindex="0" data-toggle="tooltip" title="Please Enter Valid Gross Weight.">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary" disabled style="pointer-events: none;" >Submit</button>                     
                        <button type="submit" id="submit_p" name="submit" class="btn btn-primary" disabled style="pointer-events: none;" >Submit &amp; Print</button>
                        </span>
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <script>
         $(function () { 
             $.ajax({
                 url: "{{route('stock.get_bin_weight',0)}}",
                 data: "id=" + $('#bin_id').val(),
                 dataType: "html",
                 method: 'GET',
                 success: function (data) {
                     $('#bin_weight').val(data);
                     bin_weight_g = data * 1000;
                     $('#bin_weight_g').val(bin_weight_g);
                 }
             });
             $('#bin_id').change(function () {
                 id = $(this).val(),
                     $.ajax({
                         url: "{{route('stock.get_bin_weight',0)}}",
                         data: "id=" + id,
                         dataType: "html",
                         method: 'GET',
                         success: function (data) {
                             $('#bin_weight').val(data);
                             bin_weight_g = data * 1000;
                             $('#bin_weight_g').val(bin_weight_g);
                         }
                     });
             });
         });

     </script>

<script>
    $(function () {
        $('#calculate').on("click", function () {
            unit_id=$("#unit_id").find("option:selected").val();
            
            $.ajax({
                url: "{{route('stock.get_net_weight',0)}}",
                data: "bin_id=" + $('#bin_id').val() + "&gross_weight=" + $(
                    '#gross_weight').val() + "&unit_id=" + unit_id,
                dataType: "html",
                method: 'GET',
                success: function (data) {
                    $('#net_weight').val(data);

                }
            });
            $.ajax({
                url: "{{route('stock.get_qty',0)}}",
                data: "bin_id=" + $('#bin_id').val() + "&gross_weight=" + $(
                    '#gross_weight').val() + "&unit_id=" + unit_id + "&item_id=" + $('#item_id').val(),
                dataType: "html",
                method: 'GET',
                success: function (data) {
                    $('#counted_quantity').val(data);
                    if(data>0){
                        $('#submit').removeAttr('disabled');
                        $('#submit_p').removeAttr('disabled');
                        $('#submit').removeAttr('style');
                        $('#submit_p').removeAttr('style');
                        $('.submit_group').removeAttr('title');
                        $('.submit_group').removeAttr('data-original-title');
                        $('.submit_group').removeAttr('data-toggle');
                   }else{
                        $('#submit').attr('disabled','disabled');
                        $('#submit_p').attr('disabled','disabled');
                        $('.submit_group').attr('title',"Please Enter Valid Gross Weight.");
                        $('.submit_group').attr('data-original-title',"Please Enter Valid Gross Weight.");
                        $('.submit_group').attr('data-toggle',"tooltip");
                    }
               }
            });
        });
    });

</script>
</section>
 @stop
