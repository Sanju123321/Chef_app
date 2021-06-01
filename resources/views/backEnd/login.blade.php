@extends('backEnd.layouts.login')
@section('title','Admin Login')
@section('content')

<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="{{ url('admin/login') }}" method="post" id="login_form">
		<h3 class="form-title">Sign In</h3>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
		</div>
		
	</form>
	<!-- END LOGIN FORM -->

	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="{{ url('admin/forgot-password') }}" method="post" id="forgot_pw_form">
		<h3>Forget Password ?</h3>
		<p>
			Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" id="admin_email" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>

	<!-- END FORGOT PASSWORD FORM -->
</div>

<div class="copyright">
	Copyright © {{ env('APP_NAME') }} {{ date('Y') }}. All Rights Reserved.
</div>

<script type="text/javascript">
	$('#forgot_pw_form').validate({
		rules:{
			email:{
				required:true,
				email:true,
				remote:"{{ url('validate/email') }}"
			},
		},
		messages:{
			email:{
				remote:"This email id does not exists"
			}
		}
	});
</script>

<script type="text/javascript">
	$('#login_form').validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true
			}
		}
	});
</script>

@endsection
