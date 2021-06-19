@extends('backEnd.layouts.master')
@section('title','Manage Chef')
@section('content')

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<section>
	<div class="page-content-wrapper ">
		<div class="page-content">
			<h3 class="page-title">Manage Chef</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/chef') }}">Chefs</a>
					</li>
				</ul>

			<div class="row">
				<div class="col-md-12">
					<div class="portlet box ">
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="myTable">
									<div class="table-btn">
										<div class="btn-group pull-right" style="padding: 10px;">
											<a href= "{{ url('admin/chef/add') }}">
												<button id="sample_editable_1_new" class="btn green">
												Add New <i class="fa fa-plus"></i>
												</button>
											</a>
										</div>
									</div>
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile Number</th>
											<th>Joined On</th>
											<th>Action</th>
										</tr>
									</thead>
										@foreach($chefs as $user)
										<tr>
											<td>{{ ucfirst($user['name']) }}</td>
											<td>{{ $user['email'] }}</td>
											<td>{{ $user['phone_number'] }}</td>	
											<td>{{ date('d-m-Y H:i:s',strtotime($user['created_at'])) }}</td>
											<td>
												<a href="{{ url('admin/chef/edit/'.$user['id']) }}"><i class="fa fa-edit"></i></a>
												<a href="{{ url('admin/chef/delete/'.$user['id']) }}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a>
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




