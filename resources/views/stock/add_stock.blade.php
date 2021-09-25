 <!-- for user view -->
 @extends('layout.dashboard')
 @section('content')
 <?php  
 $wc_loc=session()->get('user_wc_loc');
 //dd($wc_loc);
 ?>
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
                 <h3 class="card-title">Add New Inventory</h3>
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
             <form action="{{route('stock.store')}}" method="post">
                 @csrf
                 <div class="card-body">
                     <div class="row">
                         <div class="form-group col-md-4">
                             <label for="item_id">ERP Material Code</label>
                             <input name="item_no" id="item_no" class="form-control item_no" type="text" value="">
                             <input name="item_id" id="item_id" class="form-control item_id" type="hidden" value="">
                             <span class="ui_results1"></span>
                         </div>
                         <div class="form-group col-md-8">
                            <label for="item_id">Item</label>
                            <div class="input-group">
                                <input name="item_name" id="item_name" readonly value="" class="form-control item_name">
                                <input name="item_avg_weight" id="item_avg_weight" readonly value="" class="form-control item_name">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="">Kg.</span>
                                </div>
                              </div>
                         </div>
                         <?php
                            //dd(session()->get('user_wc_loc'));
                         ?>
                         <div class="form-group col-md-6">
                             <!--Auto file-->
                             <label for="plant_id">Plant</label>
                             <input type="hidden" value="{{$wc_loc['plant'][0]['cityplant_id']}}" name="cityplant_id" id="cityplant_id">
                             <input name="" id="" readonly class="form-control" value="{{$wc_loc['plant'][0]['plant']}}" class="form-control">
                         </div>
                         <div class="form-group col-md-3">
                            <!--Auto file-->
                            <label for="weight_scale_id">Weighing machine</label>
                            
                            <select name="weight_scale_id" id="weight_scale_id" class="form-control">
                                <option value="">Select</option>
                                <?php $i= 0;?>
                                @foreach( $wc_loc['WeightScale'] as $wc) 
                                <option data-nos="{{$i}}" value="{{$wc['weight_scale_id']}}">{{$wc['name']}}</option>
                                <?php $i++;?>
                                @endforeach
                            </select>

                        </div>
                         <div class="form-group col-md-3">
                             <label for="plant_id">Location</label> 
                             <input name="location_name" id="location_name" readonly value="" class="form-control" >
                             <input name="plant_id" id="plant_id" value="" type="hidden" class="form-control">
                         </div>
                         <div class="form-group col-md-3">
                             <label for="bin_id">Bin</label>

                             <div class="input-group mb-3">
                                 <select name="bin_id" id="bin_id" class="form-control select2">
                                     @foreach( $all_bin as $bin) 
                                        <option value="{{$bin->bin_id}}">{{$bin->name}}</option>
                                     @endforeach
                                 </select>
                                 <div class="input-group-append">
                                     <a href="{{route('bin.add_bin')}}" class="btn btn-outline-secondary" data-toggle="modal" data-target="#popupGrey">Add Bin</a>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group col-md-2">
                             <label for="batch_id">Batch ID</label>
                             <input type="text" name="batch_id" id="batch_id" class="form-control" placeholder="Enter Batch ID">
                         </div>
                         <div class="form-group col-md-7">
                             <label for="gross_weight">Gross Weight</label>
                             <div class="input-group mb-3">
                                 <input type="text" id="gross_weight" name="gross_weight" class="form-control" placeholder="Enter Total Weight" aria-label="" aria-describedby="basic-addon1">
                                 <div class="input-group-append">
                                     <select name="unit_id" id="unit_id" class="custom-select" style="border-radius: 0;" placeholder="Enter Unit">
                                         @foreach( $all_unit as $unit)
                                         <option <?php if ($unit['unit_id'] == 2) {
                                                        echo  "selected";
                                                    } ?> value="{{$unit['unit_id']}}">{{$unit['name']}}</option>
                                         @endforeach
                                     </select>
                                     <button class="btn btn-outline-success" type="button" name="calculate" id="calculate"><b>Calculate</b></button>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group col-md-4">
                             <label for="bin_weight">Bin Weight</label>
                             <div class="input-group mb-3">
                                 <input type="text" readonly name="bin_weight" id="bin_weight" class="form-control" placeholder="As per the Database Bin Weight" aria-label="Bin Weight">
                                 <div class="input-group-append">
                                     <span class="input-group-text" id="basic-addon2">Kg</span>
                                     <input type="hidden" name="bin_weight_g" id="bin_weight_g">
                                 </div>
                             </div>

                         </div>
                         <div class="form-group col-md-4">
                             <label for="net_weight">Net Weight</label>

                             <div class="input-group mb-3">
                                 <input type="text" readonly name="net_weight" id="net_weight" class="form-control" placeholder="Calculate Net Weigh">
                                 <input type="hidden" name="net_weight_g" id="net_weight_g">
                                 <div class="input-group-append">
                                     <span class="input-group-text" id="basic-addon2">Kg</span>
                                     <input type="hidden" name="bin_weight_g" id="bin_weight_g">
                                 </div>
                             </div>


                         </div>
                         <div class="form-group col-md-4">
                             <label for="counted_quantity">Quantity</label>
                             <input type="text" readonly name="counted_quantity" id="counted_quantity" class="form-control" placeholder="Calculate Quantity">
                         </div>
                         <div class="form-group col-md-12">
                             <label for="remark">Remark</label>
                             <textarea name="remark" id="remark" class="form-control" placeholder="Enter Remark"></textarea>
                         </div>
                     </div>
                     <div class="card-footer">
                         <span class="d-inline-block submit_group" tabindex="0" data-toggle="tooltip" title="Please Enter Valid Gross Weight.">
                             <input type="submit" id="submit" name="submit" class="btn btn-primary" disabled style="pointer-events: none;" value="Submit">
                             <input type="submit" id="submit_p" name="submit" class="btn btn-primary" disabled style="pointer-events: none;" value="Submit and Print">
                         </span>
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <?php $str = '<div class="col-md-12">
         <div class="card card-secondary">
             <form action="' . route('bin.store1') . '" method="post">'
            . csrf_field() . '
                 <div class="card-body">
                     <div class="form-group">
                         <label for="name">Bin Name</label>
                         <input type="text" name="name" id="name" class="form-control" placeholder="Bin name">
                     </div>
                     <div class="form-group">
                         <label for="plant_id">Plant name</label>
                         <select name="plant_id[]" id="plant_id" multiple  class="form-control select2">';
        $p_arr = arrayPlant();
        foreach ($p_arr as $plant) {
            $str .= ' <option value="' . $plant['plant_id'] . '">' . $plant['name']."/".$plant['location'] . '</option>';
        }
        $str .= '  </select>
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
     </div>';
        echo popupGrey('Add Bin', $str);
        ?>
     <script>
         $(function() {
             $.ajax({
                 url: "{{route('stock.get_bin_weight',0)}}",
                 data: "id=" + $('#bin_id').val(),
                 dataType: "html",
                 method: 'GET',
                 success: function(data) {
                     $('#bin_weight').val(data);
                     bin_weight_g = data * 1000;
                     $('#bin_weight_g').val(bin_weight_g);
                 }
             });
             $('#bin_id').change(function() {
                 id = $(this).val(),
                     $.ajax({
                         url: "{{route('stock.get_bin_weight',0)}}",
                         data: "id=" + id,
                         dataType: "html",
                         method: 'GET',
                         success: function(data) {
                             $('#bin_weight').val(data);
                             bin_weight_g = data * 1000;
                             $('#bin_weight_g').val(bin_weight_g);
                         }
                     });
             });
         });
     </script>

     <script>
         $(function() {
             $('#calculate').on("click", function() {
                 unit_id = $("#unit_id").find("option:selected").val();

                 $.ajax({
                     url: "{{route('stock.get_net_weight',0)}}",
                     data: "bin_id=" + $('#bin_id').val() + "&gross_weight=" + $(
                         '#gross_weight').val() + "&unit_id=" + unit_id,
                     dataType: "html",
                     method: 'GET',
                     success: function(data) {
                         $('#net_weight').val(data);

                     }
                 });
                 $.ajax({
                     url: "{{route('stock.get_qty',0)}}",
                     data: "bin_id=" + $('#bin_id').val() + "&gross_weight=" + $(
                         '#gross_weight').val() + "&unit_id=" + unit_id + "&item_id=" + $(
                         '#item_id').val(),
                     dataType: "html",
                     method: 'GET',
                     success: function(data) {
                         $('#counted_quantity').val(data);
                         if (data > 0) {
                             $('#submit').removeAttr('disabled');
                             $('#submit_p').removeAttr('disabled');
                             $('#submit').removeAttr('style');
                             $('#submit_p').removeAttr('style');
                             $('.submit_group').removeAttr('title');
                             $('.submit_group').removeAttr('data-original-title');
                             $('.submit_group').removeAttr('data-toggle');
                         } else {
                             $('#submit').attr('disabled', 'disabled');
                             $('#submit_p').attr('disabled', 'disabled');
                             $('.submit_group').attr('title',
                                 "Please Enter Valid Gross Weight.");
                             $('.submit_group').attr('data-original-title',
                                 "Please Enter Valid Gross Weight.");
                             $('.submit_group').attr('data-toggle', "tooltip");
                         }
                     }
                 });
             });
         });
     </script>
     <script>
         $(document).ready(function() {

             $("#item_no").autocomplete({
                 source: function(request, response) {
                     // Fetch data
                     $.ajax({
                         url: "{{route('stock.get_items')}}",
                         type: 'get',
                         dataType: "json",
                         data: {
                             search: request.term
                         },
                         success: function(data) {
                             response(data);
                         }
                     });
                 },
                 select: function(event, ui) {
                     console.log(ui.item);
                     $('#item_id').val(ui.item.value);
                     $('#item_name').val(ui.item.name);
                     $('#item_no').val(ui.item.label);
                     $('#item_avg_weight').val(ui.item.item_avg_weight);

                     return false;
                 }
             });
         });
            </script>
     <script>
         $(document).ready(function() {
             var json='<?php echo html_entity_decode(session()->get('user_wc_loc_json'), ENT_QUOTES, 'UTF-8')?>';
            var obj = JSON.parse(json);
           
                $("#location_name").val(obj.plant[0].location);//-----------------------------
                $("#plant_id").val(obj.plant[0].plant_id);//-----------------------------
            
            $("#weight_scale_id").on("change", function() {
                var nos = $("#weight_scale_id option:selected").attr("data-nos");
                 console.log(obj);
                $("#location_name").val(obj.plant[nos].location);//-----------------------------
                $("#plant_id").val(obj.plant[nos].plant_id);//-----------------------------
                
                
            });
         });
     </script>

 </section>
 <?php if (request()->route('print') == 1) { ?>
    {{print_js()}}

     <?php $data = $Stockdata; ?>
     <div class="modal fade" id="stockdata_modal" style="display: none;" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">label</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div id="page-wrap">
                         {{print__label_template($data)}}
                     </div>
                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                 </div>
             </div>
             <!-- /.modal-content -->
         </div>

         <!-- /.modal-dialog -->
     </div>

     <script>
         PrintElem('page-wrap');
     </script>
 <?php } ?>
 @stop