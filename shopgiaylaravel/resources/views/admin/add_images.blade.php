@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2> Add Images Product</h2>
					</div>

					<div class="panel panel-widget forms-panel">

						<div class="forms">

								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="{{URL::to('/save-images-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Product_Code</label>
											<div class="col-sm-8"><select name="product_id" id="selector1" class="form-control">
                                            @foreach($product as $key => $pro_value)
												<option value="{{$pro_value->product_id}}">{{$pro_value->product_code}}</option>
                                            @endforeach
											</select></div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Hình Ảnh Sản Phẩm</label>
											<div class="col-sm-8">
                                                <input type="file" name="images_name" class="form-control" id="exampleInputEmail1">
											</div>
										</div>
                                        <button type="submit" name="add_category_product" class="btn btn-info">ADD Images Product</button>

									</form>
								</div>
						</div>
                    </div>

@endsection
