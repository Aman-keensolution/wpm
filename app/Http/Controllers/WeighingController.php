<?php

namespace App\Http\Controllers;

use App\Models\WeightScale;
use Illuminate\Http\Request;

class WeighingController extends Controller
{
    public function weighing_list()
    {
        if (session()->has('Admin_login')) {
            $data['user_list'] = WeightScale::get();
            return view('weighing.weighing_list', $data);
        }
        return view('admin');
    }

    public function add_plant(Request $request)
    {
        if (session()->has('Admin_login')) {
            return view('weighing.add_weighing');
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
        $WeightScale = new WeightScale;
        $WeightScale->name = $request->name;
        $WeightScale->save();
        if ($WeightScale) {
            return redirect('weighing.weighing_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_weighing(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['userinfo'] = WeightScale::find($request->user_id);
            return view('weighing.edit_weighing', $data);
        } else {
            return view('admin');
        }
    }

    public function update_weighing(Request $request)
    {
        $data = WeightScale::find($request->user_id);
        $data->name = $request->name;
        $data->save();
        return redirect('weighing_list');
    }


    public function block_user(Request $request)
    {
        $request = WeightScale::find($request->user_id);
        $request->is_active = 0;
        $request->save();
        return redirect('weighing_list');
    }
    public function unblock_user(Request $request)
    {
        $request = WeightScale::find($request->user_id);
        $request->is_active = 1;
        $request->save();
        return redirect('weighing_list');
    }
}
