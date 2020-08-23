@extends('admin_layout')
@section('admin_content')
<div class="progressbar-heading grids-heading">
						<h2> Add New Product Brands</h2>
					</div>

					<div class="panel panel-widget forms-panel">

						<div class="forms">

								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{csrf_field()}}
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Brand Code</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="brand_product_code" id="focusedinput" placeholder="Mã thương hiệu">
											</div>

										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Brand Name</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="brand_product_name" id="focusedinput" placeholder="Tên thương hiệu">
											</div>
											<div class="col-sm-2">
												<p class="help-block">Your help text!</p>
											</div>
										</div>

                                        <div class="form-group">
											<label for="smallinput" class="col-sm-2 control-label label-input-sm">Brand Description</label>
											<div class="col-sm-8">
                                            <textarea style="resize: none;" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Brand Status</label>
											<div class="col-sm-8"><select name="brand_product_status" id="selector1" class="form-control">
												<option value="0">Hiển Thị</option>
												<option value="1">Ẩn</option>
											</select></div>
										</div>

                                        <button type="submit" name="add_category_product" class="btn btn-info">ADD Brand</button>



									</form>
								</div>
						</div>
                    </div>


@endsection
