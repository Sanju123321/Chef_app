<?php
	if(isset($page)){
	} else{
		$page = '';
	}
?>

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">		
		<ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="true" data-auto-scroll="true" data-slide-speed="200">
			<!-- SIDEBAR TOGGLER BUTTON -->
			<li class="sidebar-toggler-wrapper" style="margin-bottom: 10px;">
				<div class="sidebar-toggler">
				</div>
			</li>
			
			<?php
				$selected = '';
				if($page == 'dashboard'){
					$selected = "active";
				}
			?>
			<li class="start {{ $selected }}">
				<a href="{{ url('admin/dashboard') }}">
					<i class="fa fa-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
				</a>
				
			</li>

			<?php
				$selected = '';
				if($page == 'users' ){
					$selected = "active";
				}
			?>
			<li class="start {{ $selected }}">
				<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">Users Management</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php if($page == 'users'){ echo 'active'; }?>">
						<a href="{{ url('admin/user') }}">
						Users</a>
					</li>
				</ul>
			</li>

		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->