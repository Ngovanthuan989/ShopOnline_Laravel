@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2>Update Images Product</h2>
					</div>

					<div class="panel panel-widget forms-panel">

						<div class="forms">

								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="{{URL::to('/update-images-product/'.$edit_images_product->images_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Product_Code</label>
											<div class="col-sm-8"><select name="product_id" id="selector1" class="form-control">
                                            @foreach($product as $key => $pro_value)
                                                @if($pro_value->product_id==$edit_images_product->product_id)
                                                    <option selected value="{{$pro_value->product_id}}">{{$pro_value->product_code}}</option>
                                                @else
                                                <option value="{{$pro_value->product_id}}">{{$pro_value->product_code}}</option>
                                                @endif
                                            @endforeach
											</select></div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Hình Ảnh Sản Phẩm</label>
											<div class="col-sm-8">
                                                <input type="file" value="{{$edit_images_product->images_name}}" name="images_name" class="form-control" id="exampleInputEmail1">
                                                <img src="{{URL::to('public/upload/product/'.$edit_images_product->images_name)}}" alt="" height="100" width="100">

											</div>
										</div>
                                        <button type="submit" name="update_images_product" class="btn btn-info">Update Images Product</button>

									</form>
								</div>
						</div>
                    </div>

@endsection
