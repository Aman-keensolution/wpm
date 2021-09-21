<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Bin;
use App\Models\Plant;
use App\Models\WeightScale;
use App\Models\Stock;
use DataTables;

class ReportController extends Controller
{

    public function report_list(Request $request)
    {
         if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                if (session()->get('role') == 1) {
                    $user_id = session()->get('Admin_id');
                    // Date filter                   

                    $data = Stock::with('plant', 'item', 'bin', 'user', 'weightScale', 'unit');
                                   } else {
                    $user_id = session()->get('user_id');
                    $data = Stock::where('user_id', $user_id)->with('plant', 'item', 'bin', 'user', 'weightScale', 'unit');
                }
                if($request->input('min') != '' && $request->input('max') != ''){
                    $data->whereBetween('assign_date', [$request->input('min'), $request->input('max')]);
                } 
                if($request->input('plant_id') != ''){
                    $data->whereIn('plant_id', $request->plant_id);
                } 
                if($request->input('item_id') != '' ){
                    $data->where('item_id', $request->input('item_id'));
                } 
                if($request->input('bin_id') != ''){
                    $data->where('bin_id',$request->input('bin_id'));
                }
                if($request->input('weightScale_id') != ''){
                    $data->where('weightScale_id', $request->input('weightScale_id'));
                } 
                
                $data->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('plant_name', function ($row) {
                        return "<div title='".@$row->plant->plant_id."'>".@$row->plant->name."/".@$row->plant->location."</div>";
                    })
                    ->addColumn('item_name', function ($row) {
                        return @$row->item->name;
                    })
                    ->addColumn('item_no', function ($row) {
                        return @$row->item->item_no;
                    })
                    ->addColumn('bin_name', function ($row) {
                        return @$row->bin->name;
                    })
                    ->addColumn('weightScale_name', function ($row) {
                        return @$row->weightScale->name;
                    })
                    ->addColumn('user_name', function ($row) {
                        return @$row->user->name;
                    })
                    ->addColumn('gross_weightu', function ($row) {
                        return @$row->gross_weight."Kg";
                    })
                    ->addColumn('bin_weightu', function ($row) {
                        return @$row->bin_weight."Kg";
                    })
                    ->addColumn('net_weightu', function ($row) {
                        return @$row->net_weight."Kg";
                    })
                    ->rawColumns(['plant_name'])
                    ->make(true);
            }
            $all_bin = Bin::all();
            $all_plant = Plant::all();
            $all_item = Item::all();
            $all_WeightScale = WeightScale::all();
            return view('report.report')->with(['all_bin' => $all_bin, 'all_WeightScale' => $all_WeightScale, 'all_item' => $all_item, 'all_plant' => $all_plant,]);
        }
        //return view('admin');
        return redirect()->route('admin');
    }
    // public function report_list(Request $request)
    // {
    //     $all_bin = Bin::all();
    //     $all_WeightScale = WeightScale::all();
    //     $data['report_data'] =Stock::with('bin', 'weightScale')->get(); //find($request->stock_id);
    //     return view('report.report', $data)->with(['all_bin' => $all_bin,'all_WeightScale' => $all_WeightScale,]);
    // }
}
