<?php

	if(isset($dish)){	
		$action = url('admin/dish/edit/'.$id);
		$task = "Edit";
		$disabled = 'disabled';
	}
	else{	
		$action = url('admin/dish/add');
		$task = "Add";
	}
?>
@extends('backEnd.layouts.master')
@section('title', $task .' Dish')
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
			Manage Dish </h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/dish') }}">Manage Dish</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ Request::fullUrl() }}">{{ $task }} Dish</a>
					</li>
				</ul>
			</div>
            
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							{{ $task }} Dish
						</div>
					</div>

					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form id="chef_form" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-body">

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Dish Name :</label>
										<div class="col-md-6">
											<input type="text" name="name" class="form-control" placeholder="Enter Dish Name" value="{{ isset($dish->name)?$dish->name:'' }}" maxlength="255" required="required" />
										</div>
									</div>
								</div>


								
								<?php  
									if(!empty($dish->image)) {
										
										$image = $dish->image;
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
										<input type="file" id="img_upload" name="dish_image">	
									</div>
								</div>
								
								<?php  
									if(!empty($dish->video)) {
										
										$video = $dish->video;
									}else{
										$video = DefaultImgPath;
									}
								?>
								<div class="form-group">
									<label class="col-md-3 control-label">Video :</label>
									<div class="col-md-3 p-l-15 ">
										<!-- <video width="320" height="240" controls id="old_video" src=""> -->
										  <!-- Your browser does not support the video tag. -->
										<!-- </video> -->
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-6">
										<input type="file" id="video_upload" name="video">	
									</div>
								</div>
							

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label"> Description :</label>
										<div class="col-md-6">
											<input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{isset($dish->description)?$dish->description:''}}"  required="required" />
										</div>
									</div>
								</div>	

								<div class="row">
									<div class="form-group">
										<label class="col-md-3 control-label">Price  :</label>
										<div class="col-md-6">
											<input type="number" name="price" class="form-control" placeholder="Enter Phone Number" value="{{ isset($dish->phone_number)?$dish->phone_number:'' }}" required="required" />
										</div>
									</div>
								</div>	
														
								<div class="form-group">
									<label class="col-md-3 control-label">Time Taken (mins) :</label>
	                                <div class="col-md-6">
									<input type="number" name="time_taken" class="form-control" placeholder="Enter time taken" value="{{ isset($dish->time_taken)?$dish->time_taken:'' }}" required="required" />
			                        </div>
	                            </div>							

	                            <div class="form-group">
									<label class="col-md-3 control-label">Dish Status :</label>
	                                <div class="col-md-6">
		                                <select name="status" class="form-control">
		                                    <option value="Active" <?php if(@$dish->status == "Active"){ echo 'selected';} ?> >Active</option>
		                                    <option value="INActive" <?php if(@$dish->status == "INActive"){ echo 'selected';} ?>>Inactive</option>
		                                </select>
			                        </div>
	                            </div>
                   
						<!-- 		<div class="packing_content items_prices pck_unit_div">
									<div class="row">
										<div class="col-lg-3">
											<p class="com_red text-right mb-0">
												<a href="javascript:;" class="add_pack">
													<i class="fa fa-plus"></i> Add packing unit
												</a>
											</p>
										</div> 				
									</div>
								</div>	
								<div class="form-group">
									<div class="pack_inr_div appendPacking">
										<label class="col-md-3 control-label">Ingredient</label>
										<div class="pack_info">
											<div class="row">
												<div class="col-lg-6 append_ingredient">
													<h5 class="chart_head mb-2"></h5>
													<div class="row ingrentient_length">
														<div class="col-lg-4">
															<div class="form-group">
																<input type="text" name="ingredient[0][name]" id="content_number0" placeholder="Name" value="" class="form-control content_number">
										
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group">
															<input type="text" name="ingredient[0][quantity]" id="content_number0" placeholder="Quantity" value="" class="form-control content_number">
													
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>		
								</div> -->

								<div class="form-actions top">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											{{ csrf_field() }}
											<input type="hidden" name="user_id" value="{{ @$user_id }}" id="user_id">
											<button type="submit" name="button" class="btn green">Submit</button>
											<a href="{{ url('admin/users') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a>
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

    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_video').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#video_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                // alert(ext); return false;

                if(ext == 'mp4' || ext == 'mov' || ext == 'mkv')
                {
                    input = document.getElementById('video_upload');

                    readURL(this);
                }
            } else{

                $(this).val('');
                alert('Please select an image of .mp4, .mkv, .mov file format.');
            }
        });
    });

	$("body").on('click', '.add_pack', function(){
		var lengt = $('.ingrentient_length').length;
		$('.append_ingredient').append('<div class="row ingrentient_length"><div class="col-lg-4"><div class="form-group"> <input type="text" name="ingredient['+lengt+'][name]" value="" id="content_number0" placeholder="Name" class="form-control content_number"></div></div><div class="col-lg-4"><div class="form-group"> <input type="text" name="ingredient['+lengt+'][quantity]" value="" id="content_number0" placeholder="Quantity" class="form-control content_number"></div></div><div class="col-lg-4"> <a class="remove_ingredient" ><span class="fa fa-minus" style="margin: 10px;"></span></a></div></div>');
	});

	$("body").on('click','.remove_ingredient',function(){
		$(this).closest('div .ingrentient_length').remove();
	});

</script>





@endsection