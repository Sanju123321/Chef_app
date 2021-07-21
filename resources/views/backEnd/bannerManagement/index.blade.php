@extends('backEnd.layouts.master')
@section('title','Manage Banner')
@section('content')

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<section>
	<div class="page-content-wrapper ">
		<div class="page-content">
			<h3 class="page-title">Manage Banner</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/banner') }}">Banners</a>
					</li>
				</ul>

			<div class="row">
				<div class="col-md-12">
					<div class="portlet box ">
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="myTable">
									<div class="table-btn">
										<!-- <div class="btn-group pull-right" style="padding: 10px;">
											<a href= "{{ url('admin/user/add') }}">
												<button id="sample_editable_1_new" class="btn green">
												Add New <i class="fa fa-plus"></i>
												</button>
											</a>
										</div> -->
									</div>
									<thead>
										<tr>
											<th>Images</th>
											<th>Action</th>
										</tr>
									</thead>
										@foreach($banners as $banner)
										<tr>
											<?php 
												if(!empty($banner['image'])) {
													$image = $banner['image'];
												}else{
													$image = DefaultImgPath;
												}
												// dd($image);
											?>
											<td><img src="{{ @$image }}" height="150" width="170"></td>
											<td>
												<a href="{{ url('admin/banner/edit/'.$banner['id']) }}"><i class="fa fa-edit"></i></a>
												<!-- <a href="{{ url('admin/banner/delete/'.$banner['id']) }}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a> -->
											</td>
										</tr>
										@endforeach
								</table>
							</div>					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection 

@section('scripts')
<script type="text/javascript">
	$(document).ready( function () {
    	$('#myTable').DataTable();
	} );
</script>
@endsection 




