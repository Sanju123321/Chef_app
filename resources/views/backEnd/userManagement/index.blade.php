@extends('backEnd.layouts.master')
@section('title','User management')
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
			<h3 class="page-title">User Management</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-bars"></i>
						<a href="{{ url('admin/users') }}">Users</a>
					</li>
				</ul>

			<div class="row">
				<div class="col-md-12">
					<div class="portlet box ">
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="myTable">
									<div class="table-btn">
										<div class="btn-group pull-right">
											<a href= "{{ url('admin/user/add')}}">
												<button id="sample_editable_1_new" class="btn green">
												Add New <i class="fa fa-plus"></i>
												</button>
											</a>
										</div>
									</div>
									<thead>
										<tr>
											<th>User Name</th>
											<th>Email</th>
											<th>Status</th>
											<th>Mobile Number</th>
											<th>Joined On</th>
											<th>Action</th>
										</tr>
									</thead>
											@foreach($users as $user)
										<tr>
											<td>{{ ucfirst($user['first_name']) }} {{ $user['last_name'] }}</td>
											<td>{{ $user['email'] }}</td>
											<td>{{ ucfirst($user['status']) }}</td>
											<td>{{ $user['mobile_number'] }}</td>	
											<td>{{ date('d-m-Y H:i:s',strtotime($user['created_at'])) }}</td>
											<td>
												<a href="{{ url('admin/user/edit/'.$user['id'])}}"><i class="fa fa-edit"></i></a>
												<a href="{{ url('admin/user/delete/'.$user['id']) }}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a>
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




