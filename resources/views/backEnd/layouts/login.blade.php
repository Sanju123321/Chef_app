<!DOCTYPE html>
<html lang="en">
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<title>{{ PROJECT_NAME }} - @yield('title')</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
	
		<!-- BEGIN PAGE LEVEL STYLES -->
		<link href="{{ url(backEndCssPath.'/login.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END PAGE LEVEL SCRIPTS -->

		<!-- BEGIN THEME STYLES -->
		<link href="{{ url(backEndCssPath.'/components.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/plugins.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/layout.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="{{ url(backEndCssPath.'/custom.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url(backEndCssPath.'/developer.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->

		<script src="{{ url(backEndJsPath.'/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery-migrate.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.toaster.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.validate.js') }}" type="text/javascript"></script>
	</head>
	<style type="text/css">
/*		.login .logo {
		    margin: 0 auto;
		    padding: 15px;
		    text-align: center;
		}*/
	</style>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="login">
		
		<!-- BEGIN LOGO -->
		<div class="logo">
			<!-- <a href="index.html"> -->
			<!-- <img src="{{ url(systemImgPath.'/logo.png') }}" alt="" width="400px" /> -->
			<!-- </a> -->
		</div>
		<!-- END LOGO -->
		@include('backEnd.common.notification')
		@yield('content')
	
		<script src="{{ url(backEndJsPath.'/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.blockui.min.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/jquery.uniform.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="{{ url(backEndJsPath.'/jquery.validate.min.js') }}" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="{{ url(backEndJsPath.'/metronic.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/layout.js') }}" type="text/javascript"></script>
		<script src="{{ url(backEndJsPath.'/login.js') }}" type="text/javascript"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
			jQuery(document).ready(function() {     
				Metronic.init(); // init metronic core components
				Layout.init(); // init current layout
				Login.init();
			});
		</script>
	    <script type="text/javascript">
	        $(document).ready(function() {
	            $(document).on("click", '.del_btn', function() {
	                return confirm("Do you want to delete it ?");
	            });
	        });
	    </script>
		<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>