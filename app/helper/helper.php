<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

use App\Models\Admin;
use App\Models\Bin;
use App\Models\Category;
use App\Models\Item;
use App\Models\Plant;
use App\Models\Stock;
use App\Models\User;
use App\Models\WeightScale;

use Carbon\Carbon;
 
class Helper
{
    public static function sendResponse($status, $msg, $res_code, $data=null)
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

    public static function getLocaleDate($date){
        try{
            $monthsArr = __('labels.months');
            $parseDate = explode('-', Carbon::parse($date)->setTimezone(env('GET_TIMEZONE', config('app.timezone')))->format('Y-F-d'));
            return ($monthsArr[strtolower($parseDate[1])].' '.$parseDate[2].', '.$parseDate[0]);
        }catch(\Exception $e){
            return '';
        }
    }

    public static function getLocaleHRDate($date){
        try{
            return (Carbon::createFromTimeStamp(strtotime($date))->setTimezone(env('GET_TIMEZONE', config('app.timezone')))->diffForHumans());
        }catch(\Exception $e){
            return '';
        }
    }


    public static function sendEmail($to, $subject, $data, $template, $attachment=null){
        try{
            Mail::send($template, $data, function($message) use($to, $subject) {
                $message->to($to)
                //->cc($moreUsers)
                ->bcc('anuj.chauhan@opalina.in')
                ->subject($subject);
            });
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function getRandomString(){
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
    public static function setDataTable($rurl,$columns){
        $str = "<script type=\"text/javascript\">
        $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              \"dom\": '<\"top\"f>rt<\"bottom\"ilp><\"clear\">',
              ajax: ".$rurl.",
              columns: [".$columns."]
          });
          
        });
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        
      </script>";
      return $str;
    }
    
}
