<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect, Response;
use App\Models\Stock;
use App\Models\Plant;
use App\Models\CityPlant;
use App\Models\Item;
use App\Models\Bin;
use App\Models\Admin;
use App\Models\Unit;
use App\Models\WeightScale;
use Carbon\Carbon;
use DataTables;


class StockController extends Controller
{
    public function stock_list(Request $request)
    {
       
        if (session()->has('Admin_login')) {
            $all_bin = Bin::all();
            $all_plant = CityPlant::all();
            $all_WeightScale = WeightScale::all();

                if(session()->get('role')==1){
           
                    $user_id = session()->get('Admin_id');
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
                    if ($request->input('bin_id') != '') {
                        $query->where('bin_id', $request->input('bin_id'));
                    }
                    if ($request->input('weight_scale_id') != '') {
                        $query->where('weight_scale_id', $request->input('weight_scale_id'));
                    }
                    if ($request->input('code_id') != '') {
                        $query->where('stock_id', $request->input('code_id'));
                    }

                }
            else{
                    $user_id = session()->get('user_id');
                    $query = Stock::select('*')->where('user_id', $user_id)->with('cityplant','plant','item','bin', 'user','weightScale','unit')->orderBy('stock_id', 'desc')->where('is_active', 1);
                    if ($request->input('min') != '' && $request->input('max') != '') {
                        $query->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
                    }
                    if ($request->input('cityplant_id') != '') {
                        $query->where('cityplant_id', $request->cityplant_id);
                    }
                    if ($request->input('item_id') != '') {
                        $query->where('item_id', $request->input('item_id'));
                    }
                    if ($request->input('bin_id') != '') {
                        $query->where('bin_id', $request->input('bin_id'));
                    }
                    if ($request->input('weight_scale_id') != '') {
                        $query->where('weight_scale_id', $request->input('weight_scale_id'));
                    }
                    if ($request->input('code_id') != '') {
                        $query->where('stock_id', $request->input('code_id'));
                    }
                }
                    $selected_id = [];
                    $selected_id['min'] = $request->min;
                    $selected_id['max'] = $request->max;
                    $selected_id['code_id'] = $request->code_id;
                    $selected_id['plant_id'] = $request->plant_id;
                    $selected_id['item_id'] = $request->item_id;
                    $selected_id['cityplant_id'] = $request->cityplant_id;
                    $selected_id['weight_scale_id'] = $request->weight_scale_id;
                    $selected_id['bin_id'] = $request->bin_id;

                    $data = $query->paginate(20);
                    return view('stock.stock_list', compact('data', 'selected_id'))->with(['all_bin' => $all_bin, 'all_WeightScale' => $all_WeightScale,  'all_plant' => $all_plant]);
        }
        return redirect()->route('admin');
    }

    // public function select_stock_list(Request $request)
    // {
    //     if (session()->has('Admin_login')) {
    //         if (session()->get('role') == 1) {
    //             $user_id = session()->get('Admin_id');
    //             $data = Stock::with('cityplant', 'plant', 'item', 'bin', 'user', 'weightScale', 'unit')->where('is_active', 1)->where('item_id', @$request->item_id)->paginate(20);
    //         } else {
    //             $user_id = session()->get('user_id');
    //             $data = Stock::where('user_id', $user_id)->with('cityplant', 'plant', 'item', 'bin', 'user', 'weightScale', 'unit')->where('is_active', 1)->where('item_id', @$request->item_id)->paginate(20);
    //         }
    //         return view('stock.stock_list', compact('data'));
    //     }
    //     return redirect()->route('admin');
    // }

    public function add_stock(Request $request)
    {
        if (session()->has('Admin_login')) {
            $wc_loc=session()->get('user_wc_loc');
            if(is_array($wc_loc)){
            if(session()->get('role')==1){ $user_id = session()->get('Admin_id');}
            else{$user_id = session()->get('user_id');}
            $all_cityplant = CityPlant::where('is_active', 1)->get();
            $all_plant = Plant::where('is_active', 1)->get();
            $all_bin = Bin::where(['is_active'=> 1,'cityplant_id'=>$wc_loc['plant'][0]['cityplant_id'] ])->get();
            $all_item = Item::where('is_active', 1)->get();
            $all_WeightScale = WeightScale::where('user_id', $user_id)->where('is_active', 1)->with('cityplant', 'user')->get();
            $all_unit = Unit::all();
            $all_user = Admin::where('user_id', $user_id)->where('is_active', 1)->get()->first();
            if ($request->stock_id!=0) {
                $all_cityplant = CityPlant::where('is_active', 1)->get();
                $all_plant = Plant::where('is_active', 1)->get();
                $all_bin = Bin::where(['is_active'=> 1,'cityplant_id'=>$wc_loc['plant'][0]['cityplant_id'] ])->get();
                $all_item = Item::where('is_active', 1)->get();
                $all_WeightScale = WeightScale::where('is_active', 1)->get();
                $all_unit = Unit::all();
                $data['Stockdata']=Stock::where('stock_id',$request->stock_id)->with('cityplant','plant','bin','item','weightScale','unit')->get(); 
                return view('stock.add_stock', $data)->with(['all_cityplant' => $all_cityplant, 'all_plant' => $all_plant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit, 'all_user' => $all_user]);
            } 
            return view('stock.add_stock')->with(['all_plant' => $all_plant, 'all_cityplant' => $all_cityplant ,'all_item' => $all_item, 'all_bin' => $all_bin, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit, 'all_user' => $all_user]);
       }else { return back()->with('Fail', 'Something went wrong');} 
    } else {
            return redirect('admin');
        }
    }
 
