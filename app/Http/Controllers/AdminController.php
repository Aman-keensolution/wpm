<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Item;
use App\Models\Bin;
use App\Models\Category;
use App\Models\WeightScale;
use Illuminate\Support\Str;
use DataTables;
use Mail;
use App\Mail\AdminResetEmailMail;



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
    // public function register()
    // {
    //     return view('register');
    // }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = md5($request->post('password'));
        $result = Admin::where(['email' => $email, 'password' => $password])->get();
        if (isset($result['0']->user_id)) {
            if ($result['0']->role == 1) {
                $request->session()->put('Admin_login', true);
                $request->session()->put('role', $result['0']->role);
                $request->session()->put('Admin_id', $result['0']->user_id);
                return redirect('dashboard');
            } else {
                $request->session()->put('Admin_login', true);
                $request->session()->put('user_id', $result['0']->user_id);
                $request->session()->put('role', $result['0']->role);
                return redirect('dashboard');
            }
        } else {
            $request->session()->flash('error', 'Please enter vaild login details');
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
            'mobile' => 'required|min:10|max:10'
        ]);
        /* user registeration */
        $Admin = new Admin;
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->mobile = $request->mobile;
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

            return view('admin.edit_user', $data);
        } else {
            //return view('admin');
            return redirect()->route('admin');
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
        $data = Admin::find($request->user_id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = $request->password;
        $data->save();
        return redirect('userlist');
    }

    public function dashboard()
    {
        if (session()->has('Admin_login')) {
            $all_plant = Plant::where('is_active', 1)->count();
            $all_bin = Bin::where('is_active', 1)->count();
            $all_item = Item::where('is_active', 1)->count();
            $all_WeightScale = WeightScale::where('is_active', 1)->count();
            $all_category = Category::where('is_active', 1)->count();
            $all_user = Admin::where('role', 2)->count();
            return view('welcome')->with(['all_plant' => $all_plant, 'all_item' => $all_item, 'all_bin' => $all_bin, 'all_user' => $all_user, 'all_WeightScale' => $all_WeightScale, 'all_category' => $all_category]);
        } else {
            return redirect('admin');
        }
    }

    public function userlist(Request $request)
    {
        if (session()->has('Admin_login')) {
            if ($request->ajax()) {
                $data = Admin::select('*');
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $nm = route('admin.edit_user', $row->user_id);
                        $btn = '<a href="' . $nm . '"> <span class="badge bg-primary">Edit</span></a>&nbsp;&nbsp;';
                        if ($row->is_active == 1) {
                            $nm = route('admin.block_user', $row->user_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-danger">Block</span></a>';
                        } else {
                            $nm = route('admin.unblock_user', $row->user_id);
                            $btn .= '<a href="' . $nm . '"><span class="badge bg-success">Unblock</span></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.userlist');
        }
        //return view('admin');
        return redirect()->route('admin');
    }


    public function block_user(Request $request)
    {
        $request = Admin::find($request->id);
        $request->is_active = 0;
        $request->save();
        return redirect('userlist');
    }
    public function unblock_user(Request $request)
    {
        $request = Admin::find($request->id);
        $request->is_active = 1;
        $request->save();
        return redirect('userlist');
    }

    public function forget_password(Request $request)
    {
        return view('forget_password');
    }

    public function sendForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $user_info = Admin::Where('email', $request->email)->first();

        if (!empty($user_info)) {
            $token_id = Str::random(30);
            $user_info->email_verify =  $token_id;
            $user_info->save();
            $message = 'Here is you password reset link, If you did not request to reset your password just ignore this mail. <a class="btn" href="' . route('admin.reset_password', ['user' => $user_info->name, 'token' => $token_id]) . '">Click Reset Password</a>';
            $data = [
                'name' => $user_info->name,
                'message' => $message
            ];
            Mail::to($user_info->email)->send(new AdminResetEmailMail($data));

            return redirect()->back()->with([
                'msg' => __('We have e-mailed your password reset link!'),
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg' => __('Your Username or Email Is Wrong!!!'),
                'type' => 'danger'
            ]);
        }
    }

    public function reset_password($username)
    {
        return view('reset_password');
    }

    public function adminResetPassword(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = Admin::where('name', $request->username)->first();
        $user = Admin::findOrFail($user_info->id);
        if (!empty($user)) {
            $user->password = md5($request->password);
            $user->save();
            return redirect()->route('admin')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }



    public function logout(Request $request)
    {
        if (session()->has('Admin_login')) {
            session()->pull('Admin_login', null);
            return redirect('admin');
        }
    }
}
