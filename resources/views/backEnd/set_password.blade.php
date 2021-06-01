@extends('backEnd.layouts.login')
@section('title','Set password')
@section('content')

<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<h3 class="form-title"> Set Password</h3>
	<form method="post" action="" id="set-password">
        <div class="form-group">
            <label> Email </label>
            <input name="email" type="text" class="form-control txtfield" placeholder="Email" value="{{isset($admin_detail->email)?$admin_detail->email:''}}" disabled="disable" />
        </div>
        <div class="form-group">
            <label> New Password </label>
            <input name="password" id="inputPassword" type="password" class="form-control txtfield" placeholder="New Password" />
        </div>
        <div class="form-group">
            <label> Confirm Password </label>
            <input name="confirm_password" type="password" data-match="#inputPassword" data-match-error="Whoops, Password and Confirm Password Does not matched" class="form-control txtfield" placeholder="Confirm Password" />
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-actions">
            @csrf()
            <input name="user_id" type="hidden" value="">
            <input name="security_code" type="hidden" value="">
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#set-password').validate({
        rules:{
            password:{
                required:true,
                minlength:8,
                maxlength:20
            },
            confirm_password:{
                required:true,
                equalTo:'#inputPassword'
            }
        }
    })
</script>

@endsection