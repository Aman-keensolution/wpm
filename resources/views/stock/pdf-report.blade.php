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
                 {{print__label_template($Stockdatas)}}
             </div>
             <div class="clear-fix"></div>

            </div>
        </div>
     </div>

 </section>
 <?php echo print_js('page_print');?>
 @stop
