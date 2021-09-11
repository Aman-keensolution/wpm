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
        ]);
        /* user registeration */
        $Admin = new Admin;
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->role = 2;
        $Admin->password = md5($request->password);
        $Admin->save();
        if ($Admin) {
           return redirect('admin')->with('success', 'You have been successfuly register');
         } else {
             return back()->with('Fail', 'Something went wrong');
         }	
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}
