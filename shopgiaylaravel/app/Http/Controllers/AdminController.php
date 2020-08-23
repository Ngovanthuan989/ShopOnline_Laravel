<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// database
use DB;
use App\LoginAdmin;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{




    //kiểm tra xem có tồn tại admin_id hay không nếu không trả về trang admim để đăng nhập
    public function AuthLogin()
    {
        # code...
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            # code...
            return Redirect::to('dasboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        # code...

        return view('admin_login');
    }
    public function show_dashboard()
    {
        # code...
        // $this->AuthLogin();
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        # code...

         $data = $request->all();
         $admin_email = $data['admin_email'];
         $admin_password = md5($data['admin_password']);
         $login = LoginAdmin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

         if ($login) {
             # code...
             Session::put('admin_name',$login->admin_name);
             Session::put('admin_id',$login->admin_id);

             return Redirect::to('/dashboard');
         }else {
             # code...
             Session::put('message','Tài Khoản Hoặc Mật Khẩu Sai!');
             return Redirect::to('/admin');
         }

    }
    public function logout()
    {
        # code...
        Session::put('admin_name',null);
        Session::put('admin_id',null);

        return Redirect::to('/admin');
    }
}
