@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2>Update product category</h2>
					</div>
                    <div class="panel panel-widget forms-panel">

<div class="forms">

        <h3 class="title1"></h3>
        <div class="form-three widget-shadow">
            <form class="form-horizontal" action="{{URL::to('/update-category-product/'.$edit_category_product->category_id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Category Code</label>
                <div class="col-sm-8">
                    <input type="text" value="{{$edit_category_product->category_code}}" class="form-control" name="category_product_code" id="focusedinput" placeholder="Cập Nhập Mã Danh Mục">
                </div>

            </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$edit_category_product->category_name}}" class="form-control" name="category_product_name" id="focusedinput" placeholder="Cập Nhập Tên danh mục">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label label-input-sm">Category Description</label>
                    <div class="col-sm-8">
                    <textarea style="resize: none;" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Cập Nhập Mô tả danh mục">{{$edit_category_product->category_desc}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Category Status</label>
                    <div class="col-sm-8"><select name="category_product_status" id="selector1" class="form-control">
                        <option value="0">Hiển Thị</option>
                        <option value="1">Ẩn</option>
                    </select></div>
                </div>

                <button type="submit" name="update_category_product" class="btn btn-info">Update Category</button>



            </form>
        </div>
</div>
</div>
@endsection
