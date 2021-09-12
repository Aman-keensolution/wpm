<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function auth(Request $request)
    {
        $email= $request->post('email');
        $password = md5($request->post('password'));
        $result=Admin::where(['email' =>$email,'password' =>$password])->get();
       if(isset($result['0']->id)){
            $request->session()->put('Admin_login',true);
            $request->session()->put('Admin_id',$result['0']->id);
            if($result['0']->role == 1){
                return redirect('dashboard');
            }else{
                echo "hello";
            }
           
       }else{
           $request->session()->flash('error','Please enter vaild login details');
           return redirect('admin');
       }
    }

    public function store(Request $request)
    {
        /* validation code */
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:3|max:10',
            'number' =>'required|min:10|max:10'
        ]);
        /* user registeration */
        $Admin = new Admin;
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->number = $request->number;
        $Admin->password = md5($request->password);
        $Admin->save();
        if ($Admin) {
           return redirect('admin.userlist');
         } else {
             return back()->with('Fail', 'Something went wrong');
         }	
    }

    public function edit_user(Request $request)
    {
        if (session()->has('Admin_login')) {
            $data['userinfo'] = Admin::find($request->id);
            return view('admin.edit_user',$data);
        }else{
            return view('userlist');
        }
       
    }

    public function add_user(Request $request)
    {
        if (session()->has('Admin_login')) {
            return view('admin.add_user');
        } else {
            return redirect('admin');
        }
    }

    public function update_user(Request $request)
    {
        $data = Admin::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->number = $request->number;
        $data->password = $request->password;
        $data->save();
        return redirect('userlist');
    }

    public function dashboard()
    {
        if(session()->has('Admin_login')){
            return view('admin.welcome');
        }else{
            return redirect('admin');
        }
    }

    public function userlist()
    {
        if (session()->has('Admin_login')) {
            $data['user_list'] = Admin::where('is_deleted', 1)->get();
            return view('admin.userlist', $data);
        }
        return view('Login');
    }

    public function Block_user(Request $request)
    {
        $request = Admin::find($request->id);
        $request->is_deleted = 2;
        $request->save();
        return redirect('admin.userlist');
    }

    public function Logout(Request $request)
    {
        if (session()->has('Admin_login')) {
            session()->pull('Admin_login', null);
            return redirect('admin');
        }
    }

}
