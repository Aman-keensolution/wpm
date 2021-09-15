<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Plant;
use App\Models\Item;
use App\Models\Bin;
use App\Models\Admin;
use DataTables;

class StockController extends Controller
{
    public function stock_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = Stock::with('plant')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $nm = route('stock.edit_stock', $row->stock_Id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;';
                        if ($row->is_active == 1) {
                            $nm = route('stock.block_stock', $row->stock_Id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-danger">Block</span></a>';
                        } else {
                            $nm = route('stock.unblock_stock', $row->stock_Id);
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
            return view('stock.stock_list');
        }
        //return view('admin');
        return redirect()->route('admin');
    }

    public function add_stock(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            $all_bin = Bin::all();
            $all_item = Item::all();
            $all_user = Admin::where('role', 2)->get();
            return view('stock.add_stock')->with(['all_plant' => $all_plant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        $user_id = session()->get('Admin_id');
        $Stock = new Stock;
        $Stock->name = $request->name;
        $Stock->plant_id = $request->plant_id;
        $Stock->user_id = $user_id;

        $Stock->save();
        if ($Stock) {
            return redirect('stock_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_stock(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            $data['Stockdata'] = Stock::find($request->stock_Id);
            return view('stock.edit_stock', $data)->with(['all_plant' => $all_plant]);
        } else {
            //return view('admin');
            return redirect()->route('admin');
        }
    }

    public function update_stock(Request $request)
    {
        $data = Stock::find($request->stock_Id);
        $data->name = $request->name;
        $data->plant_id = $request->plant_id;
        $data->save();
        return redirect('stock_list');
    }


    public function block_stock(Request $request)
    {
        $request = Stock::find($request->stock_Id);
        $request->is_active = 0;
        $request->save();
        return redirect('stock_list');
    }
    public function unblock_stock(Request $request)
    {
        $request = Stock::find($request->stock_Id);
        $request->is_active = 1;
        $request->save();
        return redirect('stock_list');
    }
}
