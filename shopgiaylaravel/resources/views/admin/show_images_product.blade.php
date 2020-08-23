@extends('admin_layout')
@section('admin_content')

<div class="progressbar-heading grids-heading">
						<h2> List Product Images</h2>
					</div>
                    <div class="table-agile-info">
  <div class="panel panel-default">
  <?php
  $message = Session::get('message');
       if ($message) {
           # code...
           echo '<span class="text-alert">'.$message.'</span>';
           Session::put('message',null);
       }
?>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">


      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">

      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Thư viện ảnh</th>

            <th>Cài Đặt</th>
          </tr>
        </thead>
        <tbody>

        @foreach($all_images_product as $key => $images_pro)

          <tr >

            <th>{{$images_pro->product_code}}</th>
            <th>{{$images_pro->product_name}}</th>
            <th><img src="public/upload/product/{{$images_pro ->images_name}}" height="100" width="100"></th>
            <th><span class="text-ellipsis">

            </span></th>
            <!-- <td><span class="text-ellipsis">7.10.2020</span></td> -->
            <th>
              <a href="{{URL::to('/edit-images-product/'.$images_pro->images_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-images-product/'.$images_pro->images_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </th>
          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
