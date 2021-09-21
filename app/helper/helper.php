<?php



use Illuminate\Support\Facades\Storage;

use App\Models\Admin;
use App\Models\Bin;
use App\Models\Category;
use App\Models\Item;
use App\Models\Plant;
use App\Models\WeightScale;
use App\Models\Unit;
use App\Models\Stock;
use App\Models\User;
use Carbon\Carbon;
 
      function sendResponse($status, $msg, $res_code, $data=null)
    {
    	$res = [
            'status' => $status,
            'status_code' => $res_code,
            'message' => $msg,
          ];
    	if($data != null){
    		$res['data'] = $data;
    	}
        return response()->json($res, $res_code);
    }

      function getLocaleDate($date){
        try{
            $monthsArr = __('labels.months');
            $parseDate = explode('-', Carbon::parse($date)->setTimezone(env('GET_TIMEZONE', config('app.timezone')))->format('Y-F-d'));
            return ($monthsArr[strtolower($parseDate[1])].' '.$parseDate[2].', '.$parseDate[0]);
        }catch(\Exception $e){
            return '';
        }
    }

      function getLocaleHRDate($date){
        try{
            return (Carbon::createFromTimeStamp(strtotime($date))->setTimezone(env('GET_TIMEZONE', config('app.timezone')))->diffForHumans());
        }catch(\Exception $e){
            return '';
        }
    }


      function sendEmail($to, $subject, $data, $template, $attachment=null){
        try{
            Mail::send($template, $data, function($message) use($to, $subject) {
                $message->to($to)
                //->cc($moreUsers)
                ->bcc('vishal@keensolution.in')
                ->subject($subject);
            });
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
      function getRandomString(){
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $substr = $charset[rand(0,61)].$charset[rand(0,61)].$charset[rand(0,61)].$charset[rand(0,61)].$charset[rand(0,61)];
        $time = time();
        return md5($substr.$time);
    }
    /*
    setDataTable params:-
    $rurl={{ route('admin.userlist') }};
    $columns =  {data: null, name: 'user_id'},
                {data: 'user_id', name: 'user_id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
    */
      function setDataTable($rurl,$columns){
        $str = "<script type=\"text/javascript\">
        $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              fixedHeader: true,responsive: true,
              \"fnRowCallback\": function( nRow, aData, iDisplayIndex ) {
                var index = iDisplayIndex +1;
                $('td:eq(0)',nRow).html(index);
                return nRow; 
              },
              \"dom\": '<\"top\"f>rt<\"bottom\"ilp><\"clear\">',
              ajax: '".$rurl."',
              columns: [".$columns."]
          });
          
        });
        
        
      </script>";
      return $str;
    }
      function setDataTable_repo($rurl,$columns){ ?>
        <script type="text/javascript">
        $(document).ready(function() {
          // Create date inputs
          minDate = new DateTime($('#min'), {
              format: 'YYYY-MM-DD'
          });
          maxDate = new DateTime($('#max'), {
              format: 'YYYY-MM-DD'
          });
 
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              fixedHeader: true,
              responsive: true,
              "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                var index = iDisplayIndex +1;
                $('td:eq(0)',nRow).html(index);
                return nRow; 
              },
              "dom": '<"top"fB>rt<"bottom"ilp><"clear">',
              ajax:{
                url:'<?php echo $rurl ?>',
                data:function(data){
                    // Read values
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var plant_id = $('#plant_id').val();
                    var bin_id = $('#bin_id').val();
                    var weight_scale_id = $('#weight_scale_id').val();
                    var item_id = $('#item_id').val();

                    // Append to data
                    data.min = min;
                    data.max = max;
                    data.plant_id = plant_id;
                    data.bin_id = bin_id;
                    data.weight_scale_id = weight_scale_id;
                    data.item_id = item_id;
                    
                },
              } ,
              columns: [<?php echo $columns ?>],
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          });
        $('#filter').on('click', function () {
              table.draw();
          });
