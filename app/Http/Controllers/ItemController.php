<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item_list()
    {
        if (session()->has('Admin_login')) {
            $data['user_list'] = Item::get();
            return view('item.item_list', $data);
        }
        return view('admin');
    }

    public function add_item(Request $request)
    {
        if (session()->has('Admin_login')) {
            return view('item.add_item');
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
        $Item = new Item;
        $Item->name = $request->name;
        $Item->save();
        if ($Item) {
            return redirect('item.item_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_item(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['userinfo'] = Item::find($request->user_id);
            return view('item.edit_item', $data);
        } else {
            return view('admin');
        }
    }

    public function update_item(Request $request)
    {
        $data = Item::find($request->user_id);
        $data->name = $request->name;
        $data->save();
        return redirect('item_list');
    }


    public function block_item(Request $request)
    {
        $request = Item::find($request->user_id);
        $request->is_active = 0;
        $request->save();
        return redirect('item_list');
    }
    public function unblock_item(Request $request)
    {
        $request = Item::find($request->user_id);
        $request->is_active = 1;
        $request->save();
        return redirect('item_list');
    }
}
