<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\Plant;
use App\Models\Admin;
use Illuminate\Http\Request;
use DataTables;

class BinController extends Controller
{
    public function bin_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = Bin::with('plant')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                            $nm=route('bin.edit_bin',$row->bin_id);
                           $btn = '<a href="'.$nm. '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;' ;
                           if($row->is_active==1){
                                $nm=route('bin.block_bin',$row->bin_id);
                                $btn .= '<a href="'.$nm.'"><span class="badge bg-danger">Block</span></a>';
                           }else{
                                $nm=route('bin.unblock_bin',$row->bin_id);    
                                $btn .= '<a href="'.$nm.'"><span class="badge bg-success">Unblock</span></a>';
                            }
                            return $btn;
                        })
                        ->addColumn('plant_name', function($row){
                            return $row->plant->name ;
                            
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('bin.bin_list');
        }

         //return view('admin');
        return redirect()->route('admin');
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
        $Bin->plant_id = $request->plant_id;
        $Bin->bin_weight = $request->bin_weight;
        $Bin->save();
        if ($Bin) {
            return redirect('bin_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function store1(Request $request)
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
            return redirect('stock_list');
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
             //return view('admin');
        return redirect()->route('admin');
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
