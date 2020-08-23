@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2> Update Product</h2>
					</div>

					<div class="panel panel-widget forms-panel">

						<div class="forms">

								<h3 class="title1"></h3>

								<div class="form-three widget-shadow">

									<form class="form-horizontal" action="{{URL::to('/update-product/'.$edit_product->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Product Code</label>
											<div class="col-sm-8">
												<input type="text" value="{{$edit_product->product_code}}" class="form-control" name="product_code" id="focusedinput" placeholder="Cập Nhập Mã sản phẩm">
											</div>

										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
											<div class="col-sm-8">
												<input type="text" value="{{$edit_product->product_name}}" class="form-control" name="product_name" id="focusedinput" placeholder="Cập Nhập Tên sản phẩm">
											</div>
											<div class="col-sm-2">
												<p class="help-block">Your help text!</p>
											</div>
										</div>
                                        <div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Hình ảnh chính của sản phẩm</label>
											<div class="col-sm-8">
                                                <input type="file" name="main_photo" class="form-control" id="exampleInputEmail1">
                                                <img src="{{URL::to('public/upload/product/'.$edit_product->main_photo)}}" alt="" height="100" width="100">

											</div>
										</div>
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Category Name</label>
											<div class="col-sm-8">
                                              <select name="category_product_name" id="selector1" class="form-control">
                                           <!-- lấy dữ liệu của danh mục -->
                                            @foreach($cate_product as $key => $cate)
                                                @if($cate->category_id==$edit_product->category_id)
                                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @else
                                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endif
                                            @endforeach
											</select></div>
										</div>
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Brand Name</label>
											<div class="col-sm-8"><select name="brand_product_name" id="selector1" class="form-control">
                                            @foreach($brand_product as $key => $brand)
                                                @if($brand->brand_id==$edit_product->brand_id)
                                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                                @else
                                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                                @endif
                                            @endforeach
											</select></div>
										</div>
                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Product Description</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Cập Nhập Mô tả sản phẩm">{{$edit_product->product_desc}}</textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Product Content</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Cập nhập nội dung danh mục">{{$edit_product->product_content}}</textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Product Details</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="product_details" id="exampleInputPassword1" placeholder="Cập nhập chi tiết sản phẩm">{{$edit_product->product_details}}</textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Giá sản phẩm</label>
											<div class="col-sm-8">
                                                <input type="text" value="{{$edit_product->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1" placeholder=" Cập nhập giá sản phẩm">
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Product Status</label>
											<div class="col-sm-8"><select name="product_status" id="selector1" class="form-control">
												<option value="0">Hiển Thị</option>
												<option value="1">Ẩn</option>
											</select></div>
										</div>

                                        <button type="submit" name="add_product" class="btn btn-info">Update Product</button>



									</form>

								</div>

                    </div>
@endsection
