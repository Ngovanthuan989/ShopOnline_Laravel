@extends('welcome')
@section('content')
<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>Register Now</h3>
				<p>Welcome, please enter the following details to continue.</p>
				<p>If you have previously registered with us, <a href="#">click here</a></p>
				 <form action="{{URL::to('/add-customer')}}" method="post">
                 {{csrf_field()}}

					<ul>
						<li class="text-info">First Name: </li>
						<li><input type="text" name="firstName" placeholder="Enter First Name" required=""></li>
					</ul>
					<ul>
						<li class="text-info">Last Name: </li>
						<li><input type="text" name="lastName" placeholder="Enter Last Name" required=""></li>
					 </ul>
					<ul>
						<li class="text-info">Email: </li>
						<li><input type="text" name="email" placeholder="Enter Email" required=""></li>
					</ul>
					<ul>
						<li class="text-info">Password: </li>
						<li><input type="password" name="password" placeholder="Enter Password" required=""></li>
					</ul>
					<!-- <ul>
						<li class="text-info">Re-enter Password:</li>
						<li><input type="password"></li>
					</ul> -->
					<ul>
						<li class="text-info">Mobile Number:</li>
						<li><input type="text" name="phone_number" placeholder="Enter Phone Number" required=""></li>
					</ul>
					<input type="submit" value="Register Now">
					<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
				</form>
			</div>
		</div>
	</div>



@endsection
