@extends('welcome')
@section('content')
 <!--signup-->
        <!-- login-page -->
        <div class="login">
            <div class="container">
                <div class="login-grids">
                    <div class="col-md-6 log">
                             <h3>Login</h3>
                             <div class="strip"></div>
                             <p>Welcome, please enter the following to continue.</p>
                             <p>If you have previously Login with us, <a href="#">Click Here</a></p>
                             <form action="{{URL::to('/login-customer')}}" method="post">
                             {{csrf_field()}}

                                 <h5>Email:</h5>
                                 <input type="text" name="email_account">
                                 <h5>Password:</h5>
                                 <input type="password" name="password_account"><br>
                                 <?php
                                    $name = Session::get('message');
                                    if ($name) {
                                       # code...
                                       echo '<span class="text-alert">'.$name.'</span>';
                                       Session::put('message',null);
                                    }
                                   ?>
                                 <input type="submit" value="Login">

                             </form>
                            <a href="#">Forgot Password ?</a>
                    </div>
                    <div class="col-md-6 login-right">
                            <h3>New Registration</h3>
                            <div class="strip"></div>
                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                            <a href="{{URL::to('/register-checkout')}}" class="button">Create An Account</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<!-- //login-page -->
        <!--signup-->

@endsection
