@extends('welcome')
@section('content')




<script src="{{asset('public/fornt end/js/imagezoom.js')}}"></script>
              <script defer src="{{asset('public/fornt end/js/jquery.flexslider.js')}}"></script>
            <link rel="stylesheet" href="{{asset('public/fornt end/css/flexslider.css')}}" type="text/css" media="screen" />

            <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
              });
            });
            </script>
<div class="head-bread">
@foreach($product_details as $key =>$pro_details)
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
                    <li><a href="{{URL::to('/shoes-category/'.$pro_details->category_id)}}">{{$pro_details->category_name}}</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <div class="showcase-grid">
            <div class="container">
                <div class="col-md-8 showcase">
                    <div class="flexslider">
                          <ul class="slides">
                          @foreach($product_images as $key =>$valu)
                            <li data-thumb="{{URL::to('public/upload/product/'.$valu->images_name)}}">
                                <div class="thumb-image"> <img src="{{URL::to('public/upload/product/'.$valu->images_name)}}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            @endforeach
                            <!-- <li data-thumb="{{URL::to('public/upload/product/'.$pro_details->images_name)}}">
                                 <div class="thumb-image"> <img src="{{URL::to('public/upload/product/'.$pro_details->images_name)}}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="{{asset('public/fornt end/images/show2.jpg')}}">
                               <div class="thumb-image"> <img src="{{asset('public/fornt end/images/show2.jpg')}}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="{{URL::to('public/upload/product/'.$pro_details->images_name)}}">
                               <div class="thumb-image"> <img src="{{URL::to('public/upload/product/'.$pro_details->images_name)}}" data-imagezoom="true" class="img-responsive"> </div>
                            </li> -->
                          </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-4 showcase">
                    <div class="showcase-rt-top">
                        <div class="pull-left shoe-name">
                            <h3>{{$pro_details->product_name}}</h3>
                            <p>Thương hiệu: {{$pro_details->brand_name}}</p>
                            <h4>{{number_format($pro_details->product_price).' '.'VNĐ'}}</h4>
                        </div>
                        <div class="pull-left rating-stars">
                            <ul>
                                <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                                <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                                <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
                    <form action="{{URL::to('/save-cart')}}" method="post">
                        {{csrf_field()}}
                    <div class="shocase-rt-bot">
                        <div class="float-qty-chart">


                        <ul>
                            <li class="qty">
                                <h3>Size Chart</h3>

                                <select class="form-control siz-chrt" name="size">
                                @foreach($product_size as $key =>$value)
                                  <option>{{$value->size_name}}</option>
                                  @endforeach
                                </select>

                            </li>
                            <input name="productId_hidden" type="hidden" value="{{$pro_details->product_id}}" />
                            <li class="qty">
                                <h4>QTY</h4>
                                <select class="form-control qnty-chrt" name="qty">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                </select>
                            </li>
                        </ul>


                        <div class="clearfix"></div>
                        </div>
                        <ul>
                            <li class="ad-2-crt simpleCart_shelfItem">
                                <!-- <a class="btn item_add" href="#" role="button"></a> -->
                                <button type="submit" class="btn item_add">Add To Cart</button>

                                <a class="btn" href="#" role="button">Buy Now</a>
                            </li>
                        </ul>
                    </div>
                    </form>
                    <div class="showcase-last">
                        <h3>product details</h3>
                        <ul>
                            <li>{{$pro_details->product_details}}</li>
                            <!-- <li>Unique eyestays work with the Flywire cables to create an even better glove-like fit</li>
                            <li>Waffle outsole for durability and multi-surface traction</li>
                            <li>Sculpted Cushlon midsole combines plush cushioning and springy resilience for impact protection</li>
                            <li>Midsole flex grooves for greater forefoot flexibility</li> -->
                        </ul>
                    </div>
                </div>

        <div class="clearfix"></div>
            </div>
        </div>

        <div class="specifications">
            <div class="container">
              <h3>Item Details</h3>
                <div class="detai-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills tab-nike" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Highlights</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terms & conditiona</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                    <p>{{$pro_details->product_content}}</p>
                    <p>Dynamic Flywire cables integrate with the laces and wrap your midfoot for a truly adaptive, supportive fit.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                    <p>{{$pro_details->product_desc}}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        The images represent actual product though color of the image and product may slightly differ.
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="you-might-like">
            <div class="container">
                <h3 class="you-might">Products You May Like</h3>
                @foreach($relate as $key =>$lienquan)
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                     <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                                <div class="img"><img src="{{URL::to('public/upload/product/'.$lienquan->main_photo)}}" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3>{{$lienquan->product_name}}</h3>
                                </div>
                                <div class="pull-right styl-price">
                                    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price">{{number_format($lienquan->product_price).''.'VNĐ'}}</span></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">Quick view</a>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            @endforeach

        </div>

@endsection