    public function store(Request $request)
    {
                /* validation code */
                $request->validate([
                    'item_id' => 'required',
                    'bin_id' => 'required',
                    'cityplant_id' => 'required',
                    'plant_id' => 'required',
                    //'mobile' => 'required|min:10|max:10'
                ]);
        if(session()->get('role')==1){ $user_id = session()->get('Admin_id');}
        else{$user_id = session()->get('user_id');}

        $Stock = new Stock;
        $Stock->item_id = $request->item_id;
        $Stock->bin_id = $request->bin_id;
        $Stock->cityplant_id = $request->cityplant_id;
        $Stock->plant_id = $request->plant_id;
        $Stock->user_id = $user_id;
        $Stock->weight_scale_id =$request->weight_scale_id;
        $Stock->batch_id = $request->batch_id;
        $Stock->unit_id = $request->unit_id;
        $Stock->gross_weight = $request->gross_weight;
        $Stock->remark = $request->remark;
        $Stock->assign_date =Carbon::now();
        if(in_array($request->bin_id,array(0,72,73,74)))
        {$Stock->bin_weight = 0;}else{$Stock->bin_weight = $request->bin_weight;}
        $Stock->net_weight = $request->net_weight;
        $Stock->counted_quantity = $request->counted_quantity;
        $Stock->provision1 = 1;
        $Stock->provision2 = 1;

        $Stock->save();

        if ($Stock) {
            if($request->submit=="Submit and Print")
                {
                    $data['Stockdata']=Stock::where('stock_id', $Stock->stock_id)->with('cityplant','plant', 'bin','item','weightScale','unit','user')->get()->first(); 
                    return redirect('add_stock/'.$Stock->stock_id.'/1')->with(['data' => $data]);
                }
            else if($request->submit=="Submit")
                {return redirect('add_stock/0/0');}
            
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_stock(Request $request)
    {
        
        if (session()->has('Admin_login')) {
            $wc_loc=session()->get('user_wc_loc');
          
            if(is_array($wc_loc)||session()->get('role')==1){
            $all_cityplant = CityPlant::where('is_active', 1)->get();
            $all_plant = Plant::where('is_active', 1)->get();
            if(session()->get('role')==2){
                    $all_bin = Bin::where(['is_active' => 1, 'cityplant_id' => $wc_loc['plant'][0]['cityplant_id']])->get();
            }else{
                    $all_bin = Bin::where(['is_active' => 1])->get();
            }
            $all_item = Item::where('is_active', 1)->get();
            $all_WeightScale = WeightScale::where('is_active', 1)->get();
            $all_unit = Unit::all();
            $all_user = Admin::where('role', 2)->where('is_active', 1)->get();
            $data['Stockdata'] = Stock::where('stock_id', $request->stock_id)->with('plant','cityplant', 'bin','item','weightScale','unit','user')->get()->first(); //find($request->stock_id);
            return view('stock.edit_stock', $data)->with(['all_plant' => $all_plant, 'all_cityplant' => $all_cityplant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
        }else{ return back()->with('Fail', 'Something went wrong');}
        } else {
            //return view('admin');
            return redirect()->route('admin');
        }
    }
    public function print_stock(Request $request)
    {
        if($request->select_entry){
            if (session()->has('Admin_login')) {
                $data['Stockdatas'] = Stock::whereIn('stock_id', $request->select_entry)->with('plant', 'cityplant', 'bin','item','weightScale','unit','user')->orderBy('stock_id', 'desc')->get(); //find($request->stock_id);
                return view('stock.pdf-report', $data);
            } else {
                //return view('admin');
                return redirect()->route('admin');
            }
        }else{return redirect()->route('stock.stock_list');}
    }

    public function update_stock(Request $request)
    {
        $user_id = session()->get('user_id');
        $data = Stock::find($request->stock_id);
        $data->item_id = $request->item_id;
        $data->bin_id = $request->bin_id;
        $data->cityplant_id = $request->cityplant_id;
        $data->plant_id = $request->plant_id;
        $data->user_id = $request->user_id;
        $data->weight_scale_id = $request->weight_scale_id;
        $data->batch_id = $request->batch_id;
        $data->unit_id = $request->unit_id;
        $data->gross_weight = $request->gross_weight;
        $data->remark = $request->remark;
        $data->bin_weight = $request->bin_weight;
        $data->net_weight = $request->net_weight;
        $data->counted_quantity = $request->counted_quantity;
        $data->provision1 = 1;
        $data->provision2 = 1;
        $data->save();
        return redirect('stock_list');
    }


    public function block_stock(Request $request)
    {
        $request = Stock::find($request->stock_id);
        $request->is_active = 0;
        $request->save();
        return redirect('stock_list');
    }
    public function unblock_stock(Request $request)
    {
        $request = Stock::find($request->stock_id);
        $request->is_active = 1;
        $request->save();
        return redirect('stock_list');
    }
    public function get_bin_weight(Request $request,$bin_id)
    {
        $id = @$request->input('id');
        $data = Bin::where('bin_id', $id)->get()->first();
        echo $data->bin_weight;
    }
    public function get_net_weight(Request $request,$id)
    {
        $bin_id = @$request->input('bin_id');
        $gross_weight = @$request->input('gross_weight');
        $unit_id = @$request->input('unit_id');

        $bin = Bin::where('bin_id', $bin_id)->get()->first();
        $unit = Unit::where('unit_id', $unit_id)->get()->first();

        $net_weight= ($gross_weight*$unit->in_gram)-($bin->bin_weight*1000);
        $net_w=$net_weight/1000;
        if ($net_w < 0){echo "";}else{echo $net_w;}
        
    }

    public function get_qty(Request $request,$id)
    {
        $bin_id = @$request->input('bin_id');
        $gross_weight = @$request->input('gross_weight');
        $unit_id = @$request->input('unit_id');
        $item_id = @$request->input('item_id');


        $item = Item::where('item_id', $item_id)->with('unit')->get()->first();
        $bin = Bin::where('bin_id', $bin_id)->get()->first();
        $unit2 = Unit::where('unit_id', $unit_id)->get()->first();

        if($item->item_avg_weight!=0){$item_weight=$item->item_avg_weight*$item->unit->in_gram;}
        else{$item_weight=1000;}
        
        $net_weight= ($gross_weight*$unit2->in_gram)-($bin->bin_weight*1000);
        $qty=$net_weight/$item_weight;
        if ($qty <= 0){echo "";}else{echo $qty;}
    }
    public function all_items(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_cityplant = CityPlant::all();
            $all_bin = Bin::all();
            $all_item = Item::all();
            $all_WeightScale = WeightScale::all();
            $all_unit = Unit::all();
            $all_user = Admin::where('role', 2)->get();
            $data['Stockdata'] = Stock::find($request->stock_id);
            return view('stock.get_stock_label', $data)->with(['all_cityplant' => $all_cityplant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
        } else {
            //return view('admin');
            return redirect()->route('admin');
        }
    }

    public function get_items(Request $request){
        $search = $request->search;
        if($search == ''){
           $autocomplate = Item::orderby('item_no','asc')->select('item_id','item_no','item_avg_weight','name')->where('is_active', '=', 1)->limit(10)->get();
        }else{
            $autocomplate = Item::orderby('item_no','asc')->select('item_id','item_no','item_avg_weight','name')->where('name', 'like', '%' .$search . '%')->
            orWhere('item_no', 'like', '%' .$search . '%')->orWhere('name', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($autocomplate as $autocomplate){
           $response[] = array("value"=>$autocomplate->item_id,"label"=>$autocomplate->item_no."-".$autocomplate->name,"name"=>$autocomplate->name,"item_avg_weight"=>$autocomplate->item_avg_weight,"erp_mc"=>$autocomplate->item_no);
        }
        echo json_encode($response);
        exit;
    }

    public function get_bin_status(Request $request){
        $bid = @$request->bid;
        $rows=Stock::select('bin_id')->where(['is_active'=>1,'bin_id'=>$bid])->whereDate('created_at', '>', Carbon::now()->subMinutes(1440))->first();
        $response = array();
        if(in_array($bid,array(0,72,73,74))){
            $response = array("status"=>1,"message"=>"Bin Available");
        }
        else if($rows){
                $response = array("status"=>0,"message"=>"Bin Not Available");
        }else{$response = array("status"=>1,"message"=>"Bin Available");}
        echo json_encode($response);
        exit;
     }

}
