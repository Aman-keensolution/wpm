<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Plant;
use App\Models\CityPlant;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class ItemController extends Controller
{

    public function item_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data = Item::select('*')->where('is_active', 1)->paginate(20);
            return view('item.item_list', compact('data'));
        }
        return redirect()->route('admin');
    }

    public function select_item_list(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data = Item::select('*')->where('is_active', 1)->where('item_id', @$request->item_id)->paginate(20);
            return view('item.item_list', compact('data'));
        }
        return redirect()->route('admin');
    }

    public function add_item(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_cityplant = Plant::all();
            $all_category = Category::all();
            return view('item.add_item')->with(['all_cityplant' =>$all_cityplant, 'all_category' => $all_category]);
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
        $Item->cityplant_id = $request->cityplant_id;
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
            $all_cityplant = CityPlant::all();
            $data['itemdata'] = Item::find($request->item_id);
            return view('item.edit_item', $data)->with(['all_category' => $all_category, 'all_cityplant' => $all_cityplant]);
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
        $data->cityplant_id = $request->cityplant_id;
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

    public function get_items(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $autocomplate = Item::orderby('item_no', 'asc')->select('item_id', 'item_no', 'name')->where('is_active', '=', 1)->limit(5)->get();
        } else {
            $autocomplate = Item::orderby('item_no', 'asc')->select('item_id', 'item_no', 'name')->where('name', 'like', '%' . $search . '%')->orWhere('item_id', 'like', '%' . $search . '%')->orWhere('item_no', 'like', '%' . $search . '%')->where('is_active', '=', 1)->limit(5)->get();
        }

        $response = array();
        foreach ($autocomplate as $autocomplate) {

            $response[] = array("value" => $autocomplate->item_id, "label" => $autocomplate->item_no, "name" => $autocomplate->name , "price" => $autocomplate->price, "item_avg_weight" => $autocomplate->item_avg_weight, "part_no" => $autocomplate->part_no, "is_active" => $autocomplate->is_active,);
        }

        echo json_encode($response);
        exit;
    }

}
