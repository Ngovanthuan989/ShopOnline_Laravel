<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Brand;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    //
    public function add_brand_product()
    {
        # code...
        return view('admin.add_brand_product');
    }
    public function save_brand_product(Request $request)
    {
        # code...
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_code= $data['brand_product_code'];
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];
        $brand->brand_status=$data['brand_product_status'];
        $brand->save();

        Session::put('message','Thêm thương hiệu sản phẩm thành công!');
        return Redirect::to('all-brand-product');

    }
    public function all_brand_product()
    {
        # code...
        $show_brand_product = Brand::orderBy('brand_id','DESC')->get();


        $manager_brand_product = view('admin.show_brand_product')->with('show_brand_product', $show_brand_product);

        return view('admin_layout')->with('admin.show_brand_product', $manager_brand_product);
    }
    public function edit_brand_product($brand_product_id)
    {
        # code...
        $edit_brand_product = Brand::find($brand_product_id);
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id)
    {
        # code...
        $data = $request->all();
        $brand =Brand::find($brand_product_id);
        $brand->brand_code = $data['brand_product_code'];
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();

        Session::put('message','Update thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id)
    {
        # code...
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    // end admin


    public function shoes_brand_home($brand_id)
    {
        # code...
        // lấy category và brand từ db theo category_status=1 nghĩa là trạng thái hiển thị
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

         $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id',$brand_id)->get();


        $brand_name =DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.shoes_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }


}
