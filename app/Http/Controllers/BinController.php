<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use Illuminate\Http\Request;

class BinController extends Controller
{
    public function bin_list()
    {
        if (session()->has('Admin_login')) {
            $data['user_list'] = Bin::get();
            return view('bin.bin_list', $data);
        }
        return view('admin');
    }

    public function add_bin(Request $request)
    {
        if (session()->has('Admin_login')) {
            return view('bin.add_bin');
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
        $Bin->save();
        if ($Bin) {
            return redirect('bin.bin_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_bin(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['userinfo'] = Bin::find($request->user_id);
            return view('bin.edit_bin', $data);
        } else {
            return view('admin');
        }
    }

    public function update_bin(Request $request)
    {
        $data = Bin::find($request->user_id);
        $data->name = $request->name;
        $data->save();
        return redirect('bin_list');
    }

    public function block_user(Request $request)
    {
        $request = Bin::find($request->user_id);
        $request->is_active = 0;
        $request->save();
        return redirect('bin_list');
    }
    public function unblock_user(Request $request)
    {
        $request = Bin::find($request->user_id);
        $request->is_active = 1;
        $request->save();
        return redirect('bin_list');
    }
}
