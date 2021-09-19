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
        <center>
            <table width="380" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="2" class="p3_text"><span><img width="72px" height="48px" src="
                   {{asset('public/images/bw_logo.png')}}"></span><br></td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td><?php $shot_code=$data->plant->shortcode.$data->weightScale->shortcode.$data->plant->location_shot_code.$data->stock_id;?>
                    <td colspan="5" class="p3_text"><b>Tag No</b> - {{$shot_code}} <br>
                        <br>
                        {!! DNS1D::getBarcodeHTML($shot_code, "C128",1.4,22) !!}</td>
                </tr>
                <tr>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                    <td width="10%" class="p3_text">&nbsp;</td>
                </tr>
                <tr>
                    <td class="p3_text">BIN No</td>
                    <td colspan="3" class="p3_text">{{$data->bin->name}}</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">Date :</td>
                    <td colspan="3" class="p3_text">{{$data->assign_date}}</td>
                </tr>
                <tr>
                    <td class="p3_text">Plant:</td>
                    <td colspan="3" class="p3_text">{{$data->plant->name}}</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">Location:</td>
                    <td colspan="3" class="p3_text">{{$data->plant->location}}</td>
                </tr>
                <tr>
                    <td class="p3_text">ERP Code</td>
                    <td colspan="3" class="p3_text">{{$data->item_no}}</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td colspan="4" class="p3_text">Weighing Scale No
                        <br>{{$data->weightScale->weight_scale_no}}
                    </td>
                </tr>
                <tr>
                    <td colspan="10" class="">
                        <table border="1" cellspacing="0" cellpadding="0" >
                            <tr>
                                <td class="p3_text">ERP Code</td>
                                <td colspan="2" class="p3_text">Item Name</td>
                                <td class="p3_text">Unit Wt.</td>
                                <td class="p3_text">Gross Wt.</td>
                                <td class="p3_text">Bin Wt.</td>
                                <td class="p3_text">Net Wt.</td>
                                <td class="p3_text">No. of PCs</td>
                                <td colspan="2" class="p3_text">Remarks</td>
                            </tr>
                            <tr>
                                <td class="p3_text">{{$data->item_no}}</td>
                                <td colspan="2" class="p3_text">{{$data->item->name}}</td>
                                <td class="p3_text">{{$data->unit->code_name}}</td>
                                <td class="p3_text">{{$data->gross_weight}}</td>
                                <td class="p3_text">{{$data->bin_weight}}</td>
                                <td class="p3_text">{{$data->net_weight}}</td>
                                <td class="p3_text">{{$data->counted_quantity}}</td>
                                <td colspan="2" class="p3_text">{{$data->remark}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="p3_text">Prepared By</td>
                    <td colspan="3" class="p3_text">{{$data->user->name}}</td>
                    <td colspan="2" class="p3_text">Checked by </td>
                    <td colspan="3" class="p3_text"></td>
                </tr>
                <tr>
                    <td colspan="2" class="p3_text">Inventory Controller</td>
                    <td colspan="3" class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>
                    <td class="p3_text">&nbsp;</td>

                </tr>
            </table>
        </center>
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