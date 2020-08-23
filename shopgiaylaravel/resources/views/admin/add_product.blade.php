@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2> Add New Product</h2>
					</div>

					<div class="panel panel-widget forms-panel">

						<div class="forms">

								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Product Code</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="product_code" id="focusedinput" placeholder="Mã sản phẩm">
											</div>

										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="product_name" id="focusedinput" placeholder="Tên sản phẩm">
											</div>
											<div class="col-sm-2">
												<p class="help-block">Your help text!</p>
											</div>
										</div>
                                        <div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Hình ảnh chính của sản phẩm</label>
											<div class="col-sm-8">
                                                <input type="file" name="main_photo" class="form-control" id="exampleInputEmail1">
											</div>
										</div>
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Category Name</label>
											<div class="col-sm-8">
                                              <select name="category_product_name" id="selector1" class="form-control">
                                            @foreach($cate_product as $key =>$cate)
												<option value="{{$cate->category_id}}">{{$cate->category_name}}</option>

                                            @endforeach
											</select></div>
										</div>
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Brand Name</label>
											<div class="col-sm-8"><select name="brand_product_name" id="selector1" class="form-control">
                                            @foreach($brand_product as $key =>$brand)
												<option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endforeach
											</select></div>
										</div>
                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Product Description</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Product Content</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung danh mục"></textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Product Details</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="product_details" id="exampleInputPassword1" placeholder="Chi tiết sản phẩm"></textarea>
											</div>
										</div>
                                        <div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Giá sản phẩm</label>
											<div class="col-sm-8">
                                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Product Status</label>
											<div class="col-sm-8"><select name="product_status" id="selector1" class="form-control">
												<option value="0">Hiển Thị</option>
												<option value="1">Ẩn</option>
											</select></div>
										</div>

                                        <button type="submit" name="add_product" class="btn btn-info">ADD Product</button>



									</form>
								</div>
						</div>
                    </div>

@endsection
