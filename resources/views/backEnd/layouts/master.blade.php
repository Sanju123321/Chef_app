<!DOCTYPE html>
<html lang="en" class="no-js">
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<title>{{ PROJECT_NAME }} - @yield('title')</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/developer.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END PAGE LEVEL PLUGIN STYLES -->
		<!-- BEGIN PAGE STYLES -->
		<link href="{{ url(backEndCssPath.'/tasks.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END PAGE STYLES -->
		<!-- BEGIN THEME STYLES -->
		<link href="{{ url(backEndCssPath.'/components.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/plugins.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/layout.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="{{ url(backEndCssPath.'/custom.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/margins-min.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ url('public/css/croppie.css') }}">
		<!-- END THEME STYLES -->
    	
    	<!-- <link rel='stylesheet' href="{{ url(backEndCssPath.'/css/datatable.css')}}" /> -->


		<!-- data-table end -->
		<script src="{{ url(backEndJsPath.'/full_screen.js') }}"></script>
		<script src="{{ url(backEndJsPath.'/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery-migrate.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.toaster.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.validate.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/additional-methods.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/common.js') }}" type="text/javascript"></script>

		<script src="{{ url('public/backEnd/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
 		<script src="{{ url('public/backEnd/js/range-datetimepicker.js') }}" type="text/javascript"></script>
 		<script src="{{ url('public/backEnd/js/jquery.datetimepicker.js') }}" type="text/javascript"></script>
 		<script src="{{ url('public/backEnd/js/jquery.timepicker.min.js') }}" type="text/javascript"></script>
 		<script src="{{url('public/backEnd/js/datepair.js')}}" type="text/javascript" ></script>
		<script src="{{url('public/backEnd/js/jquery.datepair.js')}}" type="text/javascript" ></script>
		<script src="{{ url('public/js/demo.js') }}" type="text/javascript"></script>
		<script src="{{ url('public/js/croppie.js') }}" type="text/javascript"></script>
		<script src="{{ url('public/js/croppie-demo.js') }}" type="text/javascript"></script>
		<style type="text/css">
			.page-header.navbar {
				height: 65px;
				min-height: 65px;
			}
			.page-header.navbar .page-logo {
				height: 65px;
			}
			#header_lgo {
				height: auto;
				width: 115px;
				margin: 5px 0;
				object-fit: cover;
			}
			.page-header.navbar .top-menu {
				height: 65px;
			}
			.page-header.navbar .top-menu .navbar-nav {
				height: 100%;
			}
			.page-header.navbar .top-menu .navbar-nav > li.dropdown {
				height: 65px;
			}
			.page-header.navbar .top-menu .navbar-nav > li.dropdown-user .dropdown-toggle {
				padding: 20px 12px 0 0;
			}
			.page-header.navbar .top-menu .navbar-nav > li.dropdown-user .dropdown-toggle > img {
				height: 35px;
				width: 35px;
				object-fit: cover;
			}
			.page-header-fixed .page-container {
				margin-top: 65px;
			}
		</style>
	</head>
	<!-- END HEAD -->

	<!-- BEGIN BODY -->
	<body class="page-header-fixed page-quick-sidebar-over-content">
		@include('backEnd.common.header')

		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			@include('backEnd.common.notification')
			
			@include('backEnd.common.sidebar')
			@yield('content')
		</div>

		<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				Copyright © {{ env('APP_NAME') }} {{date('Y')}}. All Rights Reserved.
			</div>
			<div class="scroll-to-top">
				<i class="fa fa-arrow-circle-up"></i>
			</div>
		</div>
		<!-- END FOOTER -->
		
		<!--Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="{{ url(backEndJsPath.'/validation/common_validation.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.blockui.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.cokie.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.uniform.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/bootstrap-switch.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="{{ url(backEndJsPath.'/metronic.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/layout.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/quick-sidebar.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/demo.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/index.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/tasks.js') }}" type="text/javascript"></script>
		<!-- END PAGE LEVEL SCRIPTS -->


		<script>
		jQuery(document).ready(function() {    
		   Metronic.init(); // init metronic core componets
		   Layout.init(); // init layout
		});
		</script>
        @yield('scripts')
		<!-- END JAVASCRIPTS -->
	</body>
<!-- END BODY -->
</html>