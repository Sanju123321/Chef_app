<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<!-- <a href="index.html"> -->
			<img src="http://assets.stickpng.com/images/580b57fcd9996e24bc43c529.png" id="header_lgo"/>
			<!-- </a> -->
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
				<li class="dropdown dropdown-user">
					<?php
						$admin_id = Auth::guard('admin')->user()->id;
						$admin = App\Models\Admin::where('id',$admin_id)->first();

						if($admin->image == ''){
							$image = DefaultImgPath;
						} else{
							$image = AdminProfileImgPath.'/'.$admin->image;
						}
					?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="{{ $image }}"/>
					<span class="username username-hide-on-mobile"> {{ ucfirst($admin->name) }} </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						
						<li>
							<a href="{{ url('/admin/profile') }}">
							<i class="fa fa-user"></i> My Profile </a>
						</li>
						<li>
							<a href="{{ url('/admin/logout') }}">
							<i class="fa fa-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>