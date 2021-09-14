<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\Plant;
use Illuminate\Http\Request;

class BinController extends Controller
{
    public function bin_list()
    {
        if (session()->has('Admin_login')) {
            $data['bin_list'] = Bin::with('plant')->get();
            // $data['bin_list'] = Bin::get();
            return view('bin.bin_list', $data);
        }
        return view('admin');
    }

    public function add_bin(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            return view('bin.add_bin')->with(['all_plant' => $all_plant]);
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
        $Bin = new Bin;
        $Bin->name = $request->name;
        $Bin->plant_id = $request->plant_id;
        $Bin->bin_weight = $request->bin_weight;
        $Bin->save();
        if ($Bin) {
            return redirect('bin_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_bin(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['bindata'] = Bin::find($request->bin_id);
            return view('bin.edit_bin', $data);
        } else {
            return view('admin');
        }
    }

    public function update_bin(Request $request)
    {
        $data = Bin::find($request->bin_id);
        $data->name = $request->name;
        $data->plant_id = $request->plant_id;
        $data->bin_weight = $request->bin_weight;
        $data->save();
        return redirect('bin_list');
    }

    public function block_bin(Request $request)
    {
        $request = Bin::find($request->bin_id);
        $request->is_active = 0;
        $request->save();
        return redirect('bin_list');
    }
    public function unblock_bin(Request $request)
    {
        $request = Bin::find($request->bin_id);
        $request->is_active = 1;
        $request->save();
        return redirect('bin_list');
    }
}
