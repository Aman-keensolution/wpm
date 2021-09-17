<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Plant;
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
                $data = Stock::with('plant','item','bin', 'user','weightScale','unit')->get();
              
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

                    ->addColumn('assign_date1', function ($row) {
                       return getCreatedAtAttribute(@$row->assign_date,'d/m/Y H:s A') ;
                    })
                    ->addColumn('plant_name', function ($row) {
                        return @$row->plant->name;
                    })
                    ->addColumn('bin_name', function ($row) {
                        return @$row->bin->name;
                    })
                    ->addColumn('item_name', function ($row) {
                        return @$row->item->name;
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
                    ->rawColumns(['action'])
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
            $all_plant = Plant::all();
            $all_bin = Bin::all();
            $all_item = Item::all();
            $all_WeightScale = WeightScale::all();
            $all_unit = Unit::all();
            $all_user = Admin::where('role', 2)->get();
            return view('stock.add_stock')->with(['all_plant' => $all_plant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        $user_id = session()->get('Admin_id');
        $Stock = new Stock;
        $Stock->item_id = $request->item_id;
        $Stock->bin_id = $request->bin_id;
        $Stock->plant_id = $request->plant_id;
        $Stock->user_id = $user_id;
        $Stock->weight_scale_id =$request->weight_scale_id;
        $Stock->batch_id = $request->batch_id;
        $Stock->unit_id = $request->unit_id;
        $Stock->gross_weight = $request->gross_weight;

        $Stock->assign_date =Carbon::now();
        $Stock->bin_weight = 50;
        $Stock->net_weight = 100;
        $Stock->counted_quantity = 132;
        $Stock->remark = 1;
        $Stock->provision1 = 1;
        $Stock->provision2 = 1;

        $Stock->save();
        if ($Stock) {
            return redirect('stock_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_stock(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            $all_bin = Bin::all();
            $all_item = Item::all();
            $all_WeightScale = WeightScale::all();
            $all_unit = Unit::all();
            $all_user = Admin::where('role', 2)->get();
            $data['Stockdata'] = Stock::find($request->stock_id);
            return view('stock.edit_stock', $data)->with(['all_plant' => $all_plant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_unit' => $all_unit]);
        } else {
            //return view('admin');
            return redirect()->route('admin');
        }
    }

    public function update_stock(Request $request)
    {
        $user_id = session()->get('Admin_id');
        $data = Stock::find($request->stock_id);
        $data->item_id = $request->item_id;
        $data->bin_id = $request->bin_id;
        $data->plant_id = $request->plant_id;
        $data->user_id = $user_id;
        $data->weight_scale_id = $request->weight_scale_id;
        $data->batch_id = $request->batch_id;
        $data->unit_id = $request->unit_id;
        $data->gross_weight = $request->gross_weight;
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
}
