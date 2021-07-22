<?php

	if(isset($dish_id)){	
		$action = url('admin/chef/dish/edit/'.$dish_id);
		$task = "Edit";
		$disabled = 'disabled';
	}
	else{	
		$action = url('admin/chef/dish/dish-add/'.$chef_id);
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
						<a href="{{ url('admin/chef') }}">Chefs</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ url('admin/chef/dish/'.@$chef_id) }}">Manage Dishes</a>
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
										<img src="{{$image}}" width="240" height="240" id="old_image" alt="No image" >
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
										<video width="320" height="240" controls id="old_video" src="{{ $video }}">
										  Your browser does not support the video tag.
										</video>
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
											<input type="number" name="price" class="form-control" placeholder="Enter Phone Number" value="{{ isset($dish->price)?$dish->price:'' }}" required="required" />
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
		                                    <option value="Active" <?php if(@$dish['status'] == "Active"){ echo 'selected';} ?> >Active</option>
		                                    <option value="INActive" <?php if(@$dish['status'] == "INActive"){ echo 'selected';} ?>>Inactive</option>
		                                </select>
			                        </div>
	                            </div>

	                           	<div class="form-group">
									<label class="col-md-3 control-label">Category Type :</label>
	                                <div class="col-md-6">
		                                <select name="category" class="form-control">
		                                    <option value="breakfast" <?php if(@$dish['category'] == "breakfast"){ echo 'selected';} ?> >Breakfast</option>
		                                    <option value="lunch" <?php if(@$dish['category'] == "lunch"){ echo 'selected';} ?>>Lunch</option>
		                                    <option value="dinner" <?php if(@$dish['category'] == "dinner"){ echo 'selected';} ?>>Dinner</option>
		                                </select>
			                        </div>
	                            </div>
                   
								<div class="packing_content items_prices pck_unit_div">
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
														@if(@count($dish['dish_ingredients']) > 0 )
															@foreach($dish['dish_ingredients'] as $key=>$ingredients_list)
																<div class="row ingrentient_length">
																	<div class="main_ingredient-div">
																		<div class="col-lg-3">
																			<div class="form-group">
																				<input type="text" name="ingredient[{{$key}}][name]" id="ingredient_name" placeholder="Name" value="{{ $ingredients_list['ingredient_name'] }}" class="form-control content_number" required="required">
																			</div>
																		</div>
																		<div class="col-lg-2">
																			<div class="form-group">
																			<input type="text" name="ingredient[{{$key}}][quantity]" id="ingredient_quantity" placeholder="Quantity" value="{{ $ingredients_list['quantity'] }}" class="form-control content_number" required="required">
																			</div>
																		</div>
																		<div class="col-lg-2">
																			<div class="form-group">
																				<select name="ingredient[{{$key}}][units]"  class="form-control">
																					<option <?php if(@$ingredients_list->units == "gm"){ echo 'selected';} ?> value="gm">Gm</option>
																					<option <?php if(@$ingredients_list->units == "mg"){ echo 'selected';} ?> value="mg">Mg</option>
																					<option <?php if(@$ingredients_list->units == "kg"){ echo 'selected';} ?> value="kg">Kg</option>
																					<option <?php if(@$ingredients_list->units == "pound"){ echo 'selected';} ?> value="pound">Pound</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-lg-2">
																			<div class="form-group" style="margin-top:6px;">
																				  	<input type="checkbox" id="is_required" name="ingredient[{{$key}}][required]" value="1" <?php if(@$ingredients_list->required == "1"){ echo 'checked';} ?> ><label for="is_required"> Required</label>
																			</div>
																		</div>	
																	</div>
																</div>	
															@endforeach
														@else
														<div class="row ingrentient_length">
															<div class="main_ingredient-div">					<div class="col-lg-3">
																	<div class="form-group">
																		<input type="text" name="ingredient[0][name]" id="ingredient_name" placeholder="Name" value="" class="form-control content_number" required="required">
																	</div>
																</div>
																<div class="col-lg-2">
																	<div class="form-group">
																	<input type="text" name="ingredient[0][quantity]" id="ingredient_quantity" placeholder="Quantity" value="" class="form-control content_number" required="required">
																	</div>
																</div>
																<div class="col-lg-2">
																	<div class="form-group">
																		<select name="ingredient[0][units]"  class="form-control">
																			<option value="gm">Gm</option>
																			<option value="mg">Mg</option>
																			<option value="kg">Kg</option>
																			<option value="pound">Pound</option>
																		</select>
																	</div>
																</div>
																<div class="col-lg-2">
																	<div class="form-group" style="margin-top:6px;">
																		<input type="checkbox" id="is_required" name="ingredient[0][required]" value="1"><label for="is_required"> Required</label>
																	</div>
																</div>
															</div>
														</div>
														@endif
												</div>
											</div>
										</div>
									</div>		
								</div>

								<div class="form-actions top">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											{{ csrf_field() }}
											<input type="hidden" name="user_id" value="{{ @$user_id }}" id="user_id">
											<input type="hidden" name="dish_id" value="{{ @$dish_id }}" id="user_id">
											<input type="hidden" name="chef_id" value="{{ @$dish['chef_id'] }}" id="user_id">
											<button type="submit" name="button" class="btn green">Submit</button>

											<!-- <a href="{{ url('admin/users') }}"><button class="btn btn-default m-l-10" type="button" name="cancel">Cancel </button></a> -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function() {
        $(".mul_category").select2({
            tags:true
        });
    });
</script>

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
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
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
		$('.append_ingredient').append('<div class="row ingrentient_length"><div class="main_ingredient-div"><div class="col-lg-1"> <a class="remove_ingredient" ><span class="fa fa-minus" style="margin: 10px;"></span></a></div><div class="col-lg-3"><div class="form-group"> <input type="text" name="ingredient['+lengt+'][name]" id="ingredient_name_'+lengt+'" placeholder="Name" value="" class="form-control content_number" required="required"></div></div><div class="col-lg-2"><div class="form-group"> <input type="text" name="ingredient['+lengt+'][quantity]" id="ingredient_quantity_'+lengt+'" placeholder="Quantity" value="" class="form-control content_number" required="required"></div></div><div class="col-lg-2"><div class="form-group"> <select name="ingredient['+lengt+'][units]" class="form-control"><option value="gm">Gm</option><option value="mg">Mg</option><option value="kg">Kg</option><option value="pound">Pound</option> </select></div></div><div class="col-lg-2"><div class="form-group" style="margin-top:6px;">&nbsp;<input type="checkbox" id="is_required" name="ingredient['+lengt+'][required]" value="1"> <label for="is_required_'+lengt+'"> Required</label></div></div></div></div></div>');
	});

	$("body").on('click','.remove_ingredient',function(){
		$(this).closest('div .ingrentient_length').remove();
	});

</script>





@endsection