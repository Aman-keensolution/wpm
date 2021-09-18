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
    function popupGray($title,$str,$id="popupGray"){
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
