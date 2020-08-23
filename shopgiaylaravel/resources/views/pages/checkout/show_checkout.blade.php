@extends('welcome')
@section('content')

<div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
                    <li class="active">Shipping</li>
                </ol>
            </div>
        </div>
        <!-- contact -->
        <div class="contact">
            <div class="container">
                <h3>Shipping Address</h3>
                <div class="contact-content">
                    <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                    {{csrf_field()}}
                        <input type="text" class="textbox" name="shipping_email" placeholder="Email*">

                        <input type="text" class="textbox" name="shipping_name" placeholder="Họ Và Tên">
                        <?php
                          $customer_id = Session::get('customer_id');
                        ?>
                        <input name="customerId_hidden" type="hidden" value="{{$customer_id}}" />

                        <input type="text" class="textbox" name="shipping_address" placeholder="Địa chỉ">
                        <input type="text" class="textbox" name="shipping_phone" placeholder="Phone">

                        <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                    <!-- <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm"> -->
                       <div class="submit">
                            <input class="btn btn-default cont-btn" type="submit" value="SEND " />
                      </div>
                    </form>

                </div>
            </div>
        </div>

@endsection
