<?php

namespace App\Http\Controllers;

use App\Models\Plant;
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
            return view('plant.add_plant');
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        /* validation code */
        $request->validate([
            'name' => 'required',
            'shot_code'=> 'required|min:5|max:6'
        ]);
        /* user registeration */
        $Plant = new Plant;
        $Plant->name = $request->name;
        $Plant->plant_address = $request->plant_address;
        $Plant->shot_code = $request->shot_code;
        $Plant->location = $request->location;
        $Plant->location_shot_code = $request->location_shot_code;
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
            $data['plant_data'] = Plant::find($request->plant_id);
            return view('plant.edit_plant', $data);
        } else {
             //return view('admin');
        return redirect()->route('admin');
        }
    }

    public function update_plant(Request $request)
    {
        $data = Plant::find($request->plant_id);
        $data->name = $request->name;
        $data->plant_address = $request->plant_address;
        $data->shot_code = $request->shot_code;
        $data->location = $request->location;
        $data->location_shot_code = $request->location_shot_code;
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
