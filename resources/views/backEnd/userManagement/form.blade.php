<?php

	if(isset($user)){	
		$action = url('admin/user/edit/'.$id);
		$task = "Edit";
		$disabled = 'disabled';
	}
	else{	
		$action = url('admin/user/add');
		$task = "Add";
	}
?>
@extends('backEnd.layouts.master')
@section('title', $task .' User')
@section('content')
<style type="text/css">
	.form-horizontal .radio > span {
		margin-top: -2px;
	}
	.radio-in .radio {
		position: absolute;
		width: 100%;
		text-align: left;
		left: -22px;
		top: -3px;
	}
	.checkbox .error {
		position: absolute;
		right: unset;
		top: 24px;
		left: 0px;
	}
	.checkbox.lop {
		position: relative;
		left: 11px;
	}
</style>
<div class="page-content-wrapper ">
	<div class="page-content">
		<div class="tab-content">
			<h3 class="page-title">
			Manage User </h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/user') }}">Manage User</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">{{ $task }} User</a>
					</li>
				</ul>
			</div>
            
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							{{ $task }} User
						</div>
					</div>

					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form id="user_form" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
							<div class="form-body">

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Name :</label>
										<div class="col-md-6">
											<input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ isset($user->name)?$user->name:'' }}" maxlength="255" required="required" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Email :</label>
										<div class="col-md-6">
											<input type="email" name="email" {{@$disabled}} class="form-control" placeholder="Enter Email" value="{{ isset($user->email)?$user->email:'' }}"   required="required"/>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Password  :</label>
										<div class="col-md-6">
											<input type="password" name="password" class="form-control" placeholder="Enter Password" value="" maxlength="255" required="required" />
										</div>
									</div>
								</div>	

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Country Code  :</label>
										<div class="col-md-6">
											<select name="country_code" class="form-control">
												<option selected disabled>Select Country Code</option>
												@foreach($countries as $country)
													<option value="{{ $country['id'] }}" <?php if($country['id'] == @$user['country_code']){ echo "selected"; } ?>>{{ $country['phone_code'] }} - ({{ $country['country_name'] }})</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Phone Number  :</label>
										<div class="col-md-6">
											<input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number" value="{{ isset($user->phone_number)?$user->phone_number:'' }}" required="required" />
										</div>
									</div>
								</div>	

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Address :</label>
										<div class="col-md-6">
											<input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ isset($user->address)?$user->address:'' }}" required="required" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">City  :</label>
										<div class="col-md-6">
											<input type="text" name="city" class="form-control" placeholder="Enter City" value="{{ isset($user->city)?$user->city:'' }}" required="required" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">State  :</label>
										<div class="col-md-6">
											<input type="text" name="state" class="form-control" placeholder="Enter Country" value="{{ isset($user->state)?$user->state:'' }}" required="required" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Country  :</label>
										<div class="col-md-6">
											<select name="country" class="form-control">
												<option selected disabled>Select Country Code</option>
												@foreach($countries as $country)
													<option value="{{ $country['id'] }}" <?php if($country['id'] == @$user['country']){ echo "selected"; } ?>>{{ $country['country_name'] }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
														
								<div class="form-group">
									<label class="col-md-3 control-label">Gender :</label>
	                                <div class="col-md-6">
		                                <select name="gender" class="form-control">
		                                    <option value="male" <?php if(@$user->gender == "male"){ echo 'selected';} ?> >Male</option>
		                                    <option value="female" <?php if(@$user->gender == "female"){ echo 'selected';} ?>>Female</option>
		                                </select>
			                        </div>
	                            </div>							

	                            <div class="form-group">
									<label class="col-md-3 control-label">Status :</label>
	                                <div class="col-md-6">
		                                <select name="status" class="form-control">
		                                    <option value="Active" <?php if(@$user->status == "Active"){ echo 'selected';} ?> >Active</option>
		                                    <option value="INActive" <?php if(@$user->status == "INActive"){ echo 'selected';} ?>>Inactive</option>
		                                </select>
			                        </div>
	                            </div>

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label"> Description :</label>
										<div class="col-md-6">
											<input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{isset($user->description)?$user->description:''}}"  required="required" />
										</div>
									</div>
								</div>



								<?php  
									if(!empty($user->image)) {
										
										$image = $user->image;
									}else{
										$image = DefaultImgPath;
									}
								?>
								<div class="form-group">
									<label class="col-md-3 control-label">Image :</label>
									<div class="col-md-3 p-l-15 ">
										<img src="{{$image}}" width="80%" height="100%" id="old_image" alt="No image" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-6">
										<input type="file" id="img_upload" name="profile_image">	
									</div>
								</div>
							</div>



							<div class="form-actions top">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										{{ csrf_field() }}
										<input type="hidden" name="user_id" value="{{ @$id }}" id="user_id">
										<button type="submit" name="button" class="btn green">Submit</button>
									    <a href="{{ url('admin/user') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a>
									</div>
								</div>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                // alert(ext); return false;

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
                {
                    input = document.getElementById('img_upload');

                    readURL(this);
                }
            } else{

                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });
    });
</script>
@endsection