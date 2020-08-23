@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2> Update Size Product</h2>
					</div>

					<div class="panel panel-widget forms-panel">

						<div class="forms">

								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
									<form class="form-horizontal" action="{{URL::to('/update-product-size/'.$edit_product_size->size_id)}}" method="post">
                                    {{csrf_field()}}
                                        <div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Product_Code</label>
											<div class="col-sm-8"><select name="product_id" id="selector1" class="form-control">
                                            @foreach($product as $key => $values)
                                                @if($values->product_id==$edit_product_size->product_id)
                                                    <option selected value="{{$values->product_id}}">{{$values->product_code}}</option>
                                                @else
                                                <option value="{{$values->product_id}}">{{$values->product_code}}</option>
                                                @endif
                                            @endforeach
											</select></div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Size Sản Phẩm</label>
											<div class="col-sm-8">
                                                <input type="text" value="{{$edit_product_size->size_name}}" name="size_name" class="form-control" id="exampleInputEmail1">
											</div>
										</div>
                                        <button type="submit" name="add_product_size" class="btn btn-info">Update Product Size</button>

									</form>
								</div>
						</div>
                    </div>


@endsection