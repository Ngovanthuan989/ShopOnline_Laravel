<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use Cart;

use App\Http\Requests;
use App\Customer;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    //
    public function register_checkout()
    {
        # code...

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        return view('pages.checkout.register_checkout')->with('category',$cate_product);
    }
    public function login_checkout()
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product);
    }
    public function logout_checkout()
    {
        # code...
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function add_customer(Request $request)
    {
        # code...
        // $data = $request->all();
        // $customer = new Customer();
        // $customer->firstName = $data['firstName'];
        // $customer->lastName = $data['lastName'];
        // $customer->customer_email = $data['email'];
        // $customer->customer_password = md5($data['password']);
        // $customer->customer_phone = $data['phone_number'];
        // $customer->save();


        // Session::put('customer_id',$customer_id);
        // Session::put('lastName',$request->lastName);

        // return Redirect::to('register-checkout');


        $data = array();
        $data['firstName'] = $request->firstName;
        $data['lastName'] = $request->lastName;
        $data['customer_email'] = $request->email ;
        $data['customer_password'] = md5($request->password);
        $data['customer_phone'] = $request->phone_number;


        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/register-checkout');
    }
    public function login_customer(Request $request)
    {
        # code...
        $email = $request->email_account;
        $password =md5($request->password_account);

        $result= DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();


        if ($result) {
            # code...
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');

        }else{
            Session::put('message','Email Hoặc Password Sai!');
            return Redirect::to('/login-checkout');
        }

    }
    public function checkout()
    {
        # code...
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('category',$cate_product);
    }
    public function save_checkout_customer(Request $request)
    {
        # code...
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['customer_id'] = $request->customerId_hidden;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;


        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);


        return Redirect::to('/payment');

    }
    public function payment()
    {

        # code...
        $shippingId=Session::get('shipping_id');

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        $shipping_address = DB::table('tbl_shipping')->where('shipping_id',$shippingId)->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('shipping',$shipping_address);
    }
    public function order_place(Request $request)
    {
        # code...

        // insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_options;
        $data['payment_status'] = 'Đang chờ xử lí';

        $payment_id =DB::table('tbl_payment')->insertGetId($data);



        // insert order
        $order_data =array();
        $order_data['customer_id']= Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::total();
        $order_data['order_status']='Đang chờ xử lí';

        $order_id =DB::table('tbl_order')->insertGetId($order_data);


        //insert order_details
        $content =Cart::content();

        foreach ($content as $v_content) {
            # code...
            $order_d_data =array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] =$v_content->name;
            $order_d_data['product_price'] =$v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;

            DB::table('tbl_order_details')->insert($order_d_data);
        }

            if ($data['payment_method']==1) {
                # code...
                echo 'Thanh toán thẻ ATM';
            }elseif ($data['payment_method']==2) {
                # code...

                // Thanh toán rồi sẽ hủy phiên mua
                Cart::destroy();
                $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

                 return view('pages.checkout.handcash')->with('category',$cate_product);
            }else {
                # code...
                echo 'Thanh toán bằng thẻ ghi nợ';
            }


    }

}
