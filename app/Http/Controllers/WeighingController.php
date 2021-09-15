<?php

namespace App\Http\Controllers;

use App\Models\WeightScale;
use App\Models\Plant;
use Illuminate\Http\Request;
use DataTables;

class WeighingController extends Controller
{
    public function weighing_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = WeightScale::with('plant')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $nm = route('weighing.edit_weighing', $row->weight_scale_id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>|';
                        if ($row->is_active == 1) {
                            $nm = route('weighing.block_weighing', $row->weight_scale_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-danger">Block</span></a>';
                        } else {
                            $nm = route('weighing.unblock_weighing', $row->weight_scale_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-success">Unblock</span></a>';
                        }
                        return $btn;
                    })
                    ->addColumn('plant_name', function ($row) {
                        return $row->plant->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('weighing.weighing_list');
        }
         //return view('admin');
        return redirect()->route('admin');
    }

    public function add_weighing(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            return view('weighing.add_weighing')->with(['all_plant' => $all_plant]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        $user_id= session()->get('Admin_id');
        $WeightScale = new WeightScale;
        $WeightScale->name = $request->name;
        $WeightScale->plant_id = $request->plant_id;
        $WeightScale->user_id = $user_id;

        $WeightScale->save();
        if ($WeightScale) {
            return redirect('weighing_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
         }
    }

    public function edit_weighing(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            $data['WeightScaledata'] = WeightScale::find($request->weight_scale_id);
            return view('weighing.edit_weighing', $data)->with(['all_plant' => $all_plant]);
        } else {
             //return view('admin');
        return redirect()->route('admin');
        }
    }

    public function update_weighing(Request $request)
    {
        $data = WeightScale::find($request->weight_scale_id);
        $data->name = $request->name;
        $data->plant_id = $request->plant_id;
        $data->save();
        return redirect('weighing_list');
    }


    public function block_weighing(Request $request)
    {
        $request = WeightScale::find($request->weight_scale_id);
        $request->is_active = 0;
        $request->save();
        return redirect('weighing_list');
    }
    public function unblock_weighing(Request $request)
    {
        $request = WeightScale::find($request->weight_scale_id);
        $request->is_active = 1;
        $request->save();
        return redirect('weighing_list');
    }
}
