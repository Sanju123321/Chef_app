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
				if($page == 'users'){
					$selected = "active";
				}
			?>
			<li class="start {{ $selected }}">
				<a href="{{ url('admin/user') }}">
					<i class="fa fa-home"></i>
					<span class="title">Manage User</span>
					<span class="selected"></span>
				</a>
				
			</li>
			<?php
				$selected = '';
				if($page == 'chefs'){
					$selected = "active";
				}
			?>
			<li class="start {{ $selected }}">
				<a href="{{ url('admin/chef') }}">
					<i class="fa fa-home"></i>
					<span class="title">Manage Chef</span>
					<span class="selected"></span>
				</a>
				
			</li>




<!-- 			<?php
				$selected = '';
				if($page == 'dishes'){
					$selected = "active";
				}
			?>
			<li class="start {{ $selected }}">
				<a href="{{ url('admin/dish') }}">
					<i class="fa fa-home"></i>
					<span class="title">Manage Dish</span>
					<span class="selected"></span>
				</a>
			</li>
 -->


		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->