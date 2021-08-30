<div class="fixed-top bg-white">
	<div class="py-3">
		<div class="container d-flex justify-content-between align-items-center">
			<ul class="d-flex">
				<li class="mr-3 cursor-pointer bg-skyblue rounded-circle navbar-icon text-center">
			    	<a href="{{ url('/'); }}" class="text-white text-decoration-none">
			    		<i class="icofont-home"></i>
			    	</a>
			    </li>
			</ul>
			<ul class="d-flex align-items-center">
			    <li class="me-3">
			    	<div class="dropdown cursor-pointer d-block text-decoration-none text-center rounded-circle navbar-icon">
						<div class="border w-100 h-100 rounded-circle">
							<i class="icofont-user"></i>
						</div>
						<div class="dropdown-menu dropdown-menu-right border-0 shadow" aria-labelledby="user-profile-admin-menu">
							<a class="dropdown-item font-weight-bolder" href="javascript:;">My Profile</a>
						    <div class="dropdown-divider"></div>
						    <a class="dropdown-item text-muted logout-link" href="javascript:;" data-url="{{ url('/login/logout'); }}">Logout Here</a>
						</div>
					</div>
			    </li>
				<li class="cursor-pointer backend-navigation-menu-icon navbar-icon rounded-circle bg-skyblue text-center">
			    	<i class="icofont-navigation-menu text-white"></i>
			    </li>
			</ul>
		</div>
	</div>
</div>

