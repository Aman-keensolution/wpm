<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list()
    {
        if (session()->has('Admin_login')) {
            $data['category_list'] = Category::all()->where('p_id', '=', 0);
            return view('category.category_list', $data);
        }
        return view('admin');
    }

    public function sub_category_list()
    {
        if (session()->has('Admin_login')) {
            $data['category_list'] = Category::all()->where('p_id', '!=', 0);
            return view('category.sub_category_list', $data);
        }
        return view('admin');
    }

    public function add_category(Request $request)
    {
        if (session()->has('Admin_login')) {
            return view('category.add_category');
        } else {
            return redirect('admin');
        }
    }

    public function add_sub_category(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_category = Category::all()->where('p_id', '=', 0);
            return view('category.add_sub_category')->with(['all_category' => $all_category]);
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
        $Category->save();
        if ($Category) {
            return redirect('category_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }


    public function store_sub_category(Request $request)
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
            return redirect('sub_category_list');
        } else {
            return back()->with('Fail', 'Something went wrong');
        }
    }

    public function edit_category(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['category_list'] = Category::find($request->cat_id);
            return view('category.edit_category', $data);
        } else {
            return view('admin');
        }
    }

    public function edit_sub_category(Request $request)
    {
        if (session()->has('Admin_login')) {
            $all_category = Category::all()->where('p_id', '=', 0);
            $data['category_list'] = Category::find($request->cat_id);
            return view('category.edit_sub_category', $data)->with(['all_category' => $all_category]);
        } else {
            return view('admin');
        }
    }

    public function update_category(Request $request)
    {
        $data = Category::find($request->cat_id);
        $data->p_id = $request->p_id;
        $data->save();
        return redirect('category_list');
    }

    public function update_sub_category(Request $request)
    {
        $data = Category::find($request->cat_id);
        $data->name = $request->name;
        $data->p_id = $request->p_id;
        $data->save();
        return redirect('sub_category_list');
    }


    public function block_category(Request $request)
    {
        $request = Category::find($request->cat_id);
        $request->is_active = 0;
        $request->save();
        return redirect('sub_category_list');
    }
    public function unblock_category(Request $request)
    {
        $request = Category::find($request->cat_id);
        $request->is_active = 1;
        $request->save();
        return redirect('sub_category_list');
    }
}
