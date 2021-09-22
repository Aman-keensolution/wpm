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
         <div class="row ">
             <div class="col-md-12 main-content">
             <div id="page_print">
                 <?php foreach($Stockdatas as $data){?>
                 {{print__label_template($data)}}
                 <div class="clear-fix"></div>
                 
                 <div class="clear-fix"></div>

                 <?php }?>
             </div>
             <div class="clear-fix"></div>

            </div>
        </div>
     </div>

 </section>
 <?php echo print_js();?>
 @stop
