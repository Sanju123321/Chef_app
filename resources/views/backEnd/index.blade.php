@extends('backEnd.layouts.master')
@section('title','Dashboard')
@section('content')
<style type="text/css">
.fa.fa-star {
	font-size: 15px !important;
	position: relative;
	left: 60px;
	bottom: 145px;
	color: #fff;
	opacity: 0.3;
}
/*11/04/19 abhi*/
.my-flex {
	display: flex;
	flex-flow: row wrap;
}
.dashboard-stat {
	margin-bottom: 8px;
}
/*end*/
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Dashboard <!-- <small>reports & statistics</small> -->
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ url('admin/dashboard') }}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ url('admin/dashboard') }}">Dashboard</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row my-flex">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue-madison">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
						</div>
						<div class="desc">
							Users
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat red-intense">
					<div class="visual">
						<i class="fa fa-cube"></i>
					</div>
					<div class="details">
						<div class="number">
						</div>
						<div class="desc">
							Products
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat green-haze">
					<div class="visual">
						<i class="fa fa-bars"></i>
					</div>
					<div class="details">
						<div class="number">
						</div>
						<div class="desc">
							Wishlist's
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
				<i class="fa fa-star" aria-hidden="true"></i>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat purple-plum">
					<div class="visual">
						<i class="fa fa-plane"></i>
					</div>
					<div class="details">
						<div class="number">
						</div>
						<div class="desc">
							Contents
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat green">
					<div class="visual">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="details">
						<div class="number">
						</div>
						<div class="desc">
							Vendors
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- END DASHBOARD STATS -->
		<div class="clearfix">
		</div>
	</div>
</div>
<!-- END CONTENT -->
@endsection