$(".dt-buttons button").addClass('btn btn-success')
          
        });
      </script><?php
    }
    function popupGrey($title,$str,$id= "popupGrey"){
     $popup='<div class="modal fade" id="'.$id.'" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">'.$title.'</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
              '.$str.'
              </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>';
      return $popup;
    }
    
    function arrayAdmin()
    {
      return Admin::get()->toArray();
    }
    function arrayBin()
    {
      return Bin::get()->toArray();
    }
    function arrayCategory()
    {
      return Category::get()->toArray();
    }
    function arrayItem()
    {
      return Item::get()->toArray();
    }
    function arrayPlant()
    {
      return Plant::get()->toArray();
    }
    function arrayUnit()
    {
      return Unit::get()->toArray();
    }
    function arrayWeightScale()
    {
      return WeightScale::get()->toArray();
    }

    function getCreatedAtAttribute($timestamp,$format = 'M d, Y') {
    return Carbon::parse($timestamp)->format($format);
}
    function print__label_template($data) {
      ?><center><style>.p3_text{font-size:10px;} .item_tbl{border-collapse: collapse;} .item_tbl td{border: 1px solid #cccccc;} .l_text{font-weight:800;}@media print {.p3_text{font-size:10px;} .item_tbl{border-collapse: collapse;} .item_tbl td{border: 1px solid #cccccc;} .l_text{font-weight:800;}}</style>
      <table width="380" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td colspan="2" class="p3_text"><span><img width="72px" height="48px" src="
             <?php echo asset('public/images/bw_logo.png'); ?>"></span><br></td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td><?php $shot_code=$data->plant->shot_code.$data->weightScale->shot_code.$data->plant->location_shot_code."s".$data->stock_id;?>
              <td colspan="5" class="p3_text l_text"><b>Tag No</b>- <?php echo $shot_code; ?> <br>
                  
                  <?php echo DNS1D::getBarcodeSVG($shot_code, "C39", 1, 25, '#2A3239') ?><br></td>
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
              <td class="p3_text l_text">BIN No</td>
              <td colspan="3" class="p3_text"><?php echo $data->bin->name; ?></td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text l_text">Date :</td>
              <td colspan="3" class="p3_text"><?php echo getCreatedAtAttribute($data->assign_date,'d-m-Y'); ?></td>
          </tr>
          <tr>
              <td class="p3_text l_text">Plant:</td>
              <td colspan="3" class="p3_text"><?php echo $data->plant->name; ?></td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text l_text">Location:</td>
              <td colspan="3" class="p3_text"><?php echo $data->plant->location; ?></td>
          </tr>
          <tr>
              <td class="p3_text l_text">ERP Code</td>
              <td colspan="3" class="p3_text"><?php echo $data->item_no; ?></td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td colspan="4" class="p3_text"><span class=" l_text">Weighing Scale No-</span><?php echo $data->weightScale->weight_scale_no; ?>
              </td>
          </tr>
          <tr>
              <td colspan="10" class="">
                  <table border="1" cellspacing="0" cellpadding="0" class="item_tbl">
                      <tr>
                          <td class="p3_text l_text">ERP Code</td>
                          <td colspan="2" class="p3_text l_text">Item Name</td>
                          <td class="p3_text l_text">Unit Wt.</td>
                          <td class="p3_text l_text">Gross Wt.</td>
                          <td class="p3_text l_text">Bin Wt.</td>
                          <td class="p3_text l_text">Net Wt.</td>
                          <td class="p3_text l_text">No. of PCs</td>
                          <td colspan="2" class="p3_text l_text">Remarks</td>
                      </tr>
                      <tr>
                          <td class="p3_text"><?php echo $data->item_no; ?></td>
                          <td colspan="2" class="p3_text"><?php echo $data->item->name; ?></td>
                          <td class="p3_text"><?php echo $data->unit->code_name; ?></td>
                          <td class="p3_text"><?php echo $data->gross_weight; ?></td>
                          <td class="p3_text"><?php echo $data->bin_weight; ?></td>
                          <td class="p3_text"><?php echo $data->net_weight; ?></td>
                          <td class="p3_text"><?php echo $data->counted_quantity; ?></td>
                          <td colspan="2" class="p3_text"><?php echo $data->remark; ?></td>
                      </tr>
                  </table>
              </td>
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
              <td colspan="2" class="p3_text l_text">Prepared By: </td>
              <td colspan="3" class="p3_text"><?php echo $data->user->name; ?></td>
              <td colspan="2" class="p3_text l_text">Checked by: </td>
              <td colspan="3" class="p3_text"></td>
          </tr>
          <tr>
              <td colspan="2" class="p3_text l_text">Inventory Controller</td>
              <td colspan="3" class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>
              <td class="p3_text">&nbsp;</td>

          </tr>
      </table>
  </center>
  <?php
}
