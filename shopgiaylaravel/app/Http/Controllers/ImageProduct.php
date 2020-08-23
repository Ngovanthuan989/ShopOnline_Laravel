<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Images;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ImageProduct extends Controller
{
    //
    public function add_images_product()
    {
        # code...
        $product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();

        return view('admin.add_images')->with('product',$product);
    }
    public function save_images_product(Request $request)
    {
        # code...
        // $data = $request ->all();
        // $images =new Images();
        // $images->product_id=$data['product_id'];
        // $images->images_name=$data['images_name'];
        // $images->save();

        // Session::put('message','Thêm ảnh cho sản phẩm thành công');

        // return Redirect::to('add-images-product');



        $data = array();
        $data['product_id'] = $request->product_id;


        $get_images =$request->file('images_name');

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
            $data['images_name'] = $new_image;
            DB::table('tbl_images')->insert($data);

            Session::put('message','Thêm thư viện ảnh cho sản phẩm thành công');
            return Redirect::to('all-images-product');
        }

        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);

        Session::put('message','Thêm thư viện  ảnh sản phẩm thành công');
        return Redirect::to('all-images-product');


    }
    public function all_images_product()
    {
        # code...

        $all_images_product = DB::table('tbl_images')
        ->join('tbl_product','tbl_images.product_id','=','tbl_product.product_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_images_product = view('admin.show_images_product')->with('all_images_product', $all_images_product);

        return view('admin_layout')->with('admin.show_images_product', $manager_images_product);
    }
    public function edit_images_product($images_id)
    {
        # code...
        $product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $edit_images_product = Images::find($images_id);
        $manager_images_product = view('admin.edit_images_product')->with('product',$product)->with('edit_images_product',$edit_images_product);

      return view('admin_layout')->with('admin.edit_images_product',$manager_images_product);
    }
    public function update_images_product(Request $request,$images_id)
    {
        # code...
        $data = array();
        $data['product_id'] = $request->product_id;


        $get_images =$request->file('images_name');

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
            $data['images_name'] = $new_image;
            DB::table('tbl_images')->where('images_id',$images_id)->update($data);

            Session::put('message','Cập nhập thư viện ảnh cho sản phẩm thành công');
            return Redirect::to('all-images-product');
        }

        $data['product_image'] = '';
        DB::table('tbl_product')->where('images_id',$images_id)->update($data);

        Session::put('message','Cập nhập thư viện ảnh sản phẩm thành công');
        return Redirect::to('all-images-product');
    }
    public function delete_images_product($images_id)
    {
        # code...
        DB::table('tbl_images')->where('images_id',$images_id)->delete();

        Session::put('message','Xóa thư viện sản phẩm thành công');

        return Redirect::to('all-images-product');
    }
}
