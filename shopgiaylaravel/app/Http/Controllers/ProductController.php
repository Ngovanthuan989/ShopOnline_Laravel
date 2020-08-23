<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Product;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
    //
    public function add_product()
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function save_product(Request $request)
    {
        # code...
        // $data = $request->all();
        // $product = new Product();
        // $product->product_code = $data['product_code'];
        // $product->product_name = $data['product_name'];
        // $product->category_id = $data['category_product_name'];
        // $product->brand_id = $data['brand_product_name'];
        // $product->product_desc = $data['product_desc'];
        // $product->product_content = $data['product_content'];
        // $product->product_details = $data['product_details'];
        // $product->product_status = $data['product_status'];
        // $product->save();

        // Session::put('message','Thêm mới sản phẩm thành công');
        // return Redirect::to('all-product');
        $data = array();
        $data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_product_name;
        $data['brand_id'] = $request->brand_product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_details'] = $request->product_details;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;


        $get_images =$request->file('main_photo');

        if ($get_images) {
            # code...
            // lấy tên cảu file ảnh
            $get_name_image = $get_images->getClientOriginalName();
            // phân tách chuỗi qua dấu chấm '.';
            $name_image = current(explode('.',$get_name_image));
            // lấy đuôi mở rộng của ảnh như:png,jpg,...
            $new_image =$name_image.rand(0,99). '.'.$get_images->getClientOriginalExtension();
            // di chuyển ảnh vào thư mục public/upload/product
            $get_images->move ('public/upload/product',$new_image);
            // thêm ảnh vào db
            $data['main_photo'] = $new_image;
            DB::table('tbl_product')->insert($data);

            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }

        $data['main_photo'] = '';
        DB::table('tbl_product')->insert($data);

        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all_product');

    }
    public function all_product()
    {
        # code...
         $all_product = DB::table('tbl_product')
         ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
         ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
         ->orderby('tbl_product.product_id','desc')->get();
         $manager_product = view('admin.show_product')->with('all_product', $all_product);
         return view('admin_layout')->with('admin.show_product',$manager_product);


    }
    public function update_product(Request $request,$product_id)
    {
        # code...
        $data = array();
        $data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_product_name;
        $data['brand_id'] = $request->brand_product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_details'] = $request->product_details;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;


        $get_images =$request->file('main_photo');

        if ($get_images) {
            # code...
            // lấy tên cảu file ảnh
            $get_name_image = $get_images->getClientOriginalName();
            // phân tách chuỗi qua dấu chấm '.';
            $name_image = current(explode('.',$get_name_image));
            // lấy đuôi mở rộng của ảnh như:png,jpg,...
            $new_image =$name_image.rand(0,99). '.'.$get_images->getClientOriginalExtension();
            // di chuyển ảnh vào thư mục public/upload/product
            $get_images->move ('public/upload/product',$new_image);
            // thêm ảnh vào db
            $data['main_photo'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);

            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }

        $data['main_photo'] = '';
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);

        Session::put('message','Cập nhập sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id)
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $edit_product = Product::find($product_id);
        $manager_product = view('admin.edit_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('edit_product',$edit_product);

         return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function delete_product($product_id)
    {
        # code...
         DB::table('tbl_product')->where('product_id',$product_id)->delete();

         Session::put('message','Xóa sản phẩm thành công!');

         return Redirect::to('all-product');


    }
    public function details_product($product_id)
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();


        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('tbl_images','tbl_images.product_id','=','tbl_product.product_id')
        ->join('tbl_size','tbl_size.product_id','=','tbl_product.product_id')
        ->where('tbl_product.product_id',$product_id)->limit(1)->get();


        $product_images = DB::table('tbl_product')
        ->join('tbl_images','tbl_images.product_id','=','tbl_product.product_id')
        ->where('tbl_product.product_id',$product_id)->get();

        $product_size = DB::table('tbl_product')
        ->join('tbl_size','tbl_size.product_id','=','tbl_product.product_id')
        ->where('tbl_product.product_id',$product_id)->get();

// sản phẩm liên quan thuộc cùng danh mục
        foreach($details_product as $key => $value){
            $category_id =$value->category_id;


        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->join('tbl_images','tbl_images.product_id','=','tbl_product.product_id')
        ->join('tbl_size','tbl_size.product_id','=','tbl_product.product_id')
        ->whereNotIn('tbl_product.product_id',[$product_id])->limit(1)->get();


        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('product_details',$details_product)->with('product_images',$product_images)->with('product_size',$product_size)->with('relate',$related_product);
    }
    public function manager_product()
    {
        # code...
    }
}
