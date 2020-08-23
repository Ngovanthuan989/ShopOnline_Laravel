@extends('welcome')
@section('content')
<div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
                    <li class="active">PRODUCTS</li>
                </ol>
            </div>
        </div>
        <div class="products-gallery">
           <div class="container">
               <div class="col-md-9 grid-gallery">
                @foreach($all_product as $key =>$show_product)
                    <div class="col-md-5 grid-stn simpleCart_shelfItem">
                         <!-- normal -->
                            <div class="ih-item square effect3 bottom_to_top">
                                <div class="bottom-2-top">
                                   <div class="img"><img src="{{URL::to('public/upload/product/'.$show_product->main_photo)}}" alt="/" class="img-responsive gri-wid"></div>
                                <div class="info">
                                    <div class="pull-left styl-hdn">
                                        <h3>{{$show_product->product_name}}</h3>
                                    </div>
                                    <div class="pull-right styl-price">
                                        <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price">{{number_format($show_product->product_price).''.'VNĐ'}}</span></a></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div></div>
                            </div>
                        <!-- end normal -->
                        <div class="quick-view">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$show_product->product_id)}}">Quick view</a>
                        </div>
                    </div>
                @endforeach
            <div class="clearfix"></div>
                </div>
               <div class="col-md-3 grid-details">
                    <div class="grid-addon">
                        <section  class="sky-form">
					 <div class="product_right">

						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
						 <div class="tab1">
							 <ul class="place">
								 <li class="sort">Shoes</li>
								 <li class="by"><img src="{{('public/fornt end/images/do.png')}}" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
                            @foreach($category as $key =>$cate)
									<a href="{{URL::to('/shoes-category/'.$cate->category_id)}}"><p>{{$cate->category_name}}</p></a>
                            @endforeach
						     </div>
					      </div>

						  <!--script-->
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();

								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
							});
						</script>
						<!-- script -->
				 </section>
				 <!-- <section  class="sky-form">
					 <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DISCOUNTS</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
						 </div>
					 </div>
				 </section> -->
				   <!---->
					 <link rel="stylesheet" type="text/css" href="{{asset('public/fornt end/css/jquery-ui.css')}}">
					<script type='text/javascript'>//<![CDATA[
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 400000,
								values: [ 2500, 350000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]>

					</script>
					<!-- <section  class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Type</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Air Max (30)</label>
								</div>
								<div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Armagadon   (30)</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Helium (30)</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kyron     (30)</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Napolean  (30)</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Foot Rock   (30)</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Radiated  (30)</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Spiked  (30)</label>
								</div>
							</div>
				   </section> -->
				 <section  class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Brand</h4>
                        <div class="tab2">
							 <ul class="place">
								 <li class="sort">Thương hiệu nổi tiếng</li>
								 <li class="by"><img src="{{('public/fornt end/images/do.png')}}" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
                                @foreach($brand as $key =>$brand_pro)
									<a href="{{URL::to('/shoes-brand/'.$brand_pro->brand_id)}}"><p>{{$brand_pro->brand_name}}</p></a>
								@endforeach
						     </div>
					      </div>
				   </section>
                    </div>
               </div>
            <div class="clearfix"></div>
            </div>
        </div>


@endsection
