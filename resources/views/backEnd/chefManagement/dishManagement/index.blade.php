@extends('backEnd.layouts.master')
@section('title','Manage Dish')
@section('content')

<style type="text/css">
	input[type="date"].input-sm, input[type="time"].input-sm, input[type="datetime-local"].input-sm, input[type="month"].input-sm {
	line-height: 17px;
}
.daterangepicker .input-mini {
	width: 100% !important;
}
</style>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<section>
	<div class="page-content-wrapper ">
		<div class="page-content">
			<h3 class="page-title">Manage Dish</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/chef') }}">Chefs</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manage Dishes</a>
					</li>
				</ul>
	
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box ">
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="myTable1">
									<div class="table-btn">
										<div class="btn-group pull-right" style="padding: 10px;">
											<a href= "{{ url('admin/chef/dish-add/'.$chef_id) }}">
												<button id="sample_editable_1_new" class="btn green">
												Add New <i class="fa fa-plus"></i>
												</button>
											</a>
										</div>
									</div>
									<thead>
										<tr>
											<th>Name</th>
											<th>Image</th>
											<th>Price</th>
											<th>Time Taken</th>
											<th>Action</th>
										</tr>
									</thead>
											@foreach($dishes as $dish)

										<tr>
										
												<td>{{ ucfirst($dish['name']) }}</td>
												<?php 
													if(!empty($dish['image'])) {
														$image = $dish['image'];
													}else{
														$image = DefaultImgPath;
													}
													// dd($image);
												?>
												<td><img src="{{ @$image }}" height="123" width="137"></td>
												<td>{{ $dish['price'] }}</td>	
												<td>{{ $dish['time_taken'] }}</td>	
												<td>
													<a href="{{ url('admin/chef/dish/edit/'.$dish['id']) }}" class="" title="Edit"><i class="fa fa-edit"></i></a>
													<a href="{{ url('admin/chef/dish/delete/'.$dish['id']) }}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a>
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
    	$('#myTable1').DataTable();
	} );
</script>
@endsection 




