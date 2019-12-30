<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('app.name') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Login-Page-vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Login-Page-fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Login-Page-fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Login-Page-vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/Login-Page-vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Login-Page-vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Login-Page-vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/Login-Page-vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util-Login-Page.css">
	<link rel="stylesheet" type="text/css" href="/css/main-Login-Page.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="{{ route('admin.forget') }}"  method="post">
					{{ csrf_field() }}
					<span style="text-align: right;font-family: iranyekan;" class="login100-form-title p-b-49">
					{{__('main.forgetpassword')}}
					</span>
					@if($msg!='')
					<div style="color: #f5beb8;text-align: center;">
						@if($msg=='email')
						{{__('main.foregetemailsent')}}
						@endif
						@if($msg=='sms')
						{{__('main.foregetsmssent')}}
						@endif
						@if($msg=='none')
						{{__('main.foregetnotsent')}}
						@endif
					</div>
					@endif
					@include('layouts.errors-and-messages')
					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100 m-b-23">
						<span class="label-input100">{{__('main.email')}}</span>
						<input class="input100" type="text" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div  style="text-align: right;font-family: iranyekan;" class="wrap-input100">
						<span class="label-input100">{{__('main.mobile')}}</span>
						<input class="input100" type="text" name="mobile" placeholder="Type your mobile">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
							{{__('main.reset_pass')}}
							</button>
						</div>
					</div>
					<!--
					<div  style="text-align: right;font-family: iranyekan;" class="txt1 text-center p-t-54 p-b-20">
						<span>
							: با استفاده از موارد زیر 
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
					-->
					<!-- <div class="flex-col-c p-t-155">
						<a href="/register" class="txt2">
							{{__('main.register')}}
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/Login-Page-vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login-Page-vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login-Page-vendor/bootstrap/js/popper.js"></script>
	<script src="/Login-Page-vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login-Page-vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login-Page-vendor/daterangepicker/moment.min.js"></script>
	<script src="/Login-Page-vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/Login-Page-vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/js/main-Login-Page.js"></script>

</body>
</html>