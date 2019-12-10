<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo e(config('app.name')); ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login-Page-vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login-Page-fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login-Page-fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login-Page-vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login-Page-vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login-Page-vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login-Page-vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login-Page-vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util-Login-Page.css">
	<link rel="stylesheet" type="text/css" href="css/main-Login-Page.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-profile.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="<?php echo e(route('register')); ?>">
					<?php echo e(csrf_field()); ?>

					<?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span style="text-align: right;font-family: iranyekan;" class="label-input100"><?php echo e(__('main.name')); ?></span>
						<input class="input100" type="text" name="name" placeholder="Type your Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span style="text-align: right;font-family: iranyekan;" class="label-input100"><?php echo e(__('main.sirname')); ?></span>
						<input class="input100" type="text" name="sir_name" placeholder="Type your Family">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span style="text-align: right;font-family: iranyekan;" class="label-input100"></span><?php echo e(__('main.username_must_be_email')); ?></span>
						<input class="input100" type="text" name="email" placeholder="Type your (Email)">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 validate-input" data-validate="Password is required">
						<span style="text-align: right;font-family: iranyekan;" class="label-input100"><?php echo e(__('main.password')); ?></span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div><br>
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 validate-input" data-validate="Password is required">
						<span style="text-align: right;font-family: iranyekan;" class="label-input100"><?php echo e(__('main.confirm_password')); ?></span>
						<input class="input100" type="password" name="password_confirmation" placeholder="Repeat your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div><br>
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span style="text-align: right;font-family: iranyekan;" class="label-input100"></span><?php echo e(__('main.mobile')); ?></span>
						<input class="input100" type="text" name="mobile" placeholder="Your Mobile Number">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div style="text-align: right;font-family: iranyekan;direction: rtl;" class="text-right p-t-8 p-b-31">
						<input style="text-align: right;font-family: iranyekan;height: 25px;width: 25px;float: right;"class="input100" type="checkbox" name="Conditions" id="conditions" placeholder="Conditions"><a style="padding-right: 10px; color:red;font-family: iranyekan;" href="#"><?php echo e(__('main.accept_roles')); ?></a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button style="text-align: right;font-family: iranyekan;font-size:large;color:cornsilk;text-shadow: 0 0 5px black;" class="login100-form-btn">
							<?php echo e(__('main.register')); ?>

							</button>
						</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="Login-Page-vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login-Page-vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login-Page-vendor/bootstrap/js/popper.js"></script>
	<script src="Login-Page-vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login-Page-vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login-Page-vendor/daterangepicker/moment.min.js"></script>
	<script src="Login-Page-vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login-Page-vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>