<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function plant_list()
    {
        if (session()->has('Admin_login')) {
            $data['user_list'] = Plant::get();
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
        $Plant->save();
        if ($Plant) {
            return redirect('plant.plant_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_plant(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['userinfo'] = Plant::find($request->user_id);
            return view('plant.edit_plant', $data);
        } else {
            return view('admin');
        }
    }

    public function update_plant(Request $request)
    {
        $data = Plant::find($request->user_id);
        $data->name = $request->name;
        $data->save();
        return redirect('plant_list');
    }


    public function block_user(Request $request)
    {
        $request = Plant::find($request->user_id);
        $request->is_active = 0;
        $request->save();
        return redirect('plant_list');
    }
    public function unblock_user(Request $request)
    {
        $request = Plant::find($request->user_id);
        $request->is_active = 1;
        $request->save();
        return redirect('plant_list');
    }
}
