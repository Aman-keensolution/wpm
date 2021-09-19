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
    <div id="page-wrap">
        <?php foreach($Stockdatas as $data){?>
            {{print__label_template($data)}}
        <hr>
        <?php }?>
       </div>
    </section>
    <script>
        function PrintElem(elem) {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');
            var a = "<?php asset('public/assets/css/print.css');?>";
            mywindow.document.write('<html><head><link rel="stylesheet" href="' + a + '"><title>' + document.title +
                '</title><style>@media print {.p3_text{font-size:10px;}}</style>');
            mywindow.document.write('</head><body >');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');
   
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
   
            mywindow.print();
            mywindow.close();
   
            return true;
        }
   
        PrintElem("page-wrap");
   
    </script>
@stop