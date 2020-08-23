
<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.css')}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
</head>
<style>
 span{
     color:red;
 }
</style>
<body class="signup-body">
		<div class="agile-signup">

			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2>Login</h2>
				</div>
                <?php
                        $message = Session::get('message');
                        if ($message) {
                            # code...
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                ?>
				<form action="{{URL::to('/admin-dashboard')}}" method="POST">
                {{csrf_field()}}
					<input type="email" name="admin_email" placeholder="Enter Email" required="">
					<input type="password" name="admin_password" placeholder="Enter Password" required="">
					<input type="submit" class="register" value="Login">
				</form>
				<div class="signin-text">
					<div class="text-left">
						<p><a href="#"> Forgot Password? </a></p>
					</div>

					<div class="clearfix"> </div>
				</div>
				<h5>- OR -</h5>
				<div class="footer-icons">
					<ul>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>

			<!-- footer -->
			<div class="copyright">
				<p>© 2020 Colored . All Rights Reserved . Design by <a href="https://www.facebook.com/VanThuanGroup">Ngô Văn Thuận</a></p>
			</div>
			<!-- //footer -->

		</div>
	<script src="{{asset('public/backend/js/proton.js')}}"></script>
</body>
</html>
