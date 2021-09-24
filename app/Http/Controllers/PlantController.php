<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\CityPlant;
use Illuminate\Http\Request;
use DataTables;

class PlantController extends Controller
{
    public function plant_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = Plant::select('*');
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $nm = route('plant.edit_plant', $row->plant_id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;';
                        if ($row->is_active == 1) {
                            $nm = route('plant.block_plant', $row->plant_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-danger">Block</span></a>';
                        } else {
                            $nm = route('plant.unblock_plant', $row->plant_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-success">Unblock</span></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('plant.plant_list');
        }
         //return view('admin');
        return redirect()->route('admin');
    }

    public function add_plant(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_cityplant = CityPlant::all();
            return view('plant.add_plant')->with(['all_cityplant' => $all_cityplant]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        /* validation code */
        $request->validate([
            'name' => 'required',
            'short_code'=> 'required|max:6'
        ]);
        /* user registeration */
        $Plant = new Plant;
        $Plant->name = $request->name;
        $Plant->cityplant_id = $request->cityplant_id;
        $Plant->plant_address = $request->plant_address;
        $Plant->short_code = $request->short_code;
        $Plant->location = $request->location;
        $Plant->location_short_code = $request->location_short_code;
        $Plant->save();
        
        if ($Plant) {
            return redirect('plant_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_plant(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_cityplant = CityPlant::all();
            $data['plant_data'] = Plant::find($request->plant_id);
            return view('plant.edit_plant', $data)->with(['all_cityplant' => $all_cityplant]);
        } else {
             //return view('admin');
        return redirect()->route('admin');
        }
    }

    public function update_plant(Request $request)
    {
        $data = Plant::find($request->plant_id);
        $data->name = $request->name;
        $data->cityplant_id = $request->cityplant_id;
        $data->plant_address = $request->plant_address;
        $data->short_code = $request->short_code;
        $data->location = $request->location;
        $data->location_short_code = $request->location_short_code;
        $data->save();
        return redirect('plant_list');
    }


    public function block_plant(Request $request)
    {
        $request = Plant::find($request->plant_id);
        $request->is_active = 0;
        $request->save();
        return redirect('plant_list');
    }
    public function unblock_plant(Request $request)
    {
        $request = Plant::find($request->plant_id);
        $request->is_active = 1;
        $request->save();
        return redirect('plant_list');
    }
}
