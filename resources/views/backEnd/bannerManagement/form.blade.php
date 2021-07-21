
@extends('backEnd.layouts.master')
@section('title','Edit Banner')
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
			Manage Banner </h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/banner') }}">Manage Banner</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Edit Banner</a>
					</li>
				</ul>
			</div>
            
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							Edit Banner
						</div>
					</div>

					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form id="user_form" action="{{ url('admin/banner/edit/'.$id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
							<div class="form-body">

								<?php  
									if(!empty($banner->image)) {
										
										$image = $banner->image;
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
										<input type="file" id="img_upload" name="image">	
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"><b>Note * :</b></label>
									<div class="col-md-6">
										<h4 class="text-danger">Please use image size of 1080*720 px.</h4>
									</div>
								</div>
							</div>



							<div class="form-actions top">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										{{ csrf_field() }}
										<button type="submit" name="button" class="btn green">Submit</button>
									    <a href="{{ url('admin/banner') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a>
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