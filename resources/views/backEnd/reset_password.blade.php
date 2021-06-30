@extends('backEnd.layouts.login')
@section('title','Admin Login')
@section('content')

<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="{{ url('reset-password/'.$user_id) }}" method="post" id="login_form">
		<h3 class="form-title">Reset your password</h3>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" disabled value="{{ $email }}"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">New Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" id="new_password" autocomplete="off" placeholder="New Password" name="new_password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="confirm_password"/>
		</div>
		<div class="form-actions">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="user_id" value="{{ $user_id }}">
			<button type="submit" class="btn btn-success uppercase">Submit</button>
		</div>
		
	</form>
	<!-- END LOGIN FORM -->
</div>

<div class="copyright">
	Copyright © Box Economy <?php echo date('Y'); ?>. All Rights Reserved.
</div>

<script type="text/javascript">
	$('#login_form').validate({
		rules:{
			new_password:{
				required:true,
				minlength:6,
			},
			confirm_password:{
				required:true,
				equalTo:"#new_password"
			}			
		},
		messages:{
			confirm_password:{
				equalTo:"Please enter the same value again"
			},
			new_password:{
                regex:"Password can only consist of 'a-z,0-9,@./#-_'"
            },
		}
	});
</script>
@endsection
