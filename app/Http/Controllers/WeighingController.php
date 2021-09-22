<?php

namespace App\Http\Controllers;

use App\Models\WeightScale;
use App\Models\Plant;
use App\Models\Admin;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;

class WeighingController extends Controller
{
    public function weighing_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = WeightScale::with('plant','user')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $nm = route('weighing.edit_weighing', $row->weight_scale_id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;';
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
                        return @$row->plant->name."/".@$row->plant->location;
                    })
                    ->addColumn('user_name', function ($row) {
                        return @$row->user->name;
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
            $all_user = Admin::where('role', 2)->get();
            $all_unit = Unit::all();
            return view('weighing.add_weighing')->with(['all_plant' => $all_plant,'all_user' =>$all_user, 'all_unit' => $all_unit]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        $user_id= session()->get('Admin_id');
        $WeightScale = new WeightScale;
        $WeightScale->name = $request->name;
        $WeightScale->weight_scale_no = $request->weight_scale_no;
        $WeightScale->plant_id = $request->plant_id;
        $WeightScale->user_id = $user_id;
        $WeightScale->shot_code = $request->shot_code;
        $WeightScale->unit_id = $request->unit_id;
        $WeightScale->capicity = $request->capicity;

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
            $all_user = Admin::where('role', 2)->get();
            $all_unit = Unit::all();
            $data['WeightScaledata'] = WeightScale::find($request->weight_scale_id);
            return view('weighing.edit_weighing', $data)->with(['all_plant' => $all_plant,'all_user' => $all_user , 'all_unit' => $all_unit ]);
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
        $data->weight_scale_no = $request->weight_scale_no;
        $data->shot_code = $request->shot_code;
        $data->unit_id = $request->unit_id;
        $data->capicity = $request->capicity;
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
