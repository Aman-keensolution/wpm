<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list()
    {
        if (session()->has('Admin_login')) {
            $data['category_list'] = Category::all();
            return view('category.category_list', $data);
        }
        return view('admin');
    }

    public function add_category(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_category = Category::all();
            return view('category.add_category')->with(['all_category' => $all_category]);;
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
        $Category = new Category;
        $Category->name = $request->name;
        $Category->p_id = $request->p_id;
        $Category->save();
        if ($Category) {
            return redirect('category.category_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_category(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['userinfo'] = Category::find($request->user_id);
            return view('category.edit_category', $data);
        } else {
            return view('admin');
        }
    }

    public function update_category(Request $request)
    {
        $data = Category::find($request->user_id);
        $data->name = $request->name;
        $data->save();
        return redirect('category_list');
    }


    public function block_user(Request $request)
    {
        $request = Category::find($request->user_id);
        $request->is_active = 0;
        $request->save();
        return redirect('category_list');
    }
    public function unblock_user(Request $request)
    {
        $request = Category::find($request->user_id);
        $request->is_active = 1;
        $request->save();
        return redirect('category_list');
    }
}
