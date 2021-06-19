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

    <!-- Dummy Style  -->
    <link href="{{ url('dummy/plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('dummy/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <!-- Custom CSS -->
    <!-- <link href="{{ url('dummy/css/style.min.css') }}" rel="stylesheet"> -->
 
    <!-- Dummy Style  -->

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
					<a class="more" href="{{ url('admin/user') }}">
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
							Chefs
						</div>
					</div>
					<a class="more" href="{{ url('admin/chef') }}">
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
							Dishes
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
							Polices
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
							Total Orders
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
		</div>
	
		<div class="">
                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <div class="white-box">
                            <h3 class="box-title">Products Yearly Sales</h3>
                            <!-- <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>Mac</h5>
                                    </li>
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-inverse"></i>Windows</h5>
                                    </li>
                                </ul>
                            </div> -->
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: 178px; left: 458px;"><span class="chartist-tooltip-value">5</span></div>
                            <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="50" x2="50" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="113.28571428571428" x2="113.28571428571428" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="176.57142857142856" x2="176.57142857142856" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="239.85714285714286" x2="239.85714285714286" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="303.1428571428571" x2="303.1428571428571" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="366.42857142857144" x2="366.42857142857144" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="429.7142857142857" x2="429.7142857142857" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="493" x2="493" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line y1="370" y2="370" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="340.4166666666667" y2="340.4166666666667" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="310.8333333333333" y2="310.8333333333333" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="281.25" y2="281.25" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="251.66666666666669" y2="251.66666666666669" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="222.08333333333334" y2="222.08333333333334" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="192.5" y2="192.5" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="162.91666666666666" y2="162.91666666666666" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="133.33333333333334" y2="133.33333333333334" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="103.75" y2="103.75" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="74.16666666666669" y2="74.16666666666669" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="44.583333333333314" y2="44.583333333333314" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="493" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,370L50,133.333C71.095,192.5,92.19,310.833,113.286,310.833C134.381,310.833,155.476,15,176.571,15C197.667,15,218.762,192.5,239.857,192.5C260.952,192.5,282.048,133.333,303.143,133.333C324.238,133.333,345.333,251.667,366.429,251.667C387.524,251.667,408.619,133.333,429.714,133.333C450.81,133.333,471.905,172.778,493,192.5L493,370Z" class="ct-area"></path><path d="M50,133.333C71.095,192.5,92.19,310.833,113.286,310.833C134.381,310.833,155.476,15,176.571,15C197.667,15,218.762,192.5,239.857,192.5C260.952,192.5,282.048,133.333,303.143,133.333C324.238,133.333,345.333,251.667,366.429,251.667C387.524,251.667,408.619,133.333,429.714,133.333C450.81,133.333,471.905,172.778,493,192.5" class="ct-line"></path><line x1="50" y1="133.33333333333334" x2="50.01" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="113.28571428571428" y1="310.8333333333333" x2="113.29571428571428" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="176.57142857142856" y1="15" x2="176.58142857142855" y2="15" class="ct-point" ct:value="7"></line><line x1="239.85714285714286" y1="192.5" x2="239.86714285714285" y2="192.5" class="ct-point" ct:value="4"></line><line x1="303.1428571428571" y1="133.33333333333334" x2="303.1528571428571" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="366.42857142857144" y1="251.66666666666669" x2="366.43857142857144" y2="251.66666666666669" class="ct-point" ct:value="3"></line><line x1="429.7142857142857" y1="133.33333333333334" x2="429.7242857142857" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="493" y1="192.5" x2="493.01" y2="192.5" class="ct-point" ct:value="4"></line></g><g class="ct-series ct-series-b"><path d="M50,370L50,310.833C71.095,251.667,92.19,133.333,113.286,133.333C134.381,133.333,155.476,310.833,176.571,310.833C197.667,310.833,218.762,74.167,239.857,74.167C260.952,74.167,282.048,310.833,303.143,310.833C324.238,310.833,345.333,133.333,366.429,133.333C387.524,133.333,408.619,310.833,429.714,310.833C450.81,310.833,471.905,231.944,493,192.5L493,370Z" class="ct-area"></path><path d="M50,310.833C71.095,251.667,92.19,133.333,113.286,133.333C134.381,133.333,155.476,310.833,176.571,310.833C197.667,310.833,218.762,74.167,239.857,74.167C260.952,74.167,282.048,310.833,303.143,310.833C324.238,310.833,345.333,133.333,366.429,133.333C387.524,133.333,408.619,310.833,429.714,310.833C450.81,310.833,471.905,231.944,493,192.5" class="ct-line"></path><line x1="50" y1="310.8333333333333" x2="50.01" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="113.28571428571428" y1="133.33333333333334" x2="113.29571428571428" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="176.57142857142856" y1="310.8333333333333" x2="176.58142857142855" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="239.85714285714286" y1="74.16666666666669" x2="239.86714285714285" y2="74.16666666666669" class="ct-point" ct:value="6"></line><line x1="303.1428571428571" y1="310.8333333333333" x2="303.1528571428571" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="366.42857142857144" y1="133.33333333333334" x2="366.43857142857144" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="429.7142857142857" y1="310.8333333333333" x2="429.7242857142857" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="493" y1="192.5" x2="493.01" y2="192.5" class="ct-point" ct:value="4"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="375" width="63.285714285714285" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2008</span></foreignObject><foreignObject style="overflow: visible;" x="113.28571428571428" y="375" width="63.285714285714285" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2009</span></foreignObject><foreignObject style="overflow: visible;" x="176.57142857142856" y="375" width="63.28571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2010</span></foreignObject><foreignObject style="overflow: visible;" x="239.85714285714286" y="375" width="63.28571428571428" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2011</span></foreignObject><foreignObject style="overflow: visible;" x="303.1428571428571" y="375" width="63.285714285714306" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2012</span></foreignObject><foreignObject style="overflow: visible;" x="366.42857142857144" y="375" width="63.28571428571428" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2013</span></foreignObject><foreignObject style="overflow: visible;" x="429.7142857142857" y="375" width="63.28571428571428" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2014</span></foreignObject><foreignObject style="overflow: visible;" x="493" y="375" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">2015</span></foreignObject><foreignObject style="overflow: visible;" y="340.4166666666667" x="10" height="29.583333333333332" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1k</span></foreignObject><foreignObject style="overflow: visible;" y="310.83333333333337" x="10" height="29.583333333333332" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1.5k</span></foreignObject><foreignObject style="overflow: visible;" y="281.25" x="10" height="29.583333333333336" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2k</span></foreignObject><foreignObject style="overflow: visible;" y="251.66666666666669" x="10" height="29.58333333333333" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2.5k</span></foreignObject><foreignObject style="overflow: visible;" y="222.08333333333337" x="10" height="29.58333333333333" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">3k</span></foreignObject><foreignObject style="overflow: visible;" y="192.5" x="10" height="29.583333333333343" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">3.5k</span></foreignObject><foreignObject style="overflow: visible;" y="162.91666666666666" x="10" height="29.583333333333343" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">4k</span></foreignObject><foreignObject style="overflow: visible;" y="133.33333333333334" x="10" height="29.583333333333314" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">4.5k</span></foreignObject><foreignObject style="overflow: visible;" y="103.75" x="10" height="29.583333333333343" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">5k</span></foreignObject><foreignObject style="overflow: visible;" y="74.16666666666669" x="10" height="29.583333333333314" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">5.5k</span></foreignObject><foreignObject style="overflow: visible;" y="44.583333333333314" x="10" height="29.58333333333337" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">6k</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="29.583333333333314" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">6.5k</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">7k</span></foreignObject></g></svg></div>
                        </div>
                    </div>
                      <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <div class="white-box">
                            <h3 class="box-title">Products Yearly Sales</h3>
                           <!--  <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>Mac</h5>
                                    </li>
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-inverse"></i>Windows</h5>
                                    </li>
                                </ul>
                            </div> -->
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: 178px; left: 458px;"><span class="chartist-tooltip-value">5</span></div>
                            <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="50" x2="50" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="113.28571428571428" x2="113.28571428571428" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="176.57142857142856" x2="176.57142857142856" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="239.85714285714286" x2="239.85714285714286" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="303.1428571428571" x2="303.1428571428571" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="366.42857142857144" x2="366.42857142857144" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="429.7142857142857" x2="429.7142857142857" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line x1="493" x2="493" y1="15" y2="370" class="ct-grid ct-horizontal"></line><line y1="370" y2="370" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="340.4166666666667" y2="340.4166666666667" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="310.8333333333333" y2="310.8333333333333" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="281.25" y2="281.25" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="251.66666666666669" y2="251.66666666666669" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="222.08333333333334" y2="222.08333333333334" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="192.5" y2="192.5" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="162.91666666666666" y2="162.91666666666666" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="133.33333333333334" y2="133.33333333333334" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="103.75" y2="103.75" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="74.16666666666669" y2="74.16666666666669" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="44.583333333333314" y2="44.583333333333314" x1="50" x2="493" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="493" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,370L50,133.333C71.095,192.5,92.19,310.833,113.286,310.833C134.381,310.833,155.476,15,176.571,15C197.667,15,218.762,192.5,239.857,192.5C260.952,192.5,282.048,133.333,303.143,133.333C324.238,133.333,345.333,251.667,366.429,251.667C387.524,251.667,408.619,133.333,429.714,133.333C450.81,133.333,471.905,172.778,493,192.5L493,370Z" class="ct-area"></path><path d="M50,133.333C71.095,192.5,92.19,310.833,113.286,310.833C134.381,310.833,155.476,15,176.571,15C197.667,15,218.762,192.5,239.857,192.5C260.952,192.5,282.048,133.333,303.143,133.333C324.238,133.333,345.333,251.667,366.429,251.667C387.524,251.667,408.619,133.333,429.714,133.333C450.81,133.333,471.905,172.778,493,192.5" class="ct-line"></path><line x1="50" y1="133.33333333333334" x2="50.01" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="113.28571428571428" y1="310.8333333333333" x2="113.29571428571428" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="176.57142857142856" y1="15" x2="176.58142857142855" y2="15" class="ct-point" ct:value="7"></line><line x1="239.85714285714286" y1="192.5" x2="239.86714285714285" y2="192.5" class="ct-point" ct:value="4"></line><line x1="303.1428571428571" y1="133.33333333333334" x2="303.1528571428571" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="366.42857142857144" y1="251.66666666666669" x2="366.43857142857144" y2="251.66666666666669" class="ct-point" ct:value="3"></line><line x1="429.7142857142857" y1="133.33333333333334" x2="429.7242857142857" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="493" y1="192.5" x2="493.01" y2="192.5" class="ct-point" ct:value="4"></line></g><g class="ct-series ct-series-b"><path d="M50,370L50,310.833C71.095,251.667,92.19,133.333,113.286,133.333C134.381,133.333,155.476,310.833,176.571,310.833C197.667,310.833,218.762,74.167,239.857,74.167C260.952,74.167,282.048,310.833,303.143,310.833C324.238,310.833,345.333,133.333,366.429,133.333C387.524,133.333,408.619,310.833,429.714,310.833C450.81,310.833,471.905,231.944,493,192.5L493,370Z" class="ct-area"></path><path d="M50,310.833C71.095,251.667,92.19,133.333,113.286,133.333C134.381,133.333,155.476,310.833,176.571,310.833C197.667,310.833,218.762,74.167,239.857,74.167C260.952,74.167,282.048,310.833,303.143,310.833C324.238,310.833,345.333,133.333,366.429,133.333C387.524,133.333,408.619,310.833,429.714,310.833C450.81,310.833,471.905,231.944,493,192.5" class="ct-line"></path><line x1="50" y1="310.8333333333333" x2="50.01" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="113.28571428571428" y1="133.33333333333334" x2="113.29571428571428" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="176.57142857142856" y1="310.8333333333333" x2="176.58142857142855" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="239.85714285714286" y1="74.16666666666669" x2="239.86714285714285" y2="74.16666666666669" class="ct-point" ct:value="6"></line><line x1="303.1428571428571" y1="310.8333333333333" x2="303.1528571428571" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="366.42857142857144" y1="133.33333333333334" x2="366.43857142857144" y2="133.33333333333334" class="ct-point" ct:value="5"></line><line x1="429.7142857142857" y1="310.8333333333333" x2="429.7242857142857" y2="310.8333333333333" class="ct-point" ct:value="2"></line><line x1="493" y1="192.5" x2="493.01" y2="192.5" class="ct-point" ct:value="4"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="375" width="63.285714285714285" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2008</span></foreignObject><foreignObject style="overflow: visible;" x="113.28571428571428" y="375" width="63.285714285714285" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2009</span></foreignObject><foreignObject style="overflow: visible;" x="176.57142857142856" y="375" width="63.28571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2010</span></foreignObject><foreignObject style="overflow: visible;" x="239.85714285714286" y="375" width="63.28571428571428" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2011</span></foreignObject><foreignObject style="overflow: visible;" x="303.1428571428571" y="375" width="63.285714285714306" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2012</span></foreignObject><foreignObject style="overflow: visible;" x="366.42857142857144" y="375" width="63.28571428571428" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2013</span></foreignObject><foreignObject style="overflow: visible;" x="429.7142857142857" y="375" width="63.28571428571428" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 63px; height: 20px;">2014</span></foreignObject><foreignObject style="overflow: visible;" x="493" y="375" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">2015</span></foreignObject><foreignObject style="overflow: visible;" y="340.4166666666667" x="10" height="29.583333333333332" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1k</span></foreignObject><foreignObject style="overflow: visible;" y="310.83333333333337" x="10" height="29.583333333333332" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1.5k</span></foreignObject><foreignObject style="overflow: visible;" y="281.25" x="10" height="29.583333333333336" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2k</span></foreignObject><foreignObject style="overflow: visible;" y="251.66666666666669" x="10" height="29.58333333333333" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2.5k</span></foreignObject><foreignObject style="overflow: visible;" y="222.08333333333337" x="10" height="29.58333333333333" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">3k</span></foreignObject><foreignObject style="overflow: visible;" y="192.5" x="10" height="29.583333333333343" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">3.5k</span></foreignObject><foreignObject style="overflow: visible;" y="162.91666666666666" x="10" height="29.583333333333343" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">4k</span></foreignObject><foreignObject style="overflow: visible;" y="133.33333333333334" x="10" height="29.583333333333314" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">4.5k</span></foreignObject><foreignObject style="overflow: visible;" y="103.75" x="10" height="29.583333333333343" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">5k</span></foreignObject><foreignObject style="overflow: visible;" y="74.16666666666669" x="10" height="29.583333333333314" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">5.5k</span></foreignObject><foreignObject style="overflow: visible;" y="44.583333333333314" x="10" height="29.58333333333337" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">6k</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="29.583333333333314" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">6.5k</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">7k</span></foreignObject></g></svg></div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Recent sales</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <select class="form-select shadow-none row border-top">
                                        <option>March 2021</option>
                                        <option>April 2021</option>
                                        <option>May 2021</option>
                                        <option>June 2021</option>
                                        <option>July 2021</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 18, 2021</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="txt-oflo">Real Homes WP Theme</td>
                                            <td>EXTENDED</td>
                                            <td class="txt-oflo">April 19, 2021</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="txt-oflo">Ample Admin</td>
                                            <td>EXTENDED</td>
                                            <td class="txt-oflo">April 19, 2021</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="txt-oflo">Medical Pro WP Theme</td>
                                            <td>TAX</td>
                                            <td class="txt-oflo">April 20, 2021</td>
                                            <td><span class="text-danger">-$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td class="txt-oflo">Hosting press html</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 21, 2021</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td class="txt-oflo">Digital Agency PSD</td>
                                            <td>SALE</td>
                                            <td class="txt-oflo">April 23, 2021</td>
                                            <td><span class="text-danger">-$14</span></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td>MEMBER</td>
                                            <td class="txt-oflo">April 22, 2021</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>

</div>
    <script src="{{ url('dummy/js/waves.js') }}"></script> 
    <script src="{{ url('dummy/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ url('dummy/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

<!-- END CONTENT -->
@endsection