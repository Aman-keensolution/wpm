<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            if ($request->ajax()) {
                if(session()->get('role')==1){
                    $user_id = session()->get('Admin_id');
                    $data = Stock::with('cityplant','item','bin', 'user','weightScale','unit')->get();
                }
            else{
                $user_id = session()->get('user_id');
                $data = Stock::where('user_id', $user_id)->with('cityplant','item','bin', 'user','weightScale','unit')->get();
            }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->is_active == 1) {
                        $nm = route('stock.edit_stock', $row->stock_id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;';
                            $nm = route('stock.block_stock', $row->stock_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-danger">Delete</span></a>';
                        }else{
                          $btn = ' <span class="badge bg-secondary">Deleted</span>';
                        }
                        return $btn;
                    }) 
                    ->addColumn('checkbox1', function ($row) {
                        
                        $btn1='<input name="select_entry[]" id="select_entry_'.$row->stock_id.'" class="select_entry" value="'.$row->stock_id.'" type="checkbox">';
                       
                        return $btn1;
                    }) 
                    ->addColumn('assign_date1', function ($row) {
                       return getCreatedAtAttribute(@$row->assign_date,'d/m/Y H:s A') ;
                    })
                    ->addColumn('plant_name', function ($row) {
                        return @$row->cityplant->name;
                    })
                    ->addColumn('bin_name', function ($row) {
                        return @$row->bin->name;
                    })
                    ->addColumn('item_name', function ($row) {
                        return @$row->item->name;
                    })
                    ->addColumn('item_no', function ($row) {
                        return @$row->item->item_no;
                    })
                    ->addColumn('user_name', function ($row) {
                        return @$row->user->name;
                    })
                    ->addColumn('weightScale_name', function ($row) {
                        return @$row->weightScale->name;
                    })
                    ->addColumn('unit_name', function ($row) {
                        return @$row->unit->name;
                    })
                    ->rawColumns(['action','checkbox1'])
                    ->make(true);
            }
            return view('stock.stock_list');
        }
        //return view('admin');
        return redirect()->route('admin');
    }

    public function add_stock(Request $request)
    {
        if (session()->has('Admin_login')) {
            if(session()->get('role')==1){ $user_id = session()->get('Admin_id');}
            else{$user_id = session()->get('user_id');}
            $all_cityplant = CityPlant::where('is_active', 1)->get();
            $all_bin = Bin::where('is_active', 1)->get();
            $all_item = Item::where('is_active', 1)->get();
            $all_WeightScale = WeightScale::where('user_id', $user_id)->where('is_active', 1)->with('cityplant', 'user')->get();
            $all_unit = Unit::all();
            $all_user = Admin::where('user_id', $user_id)->where('is_active', 1)->get()->first();
            if (session()->has('Admin_login')) {
                $all_cityplant = CityPlant::where('is_active', 1)->get();
                $all_bin = Bin::where('is_active', 1)->get();
                $all_item = Item::where('is_active', 1)->get();
                $all_WeightScale = WeightScale::where('is_active', 1)->get();
                $all_unit = Unit::all();
                $all_user = Admin::where('role', 2)->where('is_active', 1)->get();
                $data['Stockdata'] = Stock::where('stock_id', $request->stock_id)->with('cityplant', 'bin','item','weightScale','unit','user')->get()->first(); //find($request->stock_id);
                return view('stock.add_stock', $data)->with(['all_cityplant' => $all_cityplant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
            }
            return view('stock.add_stock')->with(['all_cityplant' => $all_cityplant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        if(session()->get('role')==1){ $user_id = session()->get('Admin_id');}
        else{$user_id = session()->get('user_id');}

        $Stock = new Stock;
        $Stock->item_id = $request->item_id;
        $Stock->bin_id = $request->bin_id;
        $Stock->cityplant_id = $request->cityplant_id;
        $Stock->user_id = $user_id;
        $Stock->weight_scale_id =$request->weight_scale_id;
        $Stock->batch_id = $request->batch_id;
        $Stock->unit_id = $request->unit_id;
        $Stock->gross_weight = $request->gross_weight;
        $Stock->remark = $request->remark;

        $Stock->assign_date =Carbon::now();
        $Stock->bin_weight = $request->bin_weight;
        $Stock->net_weight = $request->net_weight;
        $Stock->counted_quantity = $request->counted_quantity;
        $Stock->provision1 = 1;
        $Stock->provision2 = 1;

        $Stock->save();

        if ($Stock) {
            if($request->submit=="Submit and Print")
                {
                    $data['Stockdata'] = Stock::where('stock_id', $Stock->stock_id)->with('cityplant', 'bin','item','weightScale','unit','user')->get()->first(); 
                    return redirect('add_stock/'.$Stock->stock_id.'/1')->with( ['data' => $data] );
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
            $all_cityplant = CityPlant::where('is_active', 1)->get();
            $all_bin = Bin::where('is_active', 1)->get();
            $all_item = Item::where('is_active', 1)->get();
            $all_WeightScale = WeightScale::where('is_active', 1)->get();
            $all_unit = Unit::all();
            $all_user = Admin::where('role', 2)->where('is_active', 1)->get();
            $data['Stockdata'] = Stock::where('stock_id', $request->stock_id)->with('cityplant', 'bin','item','weightScale','unit','user')->get()->first(); //find($request->stock_id);
            return view('stock.edit_stock', $data)->with(['all_cityplant' => $all_cityplant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
        } else {
            //return view('admin');
            return redirect()->route('admin');
        }
    }
    public function print_stock(Request $request)
    {
        if($request->select_entry){
            if (session()->has('Admin_login')) {
                $all_cityplant = CityPlant::all();
                $all_bin = Bin::all();
                $all_item = Item::all();
                $all_WeightScale = WeightScale::all();
                $all_unit = Unit::all();
                $all_user = Admin::where('role', 2)->get();
                $data['Stockdatas'] = Stock::whereIn('stock_id', $request->select_entry)->with('cityplant', 'bin','item','weightScale','unit','user')->get(); //find($request->stock_id);
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
        $id = $request->input('id');
        $data = Bin::where('bin_id', $id)->get()->first();
        echo $data->bin_weight;
    }
    public function get_net_weight(Request $request,$id)
    {
        $bin_id = $request->input('bin_id');
        $gross_weight = $request->input('gross_weight');
        $unit_id = $request->input('unit_id');

        $bin = Bin::where('bin_id', $bin_id)->get()->first();
        $unit = Unit::where('unit_id', $unit_id)->get()->first();

        $net_weight= ($gross_weight*$unit->in_gram)-($bin->bin_weight*1000);
        $net_w=$net_weight/1000;
        if ($net_w < 0){echo "";}else{echo $net_w;}
        
    }

    public function get_qty(Request $request,$id)
    {
        $bin_id = $request->input('bin_id');
        $gross_weight = $request->input('gross_weight');
        $unit_id = $request->input('unit_id');
        $item_id = $request->input('item_id');

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
           $autocomplate = Item::orderby('item_no','asc')->select('item_id','item_no','name')->where('is_active', '=', 1)->limit(10)->get();
        }else{
            $autocomplate = Item::orderby('item_no','asc')->select('item_id','item_no','name')->where('name', 'like', '%' .$search . '%')->
            orWhere('item_no', 'like', '%' .$search . '%')->orWhere('name', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($autocomplate as $autocomplate){
           $response[] = array("value"=>$autocomplate->item_id,"label"=>$autocomplate->item_no."-".$autocomplate->name,"name"=>$autocomplate->name);
        }
        echo json_encode($response);
        exit;
     }

}
