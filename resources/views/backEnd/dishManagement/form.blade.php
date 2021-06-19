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

								<div class="form-group">
									<label class="col-md-3 control-label">Chef Name :</label>
	                                <div class="col-md-6">
		                                <select name="chef_name" class="form-control" required="required">
		                                	<option value="" selected disabled> Select Chef</option>
		                                	@foreach($chefs as $value)
		                                    	<option value="{{ $value['id'] }}" <?php if(@$dish->status == "Active"){ echo 'selected';} ?> >{{ $value['name'] }}</option>
		                                  	@endforeach
		                                </select>
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
									<label class="col-md-3 control-label">New Image :</label>
									<div class="col-md-6">
										<input type="file" id="img_upload" name="dish_image">	
									</div>
								</div>
							<!-- </div> -->

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
                   
						<!-- <div class="packing_content items_prices pck_unit_div">
							<div class="row">
								<div class="col-lg-4">
									<p class="com_red text-right mb-0">
										<a href="javascript:;" class="add_pack">
											<i class="fa fa-plus"></i> Add packing unit
										</a>
									</p>
								</div> 
								<div class="pack_inr_div appendPacking">
									<div class="pack_info">
										<div class="row">
											<div class="col-lg-6">
												<h5 class="chart_head mb-2">Content</h5>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<input type="text" name="packing_append_div[0][content_number]" id="content_number0" class="form-control content_number">
									
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
														<input type="text" name="packing_append_div[0][content_number]" id="content_number0" class="form-control content_number">
												
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>					
							</div>
						</div>	 -->	
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


$("body").on('click', '.add_pack', function(){
		var lengt = $('.pack_info').length;
		// alert(lengt);
		var ids=[];
		var packing_unit_Id =$('.content_unit').val();
		var sellingId =$('.selling_unit_item').val();

		if($('.packing_chck').prop("checked")==false){
			swal('Please enable product packed in different shapes');
		}else if (contentnumbers!="" && contentnumbers!=null && lastSelOptnVal!="" && lastSelOptnVal!=null) {
			var selected = [];
			$('.content_unit  option:selected').each(function() {
				var value = $(this).val();
				if(value!=''){
					selected.push(value);
				}
			});

			$.ajax({
				url: "{{url('provider/product/new_packng_unit/add')}}",
				type:'post',
				data: {'selected': selected,'sellingId':sellingId},
				success:function packingUnit(response){
					
					option_html=response.view;
					if (response.sellingUnitCount==0) {
						swal('Sorry, no any lower selling unit');
					}else{
						$('.rem_pack').hide();
						$('.content_number').prop('readonly', true);
						// $('.content_unit').prop('disabled', true);
						$('.content_unit').attr("style", "pointer-events: none;");
						$('.appendPacking').append(' <div class="pack_info"> <div class="row"> <div class="col-lg-6"> <h5 class="chart_head mb-2">Each</h5> <div class="form-group"> <input type="text"  name="packing_append_div['+lengt+'][each_content_unit]" class="form-control each_content_unit" value="'+lastSelOptn+'" readonly="" placeholder="select unit"><input type="hidden" name="packing_append_div['+lengt+'][each_content_unit_id]" value="'+lastSelOptnVal+'" /> </div></div><div class="col-lg-6"> <h5 class="chart_head mb-2">Content</h5> <div class="row"> <div class="col-lg-6"> <div class="form-group"> <input type="text" id="content_number'+lengt+'" name="packing_append_div['+lengt+'][content_number]" class="form-control content_number"> </div></div><div class="col-lg-6"> <div class="form-group"> <select class="form-control packingIdd content_unit renderUnit" id="content_unit'+lengt+'" name="packing_append_div['+lengt+'][content_unit_id]"> '+option_html+' </select> </div></div></div></div></div><p class="text-right mb-0"> <a href="javascript:;" class="rem_pack"> <i class="fa fa-times"></i> Remove </a> </p></div>');

						$("input[id^=content_number").each(function(){
							$(this).rules("add", {
								// required: true,
								required: {
									depends: function(element) {
										if ($(element).closest('.pck_unit_div').find('input[type=checkbox]').is(':checked')) {
											return true;
										}else{
											return false;
										}
									}
								},
								number:true,
								min:0,
								messages: {
									required: "please enter content number",
								}
							});   
						});

						$("input[id^=content_unit").each(function(){
							$(this).rules("add", {
								required: true,
								messages: {
									required: "please select content unit",
								}
							});   
						});

					}
				},error(){
					
				}
			});
		
				
		}else{
			swal('Please fill all the fields');
		}                       
	});

$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});
</script>





@endsection