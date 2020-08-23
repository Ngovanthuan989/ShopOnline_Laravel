<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    //

    public function show_cart()
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        return view('pages.cart.show_cart')->with('category',$cate_product);
    }
    public function save_cart(Request $request)
    {
        # code...
        $productId = $request->productId_hidden;
        $quantity = $request->qty;
        $productSize=$request->size;

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();



        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['size'] = $productSize;
        $data['options']['image'] = $product_info->main_photo;
        Cart::add($data);

        return Redirect::to('/show-cart');
    }
    public function delete_to_cart($rowId)
    {
        # code...
        Cart::update($rowId,0);
         return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request)
    {
        # code...
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId,$qty);

        return Redirect::to('/show-cart');
    }
}
