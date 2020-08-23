<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Sizes;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductSize extends Controller
{
    //
    public function add_product_size()
    {
        # code...
        $product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        return view('admin.add_product_size')->with('product',$product);
    }
    public function save_product_size(Request $request)
    {
        # code...
        $data = $request ->all();
        $size =new Sizes();
        $size->product_id=$data['product_id'];
        $size->size_name=$data['size_name'];
        $size->save();

        Session::put('message','Thêm size cho sản phẩm thành công!');

        return Redirect::to('all-product-size');
    }
    public function all_product_size()
    {
        # code...
        $all_product_size = DB::table('tbl_size')
        ->join('tbl_product','tbl_size.product_id','=','tbl_product.product_id')
        ->orderby('tbl_product.product_id','desc')->get();

        $manager_product_size=view('admin.show_product_size')->with('all_product_size',$all_product_size);

        return view('admin_layout')->with('admin.show_product_size',$manager_product_size);

    }
    public function edit_product_size($size_id)
    {
        # code...
        $product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();

        $edit_product_size = Sizes::find($size_id);

        $manager_product_size=view('admin.edit_product_size')->with('product',$product)->with('edit_product_size',$edit_product_size);

        return view('admin_layout')->with('admin_edit_product_size',$manager_product_size);
    }
    public function update_product_size(Request $request,$size_id)
    {
        # code...
        $data = $request ->all();
        $size = Sizes::find($size_id);
        $size->product_id=$data['product_id'];
        $size->size_name=$data['size_name'];
        $size->save();

        Session::put('message','Cập nhập size cho sản phẩm thành công!');

        return Redirect::to('all-product-size');
    }
    public function delete_product_size($size_id)
    {
        # code...
        DB::table('tbl_size')->where('size_id',$size_id)->delete();

        Session::put('message','Xóa size sản phẩm thành công!');

        return Redirect::to('all-product-size');
    }
}
