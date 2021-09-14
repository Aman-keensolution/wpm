<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item_list()
    {
        if (session()->has('Admin_login')) {
            $data['item_list'] = Item::with('category','plant')->get();
            return view('item.item_list', $data);
        }
        return view('admin');
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
        $Item->item_name = $request->item_name;
        $Item->item_no = $request->item_no;
        $Item->item_avg_weight = $request->item_avg_weight;
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
            return view('admin');
        }
    }

    public function update_item(Request $request)
    {
        $data = Item::find($request->item_id);
        $data->item_name = $request->item_name;
        $data->item_no = $request->item_no;
        $data->item_avg_weight = $request->item_avg_weight;
        $data->batch_no = $request->batch_no;
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
