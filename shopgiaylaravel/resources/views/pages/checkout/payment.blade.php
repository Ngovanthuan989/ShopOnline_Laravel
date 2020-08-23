@extends('welcome')
@section('content')

<div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
                    <li><a href="{{URL::to('/products')}}">Products</a></li>
                    <li class="active">Payment</li>
                </ol>
            </div>
        </div>
        <?php
          $content = Cart::content();
        ?>
        <!-- check-out -->
            <div class="check">
                <div class="container">
                    <div class="col-md-3 cart-total">
                        <a class="continue" href="#">Xem lại giỏ hàng</a>
                        <div class="price-details">
                            <h3>Shipping Address</h3>
                            @foreach($shipping as $key =>$ship_value)
                            <span>Name</span>
                            <span class="total1">{{$ship_value->shipping_name}}</span>
                            <span>Email</span>
                            <span class="total1">{{$ship_value->shipping_email}}</span>
                            <span>Phone</span>
                            <span class="total1">{{$ship_value->shipping_phone}}</span>
                            <span>Address</span>
                            <span class="total1">{{$ship_value->shipping_address}}</span>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                        <hr class="featurette-divider">

                        <div class="price-details">
                            <h3>Price Details</h3>
                            <span>Total</span>
                            <span class="total1">{{Cart::subtotal().' '.'vnd'}}</span>
                            <span>Ship</span>
                            <span class="total1">Free</span>
                            <span>VAT</span>
                            <span class="total1">{{Cart::tax().' '.'vnd'}}</span>
                            <div class="clearfix"></div>
                        </div>
                        <hr class="featurette-divider">
                        <ul class="total_price">
                           <li class="last_price"> <h4>TOTAL</h4></li>
                           <li class="price"><span>{{Cart::total().' '.'vnd'}}</span></li>
                           <div class="clearfix"> </div>
                        </ul>
                        <div class="clearfix"></div>

                        <!-- <a class="order" href="{{URL::to('/')}}">Đặt Hàng</a> -->

                    </div>
                    <div class="col-md-9 cart-items">
                        <h1>My Shopping Bag</h1>
                            <!-- <script>$(document).ready(function(c) {
                                $('.close1').on('click', function(c){
                                    $('.cart-header').fadeOut('slow', function(c){
                                        $('.cart-header').remove();
                                    });
                                    });
                                });
                           </script> -->
                       @foreach($content as $v_content)
                        <div class="cart-header">
                             <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">
                                <div class="close1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                             </a>
                            <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" class="img-responsive" alt=""/>
                                    </div>
                                   <div class="cart-item-info">
                                        <ul class="qty">
                                            <li><p>Size :{{$v_content->size}}</p></li>
                                            <li>
                                                    <form action="{{URL::to('/update-cart')}}" method="post">
                                                        {{csrf_field()}}
                                                        Qty : <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
                                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">

                                                  </form>

                                            </li>
                                            <li>
                                                <p>Price each :
                                                                <?php
                                                                    $subtotal = $v_content->price * $v_content->qty;
                                                                    echo number_format($subtotal).'vnd';
                                                                ?>
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="delivery">
                                             <p>{{$v_content->name}}</p>
                                             <span>Delivered in 2-3 bussiness days</span>
                                             <div class="clearfix"></div>
                                        </div>
                                   </div>
                                   <div class="clearfix"></div>

                              </div>
                         </div>
                         @endforeach
                         <!-- <script>$(document).ready(function(c) {
                                $('.close2').on('click', function(c){
                                        $('.cart-header2').fadeOut('slow', function(c){
                                    $('.cart-header2').remove();
                                });
                                });
                                });
                         </script> -->

                    <div class="clearfix"> </div>
                </div>

            </div>
            <hr class="featurette-divider">

            <form action="{{URL::to('/order-place')}}" method="POST" >
                    {{csrf_field()}}


                <h3>Chọn phương thức thanh toán</h3>

                    <div class="form-group">
                        <select name="payment_options" id="selector1" class="form-control">
                            <option value="1">Thẻ tín dụng</option>
                            <option value="2">Nhận tiền mặt</option>
                            <option value="3">Thẻ ghi nợ</option>
                        </select>
                    </div>

                    <div class="submit">
                            <input class="btn btn-default cont-btn" type="submit" value="Đặt Hàng " />
                    </div>

           </form>

@endsection
