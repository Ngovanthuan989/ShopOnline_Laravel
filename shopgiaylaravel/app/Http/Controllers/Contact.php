<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Contact extends Controller
{
    //
    public function contact()
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        return view('pages.contact.show_contact')->with('category',$cate_product);
    }
}
