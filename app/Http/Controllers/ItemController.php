<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class ItemController extends Controller
{
    public function item_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = Item::with('plant','category')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $nm = route('item.edit_item', $row->item_id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;';
                        if ($row->is_active == 1) {
                            $nm = route('item.block_item', $row->item_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-danger">Block</span></a>';
                        } else {
                            $nm = route('item.unblock_item', $row->item_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-success">Unblock</span></a>';
                        }
                        return $btn;
                    })
                    ->addColumn('plant_name', function ($row) {
                        return $row->plant->name;
                    })
                    ->addColumn('category_name', function ($row) {
                        return $row->category->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('item.item_list');
        }
         //return view('admin');
        return redirect()->route('admin');
    }

    public function add_item(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::all();
            $all_category = Category::all();
            return view('item.add_item')->with(['all_plant' =>$all_plant, 'all_category' => $all_category]);
        } else {
            return redirect('admin');
        }
    }

    public function store(Request $request)
    {
        $Item = new Item;
        $Item->name = $request->name;
        $Item->item_no = $request->item_no;
        $Item->price = $request->price;
        $Item->item_avg_weight = $request->item_avg_weight;
        $Item->unit_id = $request->unit_id;
        $Item->batch_no = $request->batch_no;
        $Item->cat_id = $request->cat_id;
        $Item->plant_id = $request->plant_id;
        $Item->manfactring_date = $request->manfactring_date;
        $Item->save();
        if ($Item) {
            return redirect('item_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_item(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_category = Category::all();
            $all_plant = Plant::all();
            $data['itemdata'] = Item::find($request->item_id);
            return view('item.edit_item', $data)->with(['all_category' => $all_category, 'all_plant' => $all_plant]);
        } else {
             //return view('admin');
        return redirect()->route('admin');
        }
    }

    public function update_item(Request $request)
    {
        $data = Item::find($request->item_id);
        $data->name = $request->name;
        $data->item_no = $request->item_no;
        $data->price = $request->price;
        $data->item_avg_weight = $request->item_avg_weight;
        $data->batch_no = $request->batch_no;
        $data->unit_id = $request->unit_id;
        $data->cat_id = $request->cat_id;
        $data->plant_id = $request->plant_id;
        $data->manfactring_date = $request->manfactring_date;
        $data->save();
        return redirect('item_list');
    }


    public function block_item(Request $request)
    {
        $request = Item::find($request->item_id);
        $request->is_active = 0;
        $request->save();
        return redirect('item_list');
    }
    public function unblock_item(Request $request)
    {
        $request = Item::find($request->item_id);
        $request->is_active = 1;
        $request->save();
        return redirect('item_list');
    }
}
