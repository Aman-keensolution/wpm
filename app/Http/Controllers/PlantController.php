<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function plant_list()
    {
        if (session()->has('Admin_login')) {
            $data['plant_list'] = Plant::get();
            return view('plant.plant_list', $data);
        }
        return view('admin');
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
            'name' => 'required'
        ]);
        /* user registeration */
        $Plant = new Plant;
        $Plant->name = $request->name;
        $Plant->plant_address = $request->plant_address;
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
            return view('admin');
        }
    }

    public function update_plant(Request $request)
    {
        $data = Plant::find($request->plant_id);
        $data->name = $request->name;
        $data->plant_address = $request->plant_address;
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
