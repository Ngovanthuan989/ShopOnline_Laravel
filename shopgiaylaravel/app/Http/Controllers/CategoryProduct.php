<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Category;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    //

    public function add_category_product()
    {
        # code...
        return view('admin.add_category_product');
    }
    public function save_category_product(Request $request)
    {
        # code...
        $data =$request->all();
        $category = new Category();
        $category->category_code = $data['category_product_code'];
        $category->category_name = $data['category_product_name'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
        $category->save();

        Session::put('message','Thêm danh mục sản phẩm thành công');

        return Redirect::to('all-category-product');
    }
     public function all_category_product()
     {
         # code...
         $all_category_product = Category::orderBy('category_id','DESC')->get();


         $manager_category_product = view('admin.show_category_product')->with('all_category_product',$all_category_product);


         return view('admin_layout')->with('admin.show_category_product',$manager_category_product);


     }
     public function edit_category_product($category_product_id)
     {
         # code...

         $edit_category_product = Category::find($category_product_id);
         $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);

         return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);



     }
     public function update_category_product(Request $request,$category_product_id)
     {
         # code...
            $data = $request->all();
            $category =Category::find($category_product_id);
            $category->category_code = $data['category_product_code'];
            $category->category_name = $data['category_product_name'];
            $category->category_desc = $data['category_product_desc'];
            $category->category_status = $data['category_product_status'];
            $category->save();

            Session::put('message','Update danh mục sản phẩm thành công');
            return Redirect::to('all-category-product');
     }
     public function delete_category_product($category_product_id)
     {
         # code...
         DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
         Session::put('message','Xóa danh mục sản phẩm thành công');
         return Redirect::to('all-category-product');

     }
// end admin


     public function show_category_home($category_id)
     {
         # code...
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

         $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();


        $category_name =DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category_home')->with('category',$cate_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);

     }


     public function shoes_category_home($category_id)
     {
         # code...
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

         $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();


        $category_name =DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.shoes_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);

     }



}
