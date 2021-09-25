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
                         <h3 class="card-title">Update Plant</h3>
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

                     <form action="{{route('update_plant',$plant_data['plant_id'])}}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Plant Name</label>
                                 <label for="cityplant_id">Plant Name</label>
                                 <select name="cityplant_id" id="cityplant_id" class="form-control" placeholder="Enter Plant name">
                                    @foreach( $all_cityplant as $cityplant)
                                    <option @if($plant_data->cityplant_id == $cityplant->cityplant_id) selected @endif value="{{$cityplant->cityplant_id}}">{{$cityplant->name}}</option>
                                    <?php $sbd[$cityplant->cityplant_id]['sc'] = $cityplant->short_code; ?>
                                    @endforeach
                                 </select>
                                 <input type="hidden" name="name" id="name" class="form-control" value="{{$plant_data['name']}} placeholder="Enter Plant name">
                             </div>
                             <div class="form-group">
                                 <label for="plant_address">Plant address</label>
                                 <input type="text" name="plant_address" id="plant_address" class="form-control" value="{{$plant_data['plant_address']}}">
                             </div>
                             <div class="form-group">
                                 <label for="short_code">Short Code</label>
                                 <input readonly type="text" name="short_code" id="short_code" maxlength="6" class="form-control" value="{{$plant_data['short_code']}}">
                             </div>
                             <div class="form-group">
                                 <label for="location">Location</label>
                                 <input type="text" name="location" id="location" class="form-control" value="{{$plant_data['location']}}">
                             </div>
                             <div class="form-group">
                                 <label for="location_short_code">Location Code</label>
                                 <input type="text" name="location_short_code" id="location_short_code" class="form-control" value="{{$plant_data['location_short_code']}}">
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
     <script>
     $(document).ready(function() {
              
        var json='<?php echo html_entity_decode(json_encode($sbd), ENT_QUOTES, 'UTF-8')?>';
              
            //var json='{"1":{"sc":"BWL"},"2":{"sc":"SBD"},"3":{"sc":"FBD"}}';
            var obj = JSON.parse(json);
            var selectedText = $("#cityplant_id option:selected").text();
        v=$("#cityplant_id").val();
            $("#name").val(selectedText);
            
            $("#short_code").val(obj[1].sc);//-----------------------------

        $("#cityplant_id").on("change", function() {
            var selectedText = $("#cityplant_id option:selected").text();
            v=$("#cityplant_id").val();
            
            $("#short_code").val(obj[v].sc);//-----------------------------
            $("#name").val(selectedText);
            
        });
    });
 </script>
 </section>
 @stop