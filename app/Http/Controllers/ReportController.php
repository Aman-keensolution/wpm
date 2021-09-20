<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Bin;
use App\Models\Plant;
use App\Models\WeightScale;
use DataTables;

class ReportController extends Controller
{

    public function report_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                if (session()->get('role') == 1) {
                    $user_id = session()->get('Admin_id');
                    $data = Stock::with('plant', 'item', 'bin', 'user', 'weightScale', 'unit')->get();
                } else {
                    $user_id = session()->get('user_id');
                    $data = Stock::where('user_id', $user_id)->with('plant', 'item', 'bin', 'user', 'weightScale', 'unit')->get();
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('plant_name', function ($row) {
                        return @$row->plant->name;
                    })
                    ->addColumn('bin_name', function ($row) {
                        return @$row->bin->name;
                    })
                    ->addColumn('weightScale_name', function ($row) {
                        return @$row->weightScale->name;
                    })
                    ->rawColumns(['action'])
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
