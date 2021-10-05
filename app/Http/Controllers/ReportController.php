<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Bin;
use App\Models\Category;
use App\Models\CityPlant;
use App\Models\WeightScale;
use App\Models\Plant;
use App\Models\Stock;
use Illuminate\Http\Request;

use Redirect, Response;


class ReportController extends Controller
{

    public function report_list(Request $request)
    {
         if (session()->has('Admin_login')) {
            $all_bin = Bin::all();
            $all_plant = CityPlant::all();
            $all_cats = Category::all();
            $all_cat=array();
            foreach($all_cats as $ac)
            {
                $all_cat[$ac->cat_id] = $ac->name;
            }
            $all_plant = CityPlant::all();
            $all_WeightScale = WeightScale::all();
            $query = Stock::select('*')->with('plant', 'item', 'bin', 'user', 'weightScale', 'unit', 'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);

            if ($request->input('min') != '' && $request->input('max') != '') {
                $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
            }
            if ($request->input('cityplant_id') != '') {
                $query->where('cityplant_id', $request->cityplant_id);
            }
            if ($request->input('item_id') != '') {
                $query->where('item_id', $request->input('item_id'));
            }
            if ($request->input('plant_id') != '') {
                $query->where('plant_id', $request->input('plant_id'));
            }
            if ($request->input('bin_id') != '') {
                $query->where('bin_id', $request->input('bin_id'));
            }
            if ($request->input('weight_scale_id') != '') {
                $query->where('weight_scale_id', $request->input('weight_scale_id'));
            }

            $data= $query->paginate(20);
            
            return view('report.report',compact('data'))->with(['all_bin' => $all_bin, 'all_plant' => $all_plant, 'all_cat' => $all_cat,'all_WeightScale' => $all_WeightScale ]);
        }
        return redirect()->route('admin');
    }

    public function report_list1(Request $request)
    {
        if (session()->has('Admin_login')) {
    
            
            $all_cats = Category::all();
            $all_cat=array();
            foreach($all_cats as $ac)
            {
                $all_cat[$ac->cat_id] = $ac->name;
            }
            $all_plant = CityPlant::all();
            $query = Stock::select('*')->with('plant', 'item', 'bin','cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);

            if ($request->input('min') != '' && $request->input('max') != '') {
                $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
            }
            if ($request->input('cityplant_id') != '') {
                $query->where('cityplant_id', $request->cityplant_id);
            }
            if ($request->input('item_id') != '') {
                $query->where('item_id', $request->input('item_id'));
            }
            if ($request->input('plant_id') != '') {
                $query->where('plant_id', $request->input('plant_id'));
            }
            $data = $query->paginate(20);
            return view('report.report1', compact('data'))->with(['all_cat' => $all_cat,'all_plant' => $all_plant]);
        }
        return redirect()->route('admin');
    }

    public function report_list_user(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = CityPlant::all();
            $all_item = Item::all();

            $query =  Stock::select('*')->with( 'item', 'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);

            if ($request->input('min') != '' && $request->input('max') != '') {
                $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
            }
            if ($request->input('cityplant_id') != '') {
                $query->where('cityplant_id', $request->cityplant_id);
            }
            if ($request->input('item_id') != '') {
                $query->where('item_id', $request->input('item_id'));
            }
            if ($request->input('plant_id') != '') {
                $query->where('plant_id', $request->input('plant_id'));
            }
            $data = $query->paginate(20);
            return view('report.report_list_user', compact('data'))->with(['all_item' => $all_item, 'all_plant' => $all_plant]);
        }
        return redirect()->route('admin');
    }

    public function exportCsv(Request $request)//Report
    {
        $fileName = 'Report.csv';
        if (session()->get('role') == 1) {
            
            $user_id = session()->get('Admin_id');
         
            $query = Stock::with('plant', 'item', 'bin', 'user', 'weightScale', 'unit','cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);

            if ($request->input('min') != '' && $request->input('max') != '') {
                $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
            }
            if ($request->input('cityplant_id') != '') {
                $query->where('cityplant_id', $request->cityplant_id);
            }
            if ($request->input('item_id') != '') {
                $query->where('item_id', $request->input('item_id'));
            }
            if ($request->input('plant_id') != '') {
                $query->where('plant_id', $request->input('plant_id'));
            }
            if ($request->input('bin_id') != '') {
                $query->where('bin_id', $request->input('bin_id'));
            }
            if ($request->input('weight_scale_id') != '') {
                $query->where('weight_scale_id', $request->input('weight_scale_id'));
            }
            $tasks = $query->get();
        } else {
            $user_id = session()->get('user_id');
            $query= Stock::where('user_id', $user_id)->with('plant', 'item', 'bin', 'user', 'weightScale', 'unit' ,'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1)->get();
            $tasks = $query->get();
        }
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Item','Code', 'ERP M. Code', 'Bin', 'Weighing machine', 'Plant/Location', 'Location code', 'User', 'Assign Date', 'Gross Weight', 'Bin Weight', 'Net Weight(In KG.)', 'Quantity',);

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                     $assign_date1 = @$task->assign_date;
                     $code = @$task->plant['short_code'] . @$task->weightScale['short_code'] . @$task->plant['location_short_code'] . "S" . @$task['stock_id'];
                $row['Item']  = @$task->item['name'];
                $row['code']  = @$code;
                $row['ERP M. Code']    = @$task->item['item_no'];
                $row['Bin']    = @$task->bin['name'];
                $row['Weighing machine']  = @$task->weightScale['name'];
                $row['Plant/Location']  = @$task->plant['name'];
                $row['Location code']  = @$task->plant['location_short_code'];
                $row['User']  = @$task->user['name'];
                $row['Assign Date']  = getCreatedAtAttribute($assign_date1, 'd-m-Y h:i A');
                $row['Gross Weight']  = @$task->gross_weight;
                $row['Bin Weight']  = @$task->bin_weight;
                $row['Net Weight']  = @$task->net_weight;
                $row['Quantity']  = @$task->counted_quantity;
            
                fputcsv($file, array($row['Item'], $row['code'],$row['ERP M. Code'], $row['Bin'], $row['Weighing machine'], $row['Plant/Location'], $row['Location code'], $row['User'], $row['Assign Date'], $row['Gross Weight'], $row['Bin Weight'], $row['Net Weight'], $row['Quantity']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportCsv1(Request $request)//plant wise report
    {
        $fileName = 'Report.csv';
        if (session()->get('role') == 1) {
            $user_id = session()->get('Admin_id');
            $query =  Stock::with('plant', 'item', 'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);

            if ($request->input('min') != '' && $request->input('max') != '') {
                $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
            }
            if ($request->input('cityplant_id') != '') {
                $query->where('cityplant_id', $request->cityplant_id);
            }
            if ($request->input('item_id') != '') {
                $query->where('item_id', $request->input('item_id'));
            }
            if ($request->input('plant_id') != '') {
                $query->where('plant_id', $request->input('plant_id'));
            }
            $tasks = $query->get();
        } else {

            $user_id = session()->get('user_id');
            $query = Stock::where('user_id', $user_id)->with('plant', 'item', 'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);
            $tasks = $query->get();
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array( 'ERP M. Code', 'ITEM DESCRIPTION', 'Plant', 'Location', 'Location code', 'Quantity','AMOUNT', 'Total Weight(In KG.)');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
    
                $row['ERP M. Code']    = @$task->item['item_no'];
                $row['ITEM DESCRIPTION']  = @$task->item['name'];
                $row['Plant']  = @$task->plant['name'];
                $row['Location']  = @$task->plant['location'];
                $row['Location code']  = @$task->plant['location_short_code'];
                $row['Quantity']  = @$task->counted_quantity;
                $price=0;
                if(@$task->item['price']==""){$iprice=0;}elseif(@$task->item['price']==NULL){$iprice=0;}else{$iprice=@$task->item['price'];}
               if ((@$task->item['item_no']>= 71000000 && @$task->item['item_no'] <= 74999999) ||
                   (@$task->item['item_no'] >= 10000000 && @$task->item['item_no'] <= 19999999)) {
                   //kg
                   $price=$iprice*@$task['net_weight'];
               } else if (@$task->item['item_no'] >= 90000000 && @$task->item['item_no'] <= 99999999) {
                   //nos
                   $price=$iprice*@$task['counted_quantity'];
               } else if (@$task->item['item_no'] >= 20000000 && @$task->item['item_no'] <= 59999999) {
                   //nos
                   $price=$iprice*@$task['counted_quantity'];
               }
                $row['AMOUNT']    = @$price;
                $row['Weight']    = @$task['net_weight'];
            
                fputcsv($file, array( $row['ERP M. Code'], $row['ITEM DESCRIPTION'], $row['Plant'], $row['Location'], $row['Location code'], $row['Quantity'], $row['AMOUNT'], $row['Weight']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportCsv_user(Request $request)
    {
        $fileName = 'Report.csv';
        if (session()->get('role') == 1) {
            $user_id = session()->get('Admin_id');
            $query = Stock::with('plant', 'item', 'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);

            if ($request->input('min') != '' && $request->input('max') != '') {
                $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
            }

            if ($request->input('cityplant_id') != '') {
                $query->where('cityplant_id', $request->cityplant_id);
            }

            if ($request->input('item_id') != '') {
                $query->where('item_id', $request->input('item_id'));
            }

            if ($request->input('plant_id') != '') {
                $query->where('plant_id', $request->input('plant_id'));
            }

            $tasks = $query->get();
        } else {
            $user_id = session()->get('user_id');
            $query = Stock::where('user_id', $user_id)->with('plant', 'item', 'cityplant')->orderBy('stock_id', 'desc')->where('is_active', 1);
            $tasks = $query->get();
        }
    
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ERP M. Code','Quantity', 'Location','Plant');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); 

            foreach ($tasks as $task) {
                $assign_date1 = @$task->assign_date;
                $row['ERP M. Code']    = @$task->item['item_no'];
                $row['Quantity']  = @$task->counted_quantity;
                $row['Location']  = @$task->plant['location_short_code'];
                $row['Plant']  = @$task->plant['name'];

                fputcsv($file, array( $row['ERP M. Code'] , $row['Quantity'] ,$row['Location'] , $row['Plant']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function barcode(Request $request)
    {
        if (session()->has('Admin_login')) {
            return view('report.barcode');
        } else {
            return view('report.barcode');
        }
    }

    public function barcodedata(Request $request)
    {
        $id = $request->id1;
        $where = array('stock_id' => $id);
        $data = stock::where($where)->with('plant', 'item', 'bin', 'user', 'weightScale', 'unit', 'cityplant')->first();
        return response()->json($data);
    }

    public function get_location(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $autocomplate = Plant::orderby('location_short_code', 'asc')->select('plant_id', 'location_short_code')->where('is_active', '=', 1)->limit(10)->get();
        } else {
            $autocomplate = Plant::orderby('location_short_code', 'asc')->select('plant_id', 'location_short_code')->where('location_short_code', 'like', '%' . $search . '%')->orWhere('plant_id', 'like', '%' . $search . '%')->limit(10)->get();
        }
        $response = array();
        foreach ($autocomplate as $autocomplate) {
            $response[] = array("value" => $autocomplate->plant_id, "label" => $autocomplate->location_short_code, "location_short_code" => $autocomplate->location_short_code);
        }
        echo json_encode($response);
        exit;
    }
}
